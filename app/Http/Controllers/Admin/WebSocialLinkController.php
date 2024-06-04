<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WebSocialLink;

class WebSocialLinkController extends Controller
{
    public function index()
    {
        $webSocialLinks = WebSocialLink::first();
        return view('admin.website-social-links', compact('webSocialLinks'));
    }


    public function update(Request $request, $id)
    {
        WebSocialLink::whereId($id)->update([
            'fb' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        toastr()->success('', 'Social links updated successfully!');
        return redirect()->back();
    }

    // user management
    public function userManagement() {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }
}
