<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Mail\WelcomeMail;
use App\Models\SocialMedia;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{

    //profile dashboard
    public function userDashboard()
    {
        $this->buyerOnly();
        $get_user = User::where('email', auth()->user()->email)->first();
        $job_posts = Post::where('user_id', auth()->user()->id)->get();
        if ($get_user->is_activated == 1) {
            return view('user.profile.dashboard', compact('job_posts'));
        } else {
            return redirect()->route('verifyAccount');
        }
    }

    // job post details
    public function jobPostDetails()
    {
        return view('user.profile.job-detail');
    }

    public function useractivation(Request $request)
    {

        $userId = intval($request->user);
        $user = User::where('id', $userId)->first();

        if ($user->otp_code == $request->token) {
            $user->is_activated = 1;
            $user->otp_code = null;
            $user->save();
            toastr()->success('', 'Email verified successfully!');
            Auth::login($user);
            return redirect()->to('/');
        } else {
            toastr()->error('', 'Your OTP is invalid please check your email OTP first');
            return redirect('/verify-otp/' . $user->id);
        }
    }

    public function verifyOtpByUser(Request $request, $id)
    {
        $user = User::query()->where('id', $id)->first();
        return view('otp_verification', compact('user'));
    }

    //resend otp
    public function resendOtp($id)
    {
        $user = User::query()->where('id', $id)->first();
        $validToken = rand(10, 100. . '2024');
        $user->otp_code = $validToken;
        $user->save();
        Verifytoken::where($user->token)->update([
            'token' => $validToken
        ]);

        $get_user_email = $user->email;
        $get_user_name = $user->fullname;
        Mail::to($user->email)->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

        toastr()->success('', 'Resend OTP please check your email OTP first');
        return redirect()->back();
    }





    public function verifyAccount(Request $request)
    {
        $user = $request->user();
        $validToken = rand(10, 100. . '2024');
        Log::info("valid token is" . $validToken);
        $get_token = new Verifytoken();
        $get_token->token =  $validToken;
        $get_token->email =  $user->email;
        $get_token->save();
        $get_user_email = $user->email;
        $get_user_name = $user->username;
        Mail::to($user->email)->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

        return view('otp_verification');
    }



    //candidate details
    public function candidateDetails(Request $request)
    {
        if (Auth::user()->is_active == 1) {
            $user = $request->user();
            $socialMedia = SocialMedia::first();
            return view('user.profile.candidate-detail', compact('user', 'socialMedia'));
        } else {

            return redirect()->route('verifyAccount');
        }
    }

    //Withdraw
    public function withdraw()
    {
        $user = Auth::user();

        $data = PaymentRequest::where('seller_id', $user->id)->where('type', 'seller')->latest()->get();

        return view('user.profile.withdraw', compact('data'));
    }

    public function withdraw_submit(Request $request)
    {
        $user = Auth::user();

        // dd($request->all());

        $payment = new PaymentRequest;
        $payment->seller_id = $user->id;
        $payment->amount = $request->amount;
        $payment->payment_type = $request->type;
        $payment->phone = $request->phone;
        $payment->bank_name = $request->bank_name;
        $payment->account_name = $request->account_name;
        $payment->account_number = $request->account_number;
        $payment->routing_number = $request->routing_number;
        $payment->type = 'seller';
        $payment->status = 0;
        $payment->save();

        $user->wallet -= $request->amount;
        $user->update();

        toastr()->success('', 'Withdraw Request Sent!');


        return redirect(route('user.withdraw'));
    }
}
