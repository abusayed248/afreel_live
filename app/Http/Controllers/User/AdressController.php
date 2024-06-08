<?php

namespace App\Http\Controllers\User;

use App\Models\Adress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    public function updateUserInfo(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|numeric',
            'inter_passing_year' => 'nullable|numeric',
            'graduation_passing_year' => 'nullable|numeric',
            'photo' => 'nullable|image',
        ]);

 
        $userinfo = User::where('id', Auth::user()->id)->first();

        // Only update fields that are present in the request
        if ($request->has('fullname')) {
            $userinfo->fullname = $request->fullname;
            $userinfo->name = $request->fullname;
        }
        if ($request->has('job_title')) {
            $userinfo->job_title = $request->job_title;
        }
        if ($request->has('phone')) {
            $userinfo->phone = $request->phone;
        }
        if ($request->has('email')) {
            $userinfo->email = $request->email;
        }
        if ($request->has('job_type')) {
            $userinfo->job_type = $request->job_type;
        }
        if ($request->has('job_category')) {
            $userinfo->job_category = $request->job_category;
        }
        if ($request->has('inter')) {
            $userinfo->inter = $request->inter;
        }
        if ($request->has('inter_passing_year')) {
            $userinfo->inter_passing_year = $request->inter_passing_year;
        }
        if ($request->has('graduation')) {
            $userinfo->graduation = $request->graduation;
        }
        if ($request->has('company_name')) {
            $userinfo->company_name = $request->company_name;
        }
        if ($request->has('about_company')) {
            $userinfo->about_company = $request->about_company;
        }


        if ($request->has('graduation_passing_year')) {
            $userinfo->graduation_passing_year = $request->graduation_passing_year;
        }
        if ($request->has('certified')) {
            $userinfo->certified = $request->certified;
        }
        if ($request->has('country')) {
            $userinfo->country = $request->country;
        }
        if ($request->has('city')) {
            $userinfo->city = $request->city;
        }
        if ($request->has('bio')) {
            $userinfo->about_info = $request->bio;
        }
        if ($request->has('tag')) {
            $array = explode(',', $request->tag);
            $result = [];
            foreach ($array as $key => $value) {
                $result[$key + 1] = $value;
            }
            $userinfo->tag = $result;
        }

         $photo = $request->file('photo');
                $slug = Str::slug($request->fullname, '-');

                if ($photo) {
                      if ($request->old_photo) {
                            unlink(public_path($request->old_photo));
                        }
                    $extension = $photo->getClientOriginalExtension();
                    $fileNameToStore = $slug . '_' . time() . '.' . $extension; // Filename to store
                    $destinationPath = 'files/profile_photo';
                    $photo->move(public_path($destinationPath), $fileNameToStore);
                    $userinfo->photo = 'files/profile_photo/' . $fileNameToStore;
                }

        $userinfo->save();

        toastr()->success('', 'Your updated successfully!');
        return redirect()->back();
    }
}
