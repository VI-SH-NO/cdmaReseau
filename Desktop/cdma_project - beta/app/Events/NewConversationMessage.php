<?php

namespace App\Events;

use App\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NewConversationMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->sender = User::find($this->message->sender);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user.' . $this->message->receiver);
    }
    public function broadcastAs()
    {
        return 'conversation';
    }
    public function broadcastWith()
    {

        return [
            'id' => $this->message->id,
            'body' => $this->message->body,
            'sender' => $this->message->sender,
            'sender_avatar' => $this->sender->getAvatar(),
            'receiver' => $this->message->receiver,
            'created_at' => Carbon::parse($this->message->created_at)->diffForHumans(),
            'sender_name' => $this->sender->poster(),
        ];
    }
}
