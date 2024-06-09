<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminManageController extends Controller
{
    
    public function index()
    {
        $admins = Admin::latest()->get();

        return view('admin.admin_manage.index',compact('admins'));
    }
    
    public function create()
    {

        return view('admin.admin_manage.create');
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        toastr()->success('', 'Admin created successfully!');
        return redirect()->route('admin.manages');
    }
    
    public function destroy($id)
    {

        $admin = Admin::find($id);
        $admin->delete();

        toastr()->success('', 'Admin deleted successfully!');
        return redirect()->route('admin.manages');
    }
    
    public function changePassword()
    {
        return view('admin.auth.change-password');
    }
    
    public function passwordChange(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $oldPass = $admin->password;
        $reqOldPass = $request->old_password;
        $newPassword = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (Hash::check($reqOldPass, $oldPass)) {
            if ($newPassword === $passwordConfirmation) {
                $admin->password = Hash::make($newPassword);
                $admin->save();

                toastr()->success('', 'Password changed successfully!');
                return redirect()->back();
            } else {
                toastr()->error('', 'New password and confirmation password do not match!');
                return redirect()->back();
            }
        } else {
            toastr()->error('', 'Your old password does not match!');
            return redirect()->back();
        }
        
    }
    


}
