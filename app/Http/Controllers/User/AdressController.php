<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        if ($request->has('country')) {
            $userinfo->country = $request->country;
        }
        if ($request->has('city')) {
            $userinfo->city = $request->city;
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
        if ($request->has('job_title')) {
            $userinfo->job_title = $request->job_title;
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

        //Protfolio_img_upload
        $p_photo = $request->file('photo_or_video');

        if ($p_photo) {
            $extension = $p_photo->getClientOriginalExtension();
            $slug = Str::slug($request->fullname, '-');
            $mime = $p_photo->getMimeType();
            $fileSize = $p_photo->getSize();

            // Define the size limits in bytes
            $videoSizeLimit = 10240 * 1024; // 10 MB in bytes
            $photoSizeLimit = 2048 * 1024; // 2 MB in bytes

            if (in_array($mime, ["video/x-flv", "video/mp4", "application/x-mpegURL", "video/MP2T", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv"])) {
                if ($fileSize < $videoSizeLimit) {
                    if ($request->old_protfolio_video) {
                        unlink(public_path($request->old_protfolio_video));
                    }
                    $fileNameToStore = time() . '.' . $extension; // Filename to store
                    $destinationPath = 'files/protfolio_video';
                    $p_photo->move(public_path($destinationPath), $fileNameToStore);
                    $userinfo->protfolio_video = $destinationPath . '/' . $fileNameToStore;
                } else {
                    toastr()->error('La vidéo ne dépassera pas 10 Mo');
                }
            } else {
                if ($fileSize < $photoSizeLimit) {
                    if ($request->old_protfolio_photo) {
                        unlink(public_path($request->old_protfolio_photo));
                    }
                    $fileNameToStore = time() . '.' . $extension; // Filename to store
                    $destinationPath = 'files/protfolio_photo';
                    $p_photo->move(public_path($destinationPath), $fileNameToStore);
                    $userinfo->protfolio_photo = $destinationPath . '/' . $fileNameToStore;
                } else {
                    toastr()->error("La taille de l'image ne doit pas dépasser 2 Mo");
                }
            }
        }

        $userinfo->save();

        return redirect()->back();
    }
}
