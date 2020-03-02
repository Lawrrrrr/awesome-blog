@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container bg-light mt-md-5">
        <div class="header mb-md-4">
            <h3 class="font-weight-bold">All Members</h3>
        </div>
        <div class="list rounded border border-dark p-3">
            <div class="row m-md-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-3">
                            {{-- <img src="../images/web.jpg" alt=""> --}}
                            
                            <form action="" method="get">
                                @csrf
                                <div class="form-group d-inline-block">
                                    <img src="../images/web.jpg" alt="" class="mr-md-4 img-fluid">
                                </div>
                                <div class="form-group d-inline-block">
                                    <span class="my-auto"><a href="">Diana Prince</a></span>
                                </div>
                                <div class="form-group d-inline-block float-right">
                                    <button type="submit" class="btn btn-primary">Follow</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($users as $user)
                {{-- @if ($user->id != Auth::user()->id) --}}
                <div class="row m-md-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body d-inline p-3">
                                {{-- <img src="../images/web.jpg" alt=""> --}}
                                
                                <form action="" method="get">
                                    @csrf
                                    <div class="form-group d-inline-block">
                                        <img src="../images/web.jpg" alt="" class="mr-md-4 img-fluid">
                                    </div>
                                    <div class="form-group d-inline-block ">
                                        <span class="my-auto"><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->first_name . " " . $user->last_name }}</a></span>
                                    </div>
                                    <div class="form-group d-inline-block float-right mx-auto">
                                        <button type="submit" class="btn btn-danger text-right">Unfollow</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
                {{-- @endif --}}
            @endforeach
        </div>
    </div>
@endsection