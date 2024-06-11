<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $socialMedia = SocialMedia::first();
        $socialMedia->update([
            'fb' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
          ]);
        toastr()->success('', 'Compte de réseau social mis à jour avec succès!');
        return redirect()->back();
    }

}
