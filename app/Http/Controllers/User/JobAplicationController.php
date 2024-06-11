<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Hire;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Job_aplication;
use App\Models\PaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\OrderAccept;
use Illuminate\Support\Facades\Auth;

class JobAplicationController extends Controller
{
    // job application view
    public function jobAplication($slug, $id)
    {
        return view('user.profile.job-application', compact('id', 'slug'));
    }

    // seller job order details
    public function sellerJobOrderDetails($id)
    {
        $sellerHireDetails = Hire::with('seller', 'post', 'applier')->where('aplicant_id', $id)->first();

        if (isset($sellerHireDetails)) {
            $jobPoster = Post::where(['user_id' => $sellerHireDetails->buyer_id, 'user_id' => \Auth::id()])->first();
            return view('user.seller.applicant-job-details', compact('sellerHireDetails', 'jobPoster'));
        } else {
            return view('user.seller.applicant-job-details', compact('sellerHireDetails'));
        }
    }

    //store job applocation
    function storeJobAplication(Request $request)
    {
        $request->validate([
            'seller_amount' => 'min:1|required|numeric',
            'seller_deadline' => 'required',
            'cover_letter' => 'required',
            'file' => 'nullable|max:10240|mimes:docx,pdf,zip' //a required, max 10000kb, doc or docx file
        ]);
                                                                                    
        
        $jobApplyCount = User::find(Auth::id());
        
        
        if ($jobApplyCount->job_apply_count > 10 && $jobApplyCount->sub_id == 1) {
            toastr()->error('', 'Veuillez vous abonner au forfait premium !');
                return redirect(route('user.sub'));
        } else{
            $job_application = Job_aplication::create([
                'seller_id'       => \Auth::id(),
                'post_id'         => $request->post_id,
                'cover_letter'    => $request->cover_letter,
                'seller_amount'   => $request->seller_amount,
                'seller_deadline' => $request->seller_deadline,
            ]);
            $jobApplyCount->increment('job_apply_count');
    
    
    
            $document = $request->file('file');
            if ($document) {
                $extension = $document->getClientOriginalExtension();
                $fileNameToStore = Str::random(5) . '.' . $extension; // Filename to store
                $destinationPath = 'files/aplication/document';
                $document->move(public_path($destinationPath), $fileNameToStore);
                $job_application->file = 'files/aplication/document/' . $fileNameToStore;
                $job_application->save();
            }
    
            toastr()->success('', 'Poste postulé avec succès!');
            return redirect()->route('homepage');
        }

        
    }


    //show job application list
    public function showJobApplicationList($slug, $id)
    {
        $showAppliedLists = Job_aplication::with('seller')->where('post_id', '=', $id)->get();
        return view('user.profile.show-job-application-list', compact('showAppliedLists'));
    }

    //job application details
    public function applicationDetails($id)
    {
        $applicationDetails = Job_aplication::with('seller')->whereId($id)->first();
        return view('user.profile.application-detail', compact('applicationDetails'));
    }

    // download applicant file
    public function downloadApplicantFile($id)
    {
        $file = Job_aplication::whereId($id)->first();
        return response()->download(public_path($file->file));
        toastr()->success('', 'Fichier téléchargé avec succès!');
    }

    public function sellerJobOrderComplete($id)
    {
        $post = Post::find($id);

        $post->order_complete = 1;

        $post->update();

        $payment = new PaymentRequest;
        $payment->buyer_id = $post->user_id;
        $payment->seller_id = $post->hire->seller_id;
        $payment->hire_id = $post->hire->id;
        $payment->amount = $post->hire->applier->seller_amount;
        $payment->type = 'buyer';
        $payment->status = 0;
        $payment->save();

        toastr()->success('', 'Commande terminée avec succès!');

        return redirect(route('user.dashboard'));
    }

    //accept order
    public function acceptOrder($id) {
        $hire = Hire::find($id);
        
        $order = OrderAccept::create([
            'buyer_id' => $hire->buyer_id,
            'seller_id' => $hire->seller_id,
            'job_title' => $hire->post->job_title,
            'amount' => $hire->applier->seller_amount,
        ]);

        $wallet = User::where('id', $order['seller_id'])->first();
        $perAmount = $order['amount'] * 0.025;
        $grandAmount = $order['amount'] - $perAmount;
        $amount = $wallet->wallet+$grandAmount;
        $wallet->wallet = $amount;
        $wallet->save();

        Post::where('id', $hire->post_id)->delete();
        $hire->delete();

        toastr()->success('', 'Commande acceptée avec succès!');
        return redirect()->route('homepage');
    }

    //complete jobs
    public function completeJobs() {
        $completeJobs = OrderAccept::where('seller_id', Auth::id())->orWhere('buyer_id', Auth::id())->get();
        return view('user.complete-job', compact('completeJobs'));
    }
}
