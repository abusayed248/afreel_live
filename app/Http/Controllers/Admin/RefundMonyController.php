<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\RefundMony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefundMonyController extends Controller
{
    public function refund_index()
    {
        $data = RefundMony::with('buyer')->where('type', 'buyer')->latest()->get();

        return view('admin.refund-request', compact('data'));
    }
    public function refund_approve($id)
    {
        $data = RefundMony::find($id);
        $data->status = 1;
        $data->update();

        return redirect()->back();
    }
}
