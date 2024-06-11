<?php

namespace App\Http\Controllers\User;

use App\Models\Hire;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Job_aplication;
use App\Http\Controllers\Controller;
use App\Models\RefundMony;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HireController extends Controller
{
    //hire person
    public function store($id)
    {
        $aplicant = Job_aplication::whereId($id)->first();
        $hire = Hire::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $aplicant->seller_id,
            'post_id' => $aplicant->post_id,
            'aplicant_id' => $aplicant->id,
        ]);

        $hireCount = User::find($aplicant->seller_id);
        $hireCount->hire_count++;
        $hireCount->save();

        toastr()->success('', 'Embauché avec succès!');
        return redirect()->route('seller.job.order.details', $hire['aplicant_id']);
    }
    //hire person
    public function direcHireCandidate($id)
    {
        Hire::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $id,
        ]);

        $hireCount = Hire::where('seller_id', $id)->first();

        $hireCount = User::find($hireCount->seller_id);
        $hireCount->hire_count++;
        $hireCount->save();

        toastr()->success('', 'Embauché avec succès!');
        return redirect()->back();
    }


    // order cancel
    public function orderCancel($id)
    {
        
        $job =  Hire::find($id);
        if($job) {
            Session::put('buyer_info', $job->applier);
        }
        

        $refunds = RefundMony::with('buyer')->where('buyer_id', Auth::id())->get();
        if (!$refunds) {
            $job->delete();
        }
       
        return view('user.profile.refund', compact('refunds'));
    }
}
