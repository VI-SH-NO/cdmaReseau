<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\Post as PostRessource;
use App\Http\Resources\postCollection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return  new postCollection(Post::all());
    }
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);
        $post = request()->user()->posts()->create($data['data']['attributes']);
        return new PostRessource($post);
    }
}
