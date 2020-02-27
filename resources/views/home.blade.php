@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <img src="../images/web.jpg" alt="" class="card-img-top p-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <span>
                                    <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                </span>
                                <form action="" method="get">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="Edit Profile">
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
                            <div class="text-center m-3 p-3 bg-secondary">
                                <h3>{{ $posts->count() }}</h3>
                                <span>Blogs Posted</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-light border rounded">
                <form action="{{ route('post') }}" method="post">
                    @csrf
                    <div class="form-group p-2">
                        <textarea name="content" rows="5" name="" id="" class="form-control" placeholder="Share your thoughts..."></textarea>
                        <div class="text-right p-2">
                            <input type="submit" value="Post" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-light mt-md-4 p-md-3 border rounded">
                <div class="header text-center m-md-3">
                    <h4 class="font-weight-bold">Blogs</h4>
                </div>
                @foreach ($posts as $post)
                    <div class="row mb-md-3">
                        <div class="blog col-md-12">
                            <div class="card">
                                <form action="" method="get">
                                    @csrf
                                    <div class="form-group card-header text-right">
                                        <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    <div class="form-group card-body">
                                        <div class="body">
                                            <p>
                                                {{ $post->content }}
                                            </p>
                                        </div>
                                        <div class="footer">
                                            <span class="text-secondary font-italic">-- Posted on {{ $post->updated_at }}</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
