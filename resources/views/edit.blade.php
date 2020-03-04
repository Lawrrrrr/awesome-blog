@extends('layouts.app')

@section('content')
{{-- {{ dump($errors) }} --}}
    <div class="container rounded mt-md-5 p-md-3" style="background-color: #DCDCDC;">
        <div class="edit-form mt-md-5">
            <h2 class="mb-md-3 text-center">Edit Profile</h2>
            <form action="{{ route('home.update') }}" method="post" class="">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="" class="mr-md-3">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="col-md-4 form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" value="{{ auth()->user()->first_name }}">
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="mr-md-3">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="col-md-4 form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" value="{{ auth()->user()->last_name }}">
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="mr-md-3">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="col-md-4 form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}">
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="mr-md-3">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="col-md-4 form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/home" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection