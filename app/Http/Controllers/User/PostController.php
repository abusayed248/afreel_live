<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Auth;
use \Carbon\Carbon;

class PostController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.profile.new-job-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'job_title' => 'required',
            'job_type' => 'required',
            'job_category' => 'required',
            'career_level' => 'required',
            'job_description' => 'required',
            'amount' => 'min:5|required|numeric',
            'when_needed' => 'nullable',
            'skill' => 'required',
            'deadline' => 'required',
            'gender' => 'required',
            'file' => 'nullable|max:10240|mimes:docx,pdf,zip' //a required, max 10000kb, doc or docx file
        ]);


        $hireCount = Auth::user();

        $enddate = Carbon::parse($hireCount->sub_date);

        $enddate = $enddate->addDays(30);

        $trial_end = Carbon::parse($hireCount->created_at)->addDays(30);

        if ($hireCount->sub_id == null) {
            # code...
            if ($trial_end->lt(Carbon::today())) {
                # code...
                toastr()->success('', 'Please Update subscription to hire!');
                    return redirect(route('user.sub'));
            }
        }elseif ($hireCount->sub_id == 1) {
            # code...
            if ($enddate->lt(Carbon::today())) {
                # code...
                toastr()->success('', 'Please Update subscription to hire!');
                    return redirect(route('user.sub'));
            }
            if ($hireCount->hire_count > 29) {
                # code...
                toastr()->success('', 'Please Update subscription to hire!');
                return redirect(route('user.sub'));
            }
        }elseif ($hireCount->sub_id == 2) {
            # code...
            if ($enddate->lt(Carbon::today())) {
                # code...
                toastr()->success('', 'Please Update subscription to hire!');
                    return redirect(route('user.sub'));
            }
        }


        $post = Post::create([
            'user_id'         => \Auth::id(),
            'job_title'       => $request->job_title,
            'slug'            => Str::slug($request->job_title, '-'),
            'job_type'        => $request->job_type,
            'job_category'    => $request->job_category,
            'career_level'    => $request->career_level,
            'job_description' => $request->job_description,
            'amount'          => $request->amount,
            'when_needed'     => $request->when_needed,
            'deadline'        => $request->deadline,
            'gender'          => $request->gender,
        ]);


        $array = explode(',', $request->skill);
        $result = [];

        foreach ($array as $key => $value) {
            $result[$key + 1] = trim($value); // Ensure to trim any whitespace
        }
        $post->skill = $result;


        $document = $request->file('file');
        $slug = Str::slug($request->job_title, '-');
        if($document){
            $extension = $document->getClientOriginalExtension();
            $fileNameToStore = $slug.'.'.$extension; // Filename to store
            $destinationPath = 'files/post/document';
            $document->move(public_path($destinationPath), $fileNameToStore);
            $post->file = 'files/post/document/'.$fileNameToStore;
            $post->save();
        }
        $post->save();
        toastr()->success('', 'Message ajouté avec succès!');
        return redirect()->back();
    }

    
}
