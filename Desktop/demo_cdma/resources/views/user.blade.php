@extends('layouts.app')

@section('content')

<!--Required resources-->


<div class="h-100" id="profile">

    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">


            <div class="profile-card py-3 card text-center">

                <div class="card-body py-4">
                    <img class="profile-picture rounded-circle"
                        src="https://randomuser.me/api/portraits/{{$user->sexe=='m'?'men':'women'}}/{{$user->id}}.jpg" />
                    <h2 class="text-dark h5 font-weight-bold mt-4 mb-1">
                        {{$user->name}}
                    </h2>
                    <p class="text-muted font-weight-bold small">
                        <i class="fa fa-map-marker"></i>
                        joined {{$user->created_at->diffForHumans()}}
                    </p>
                    <p class="px-1 mt-4 mb-4 text-muted quote-text">

                    </p>
                    <div class="d-flex px-1 w-100 align-items-center text-left w-75 mx-auto">
                        <div class="w-100">
                            <label class="mb-1 font-weight-light text-muted small text-uppercase">Membership</label>
                            <strong class="d-block text-warning">
                                <i class="fa fa-star"></i>
                                Gold Member
                            </strong>
                        </div>
                        <div>
                            @if (!$is_Me)
                            <Follow :user="{{auth()->user()?auth()->user():'null'}}"></Follow>
                            @else
                            <a href="{{route('home')}}" class="btn btn-sm btn-outline-info">
                                Home
                            </a>

                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>




    </div>
</div>
</div>
@endsection