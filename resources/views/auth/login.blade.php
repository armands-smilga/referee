@extends('layout')
@section('content')
<div class="container">
    <div class="row"> 
        <div class="col-md-8 offset-md-2"> <!-- hold the form with offset centering aka push-->

            <h2>Login Page</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div> <!-- if session success display success message-->
            @endif
            <form method="post" action="{{route('login.post')}}"> <!-- route to after pressing post action-->
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label"> Email </label> <!-- email label-->
                    <div class="col-md-8"> <!-- cell/collumn to enter email-->
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{old('email')}}"> <!-- email input field-->
                    </div>
                    @error('email') <!-- email validation error check-->
                    <span class="text-danger">{{ $message }}</span> <!-- if error occurs the error message-->
                    @enderror
                </div>

                <div class="form-group row"> <!-- form group password-->
                    <label class="col-md-4 col-form-label"> Password </label> <!-- password label-->
                    <div class="col-md-8"> <!-- password column -->
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"> <!-- password input field -->
                    </div>
                    @error('password') <!-- password validation error check-->
                        <span class="text-danger">{{ $message }}</span> <!-- if error occurs the error message-->
                    @enderror
                </div>

                <div class="form-group row"> <!-- form group sumbit-->
                    <div class="offset-md-4 col-md-8"> <!-- column for button with offset allignment-->
                    <button type="submit" class="btn btn-success"> Enter </button> <!-- sumbit button -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection