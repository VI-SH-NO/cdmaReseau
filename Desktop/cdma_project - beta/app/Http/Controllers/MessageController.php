<?php

namespace App\Http\Controllers;

use App\Events\NewConversationMessage;
use App\Events\NewMessage;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAllContacts()
    {
        $id = auth()->id();
        return MessageResource::collection(

            DB::select(
                ' SELECT t1.*
                FROM messages AS t1
                INNER JOIN
                (
                    SELECT
                        LEAST(sender, receiver) AS sender,
                        GREATEST(sender, receiver) AS receiver,
                        MAX(id) AS max_id
                    FROM messages
                    GROUP BY
                        LEAST(sender, receiver),
                        GREATEST(sender, receiver)
                ) AS t2
                    ON LEAST(t1.sender, t1.receiver) = t2.sender AND
                       GREATEST(t1.sender, t1.receiver) = t2.receiver AND
                       t1.id = t2.max_id
                    WHERE t1.sender = ? OR t1.receiver = ?
                    ORDER BY  t1.created_at DESC
                ',
                [$id, $id]
            )
        );
    }
    public function getAll()
    {
        $id = auth()->id();
        return MessageResource::collection(
            DB::select(
                'SELECT t1.*
                FROM messages AS t1
                INNER JOIN
                (
                    SELECT
                        LEAST(sender, receiver) AS sender,
                        GREATEST(sender, receiver) AS receiver,
                        MAX(id) AS max_id
                    FROM messages
                    GROUP BY
                        LEAST(sender, receiver),
                        GREATEST(sender, receiver)
                ) AS t2
                    ON LEAST(t1.sender, t1.receiver) = t2.sender AND
                       GREATEST(t1.sender, t1.receiver) = t2.receiver AND
                       t1.id = t2.max_id
                    WHERE t1.sender = ? OR t1.receiver = ?
                    ORDER BY  t1.created_at DESC
                ',
                [$id, $id]
            )
        );
    }
    public function mark_seen()
    {

        Message::where('seen_at', null)
            ->where('receiver', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->update([
                "seen_at" => now()
            ]);
    }
    public function sendMessage()
    {
        $Message = Message::create(
            [
                'receiver' => request('receiver'),
                'body' => request('message'),
                'sender' => Auth::id()
            ]
        );
        broadcast(new NewMessage($Message))->toOthers();
        return  new MessageResource($Message);
    }
    public function sendConversationMessage()
    {
        $Message = Message::create(
            [
                'receiver' => request('receiver'),
                'body' => request('message'),
                'sender' => Auth::id()
            ]
        );
        broadcast(new NewConversationMessage($Message))->toOthers();
        return  new MessageResource($Message);
    }

    public function getConversation()
    {

        return ConversationResource::collection(Message::where('receiver', Auth::id())
            ->where('sender', request('contact'))
            ->orwhere('sender', Auth::id())
            ->where('receiver', request('contact'))

            ->get());
    }
}
