<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function clientOnly()
    {
        if (!auth()->user()->hasRole('client')) {
            abort(403, 'Unauthorized action.');
        }
    }
    public function adminOnly()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function sellerOnly()
    {
        if (!auth()->user()->hasRole('seller')) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function buyerOnly()
    {
        if (!auth()->user()->hasRole('buyer')) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function sellerAndClientOnly()
    {
        if (!auth()->user()->hasRole(['client', 'seller'])) {
            abort(403, 'Unauthorized action.');
        }
    }
}
