<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use GuzzleHttp\Client;
use App\Models\User;

class PaymentController extends Controller
{
    public function payment_index()
    {
        $data = PaymentRequest::where('type','buyer')->latest()->get();

        return view('admin.payment-request',compact('data'));
    }

    public function payment_approve($id)
    {
        $data = PaymentRequest::find($id);

        $seller = User::where('id',$data->seller_id)->first();
        $seller->wallet += (($data->amount/100)*97.5);
        $seller->update();

        $data->status = 1;
        $data->update();

        return redirect(route('admin.payment.index'));
    }

    public function withdraw_index()
    {
        $data = PaymentRequest::where('type','seller')->latest()->get();

        return view('admin.withdraw-request',compact('data'));
    }

    public function withdraw_approve($id)
    {
        $data = PaymentRequest::find($id);

        // dd($data->payment_type);

        // if ($data->payment_type == 'OM') {
        //     $service_id = 'CASHINOMCIPART';
        // }elseif ($data->payment_type == 'MTN') {
        //     $service_id = 'CASHINMTNPART';
        // }elseif ($data->payment_type == 'MOOV') {
        //     $service_id = 'CASHINMOOVPART';
        // }elseif ($data->payment_type == 'WAVE') {
        //     $service_id = 'CI_CASHIN_WAVE_PART';
        // }

        // $client = new Client(['verify' => false]);

        // $response = $client->request('POST', 'https://apidist.gutouch.net/apidist/sec/XCPNY11168/cashin', [
        //     'form_params' => [
        //         'service_id' => $service_id,
        //         'recipient_phone_number' => $data->phone,
        //         'partner_id' => 'CI29897',
        //         'login_api' => '2525664938',
        //         'password_api' => 'dMUTW9Q49F',
        //         'call_back_url' => 'http://127.0.0.1:8000/withdraw-success',
        //         'amount' => $data->amount,
        //         'partner_transaction_id' => 'KJ7868sss',
        //     ]
        // ]);

        // dd($response);

        $data->status = 1;
        $data->update();

        return redirect(route('admin.withdraw.index'));
    }
}
