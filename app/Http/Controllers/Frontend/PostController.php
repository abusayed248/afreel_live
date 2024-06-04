<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function jobPostDetails($slug, $id)
    {
        $post = Post::whereId($id)->whereSlug($slug)->firstOrFail();
        return view('user.profile.job-detail', compact('post'));
    }
}
