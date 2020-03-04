@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <img src="{{ asset('images/' . $user->avatar) }}" alt="" class="card-img-top p-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <span>
                                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                </span>
                                @if (auth()->user()->followedUsers()->where('followed_id', $user->id)->exists())
                                    <a href="{{ route('users.unfollow', ['followed_id' => $user->id]) }}" class="btn btn-danger">Unfollow</a>
                                @else
                                    <a href="{{ route('users.follow', ['followed_id' => $user->id]) }}" class="btn btn-primary">Follow</a>
                                @endif
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
                                <h2 class="text-info"><a href="{{ route('users.following', ['followed_id' => $user->id]) }}">{{ $user->followedUsers()->count() }}</a></h2>
                                <a href="{{ route('users.following', ['followed_id' => auth()->user()->id]) }}"><span>Following</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-3">
                            <div class="text-center">
                                <h2 class="text-info"><a href="{{ route('users.followers', ['followed_id' => $user->id]) }}">{{ $user->followers()->count() }}</a></h2>
                                <a href="{{ route('users.followers', ['followed_id' => auth()->user()->id]) }}"><span>Followers</span></a>
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

                @if (auth()->user()->isFollowing($user->id))
                    @if ($posts->count() > 0)
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
                    @else
                        <div class="row mb-md-3">
                            <div class="blog col-md-12 text-center">
                                <h3 class="text-secondary">User has no posts yet!</h3>
                            </div>
                        </div> 
                    @endif
                @else
                    <div class="row mb-md-3">
                        <div class="blog col-md-12 text-center">
                            <h3 class="text-danger">You are not following this user!</h3>
                        </div>
                    </div>  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
