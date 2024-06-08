<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
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
    


}
