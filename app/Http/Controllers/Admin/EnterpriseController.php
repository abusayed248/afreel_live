<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnterpriseController extends Controller
{
    public function index()
    {

        $enterprises = Enterprise::get();
        return view('admin.admin_manage.enterprises-index', compact('enterprises'));
    }
    public function postview()
    {

        return view('admin.admin_manage.enterprises-post');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'photo' => 'required|image',
        ]);
        $enterprise = Enterprise::create([
            'title' => $request->title,

        ]);

        $photo = $request->file('photo');
        $slug = Str::slug($request->title, '-');

        if ($photo) {
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $slug . '_' . time() . '.' . $extension; // Filename to store
            $destinationPath = 'files/admin/post';
            $photo->move(public_path($destinationPath), $fileNameToStore);
            $enterprise->photo = 'files/admin/post/' . $fileNameToStore;
        }
        $enterprise->save();

        toastr()->success('', 'Successfully Post Added');

        return redirect()->route('admin.all.enterprises');

    }
    public function destroy($id)
    {

        $enterprise = Enterprise::find($id);
        if (!empty($enterprise->photo)) {
            unlink(public_path($enterprise->photo));
        }

        $enterprise->delete();

        toastr()->success('', 'Post deleted successfully!');
        return redirect()->back();

    }
}
