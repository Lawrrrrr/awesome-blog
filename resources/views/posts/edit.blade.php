@extends('layouts.app')

@section('content')
    <div class="container rounded p-md-3 mt-md-3" style="background-color: lightgrey;">
        <div class="edit m-md-3">
            <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
                @csrf
                <div class="form-group text-center">
                    <textarea name="content" id="" cols="" rows="5" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection