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

        return redirect()->route('user.dashboard');
    }

    public function success(Request $request)
    {
        $user = Auth::user();

        if ($request->amount > 3000 && $request->amount < 5000) {
            $user->sub_id = 1;
            $user->sub_date = Carbon::now();
        }elseif($request->amount > 5000) {
            $user->sub_id = 2;
            $user->sub_date = Carbon::now();
        }elseif($request->amount > 1500 && $request->amount < 3000) {
            $user->bost_profile = 1;
            $user->boost_profile_date = Carbon::now();
        }

        $user->save();

        toastr()->success('', 'Vous êtes inscrit avec succès!');

        return redirect()->route('candidate.detail');
    }

    public function fail(Request $request)
    {
        toastr()->success("", "Informations d'identification non valides fournies pour le paiement!");
        return redirect(route('user.sub'));
    }

    public function withdraw_success()
    {
        toastr()->success('', 'Retrait réussi!');
        return redirect(route('admin.withdraw.index'));
    }
}
