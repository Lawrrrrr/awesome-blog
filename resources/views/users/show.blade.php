@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <img src="../../images/web.jpg" alt="" class="card-img-top p-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <span>
                                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                </span>
                                <form action="" method="get">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="Follow">
                                </form>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pt-md-3">
                            <div class="text-center">
                                <h2 class="text-info">3</h2>
                                <span>Following</span>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-3">
                            <div class="text-center">
                                <h2 class="text-info">3</h2>
                                <span>Following</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center m-3 p-3 bg-secondary rounded">
                                <h3 class="text-white">{{ $posts->count() }}</h3>
                                <span class="text-white">Blogs Posted</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-light mt-md-4 p-md-3 border rounded">
                <div class="header text-center m-md-3">
                    <h4 class="font-weight-bold">Blogs</h4>
                    {{-- <h4 class="font-weight-bold text-danger">You are not following this user</h4> --}}
                </div>
                @foreach ($posts as $post)
                    <div class="row mb-md-3">
                        <div class="blog col-md-12">
                            <div class="card">
                                <div class="form-group card-header">
                                </div>
                                <div class="form-group card-body">
                                    <div class="body">
                                        <p>
                                            {{ $post->content }}
                                        </p>
                                    </div>
                                    <div class="footer">
                                        <span class="text-secondary font-italic">-- Posted on {{ $post->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
