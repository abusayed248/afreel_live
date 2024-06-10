<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\User;

class PaymentController extends Controller
{
    public function payment_index()
    {
        $data = PaymentRequest::where('type', 'buyer')->latest()->get();

        return view('admin.payment-request', compact('data'));
    }

    public function payment_approve($id)
    {
        $data = PaymentRequest::find($id);

        $seller = User::where('id', $data->seller_id)->first();
        $seller->wallet += (($data->amount / 100) * 97.5);
        $seller->update();
        $data->status = 1;
        $data->update();

        return redirect(route('admin.payment.index'));
    }

    public function withdraw_index()
    {
        $data = PaymentRequest::where('type', 'seller')->latest()->get();

        return view('admin.withdraw-request', compact('data'));
    }

    public function withdraw_approve($id)
    {
        $data = PaymentRequest::find($id);
        $data->status = 1;
        $data->update();
        return redirect(route('admin.withdraw.index'));
    }
}
