<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\View\View;
use App\Models\Verifytoken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => 'required|string|max:55',
            'username' => 'required|string|alpha_dash|min:4|max:15|unique:users',
            'email' => 'required|string|lowercase|email|max:255|unique:'. User::class,
            'job_title' => 'required',
            'country' => 'required|string',
            'city' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => 'required|image',
        ]);
        $validToken = rand(10, 100. . '2024');
        $user = User::create([

            'fullname' => $request->fullname,
            'name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'job_title' => $request->job_title,
            'country' => $request->country,
            'city' => $request->city,
            'otp_code' => $validToken,
            'password' => Hash::make($request->password),
        ]);

        $photo = $request->file('photo');
        $slug = Str::slug($request->fullname, '-');

        if ($photo) {
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $slug . '_' . time() . '.' . $extension; // Filename to store
            $destinationPath = 'files/profile_photo';
            $photo->move(public_path($destinationPath), $fileNameToStore);
            $user->photo = 'files/profile_photo/' . $fileNameToStore;
        }
        $user->assignRole('buyer');

        $user->save();

        Verifytoken::create([
            'token'=> $validToken,
            'email'=> $request->email,
        ]);

        $get_user_email = $request->email;
        $get_user_name = $request->fullname;
        Mail::to($request->email)->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

        return redirect('/verify-otp/' . $user->id);
    }
}
