<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender', 'receiver', 'body'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public $timestamps = false;
}
