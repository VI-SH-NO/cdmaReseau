<?php

namespace App\Http\Resources;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sender = User::find($this->sender);
        $receiver = User::find($this->receiver);
        return [
            'id' => $this->id,
            'body' => $this->body,
            'sender' => $this->sender,
            'sender_avatar' =>  $sender->getAvatar(),
            'receiver_avatar' => $receiver->getAvatar(),
            'receiver' => $this->receiver,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'seen_at' => $this->seen_at,
            'sender_name' =>  $sender->poster(),
            'receiver_name' => $receiver->poster(),
        ];
    }
}
