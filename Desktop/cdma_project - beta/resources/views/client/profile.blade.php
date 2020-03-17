@extends('layouts.app')
@section('title', 'Home')
@section('content')

<Profile :user="{{
    $user
}}" :is_following="{{auth()->user()->follows($user->id)?'true':'false'}}" :following="{{$user->followings->count()}}"
    :followers="{{$user->followers->count()}}" :client="{{$user->client}}" />
@if($user->isMe())
<!-- Modal upload profile pictures -->

@endif

@endsection

@if($user->isMe())
@section('css')
<link rel="stylesheet" type="text/css" href={{asset("css/cropperjs.css")}}>
@endsection
@section('js')
<script>
    // $(()=>{


    //     });
</script>
@endsection
@endif