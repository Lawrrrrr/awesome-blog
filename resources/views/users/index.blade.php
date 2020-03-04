@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container bg-light mt-md-5">
        <div class="header mb-md-4">
            <h3 class="font-weight-bold">All Members</h3>
        </div>
        @include('includes.list')
    </div>
@endsection