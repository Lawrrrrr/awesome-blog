@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-grey p-2 border border-dark">
                <textarea name="" id="" cols="100%" rows="5"></textarea>
                <input type="submit" value="Post" class="btn btn-primary">
            </div>
        </div>
    </div>
</div>
@endsection
