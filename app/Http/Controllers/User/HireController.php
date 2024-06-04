<?php

namespace App\Http\Controllers\User;

use App\Models\Hire;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Job_aplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    //hire person
    public function store($id)
    {
        $aplicant = Job_aplication::whereId($id)->first();
        Hire::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $aplicant->seller_id,
            'post_id' => $aplicant->post_id,
            'aplicant_id' => $aplicant->id,
        ]);

        $hireCount = User::find($aplicant->seller_id);
        $hireCount->hire_count++;
        $hireCount->save();

        toastr()->success('', 'Hired successfully!');
        return redirect()->back();
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

        toastr()->success('', 'Hired successfully!');
        return redirect()->back();
    }


    // order cancel
    public function orderCancel($id)
    {
        
        Hire::whereId($id)->delete();
        toastr()->success('', 'Order Canceld!');
        return redirect('/');
    }
}
