<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use \Carbon\Carbon;
use Auth;

class SubController extends Controller
{
    public function index()
    {
        return view('user.profile.sub');
    }

    public function sub($id)
    {
        $update = Auth::user();
        $update->sub_id = $id;
        $update->sub_date = Carbon::today();
        $update->update();

        return redirect(route('user.dashboard'));
    }

    public function success(Request $request)
    {
        $user = Auth::user();

        if ($request->amount == 3000) {
            # code...
            $user->sub_id = 1;
        }else {
            # code...
            $user->sub_id = 2;
        }

        $user->update();

        toastr()->success('', 'You are subscribed Successfully!');

        return redirect(route('user.dashboard'));
    }

    public function fail(Request $request)
    {
        toastr()->success('', 'Invalid Credentials provided for payment!');
        return redirect(route('user.sub'));
    }

    public function withdraw_success()
    {
        toastr()->success('', 'Withdraw Successful!');
        return redirect(route('admin.withdraw.index'));
    }
}
