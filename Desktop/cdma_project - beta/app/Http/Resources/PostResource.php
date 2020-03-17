<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'poster' => $this->poster,
            'poster_name' => $this->user->poster(),
            'poster_avatar' => $this->user->getAvatar(),
            'created' => $this->created_at->diffForHumans(),
            'showComments' => false,
            'commentsCount' => $this->comments()->count(),
            'likesCount' => $this->likes()->count(),
            'image' => $this->post_image,
            'is_image' =>  !is_null($this->post_image),
            'video' => $this->post_video,
            'is_video' => !is_null($this->post_video),
            'likeIt' => $this->likeIt(Auth::id())
        ];
    }
}
