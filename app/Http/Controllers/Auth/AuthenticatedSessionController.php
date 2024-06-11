<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $user = User::query()->where('email', $request->loginname)->orWhere('phone', $request->loginname)->first();
        // dd($user);
        if ($user->email || $user->phone) {
            if ($user->is_activated == 1) {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->to('/');
            } else {
                toastr()->error('', "Votre e-mail n'est pas un OTP, veuillez d'abord vérifier l'OTP de votre e-mail");
                return redirect('/verify-otp/' . $user->id);
            }
        } else {
            toastr()->error('', 'Votre email et votre mot de passe ne correspondent pas !');
            return redirect()->back();
        }
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
