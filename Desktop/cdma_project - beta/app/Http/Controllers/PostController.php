<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function posts()
    {
        return PostResource::collection(Post::whereIn('poster', Auth::user()->followings()->pluck('id')->toArray())
            ->orWhere('poster', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->offset(request('offset'))
            ->take(5)
            ->get());
    }
    public function Personalposts(User $user)
    {
        return PostResource::collection($user->posts);
    }
    public function store(Request $request)
    {
        return new PostResource(
            Post::create([
                "poster" => Auth::id(),
                "body" => $request->body
            ])
        );
    }
    public function storeWithImage()
    {
        $img = request('img');
        $img_name = Str::random(15) . '.' . $img->getClientOriginalExtension();
        $path = auth()->user()->upload_path . 'posts/images/';
        $img->move($path, $img_name);
        return new PostResource(
            Post::create([
                "poster" => Auth::id(),
                "body" => request('body'),
                "post_image" => $path . $img_name
            ])
        );
    }
    public function storeWithVideo()
    {

        $video = request()->file('video');
        $video_name = Str::random(15) . '.' . $video->getClientOriginalExtension();
        $path = auth()->user()->upload_path . 'posts/videos/';
        $video->move($path, $video_name);
        return new PostResource(
            Post::create([
                "poster" => Auth::id(),
                "body" => request('body'),
                "post_video" => $path . $video_name
            ])
        );
    }
}
