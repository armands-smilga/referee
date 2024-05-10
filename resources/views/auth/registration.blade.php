@extends('layout')
@section('content')
<!-- registration blade.php copy and paste from login page basiaclly-->
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h2>Registration Page</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="post" action="{{ route('registration.post') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="offset-md-4 col-md-8">
                        <button type="submit" class="btn btn-success">Enter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection