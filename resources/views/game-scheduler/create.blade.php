@extends('layout')
@section('content')

<div class="container">
    <h1 class="mb-4"> Game Scheduler </h1> <!-- container with margin bottom extra large -->
    <form method="POST" action="{{ route('game-scheduler.store' )}}" class="needs-validation" novalidate> <!-- form to post with action that will send data to server in specified route
generates url for the store method in GameSchedullerController, needs-validation to provide client-side form validation with boostrap -->
        @csrf
        <div class="form-group mb-3">
            <label for="game_date"class="form-label"> Game Date: </label> <!-- label -->
            <input id="game_date"name="game_date" type="date" class="form-control" value="{{ old('game_date') }}" required> <!-- input field -->
            <!-- if error occurs error message -->
            @error('game_date')
                <div class="invalid-feedback d-block"> {{$message}} </div>
            @enderror
        </div>
       
        <div class="form-group mb-3">
            <label for="league"class="form-label"> League: </label>
            <input id="league"name="league" type="text" class="form-control" value="{{ old('league') }}" required>
            @error('league')
                <div class="invalid-feedback d-block"> {{$message}} </div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="start_time"class="form-label"> Start Time: </label>
            <input id="start_time"name="start_time" type="time" class="form-control" value="{{ old('start_time') }}" required>
            @error('start_time')
                <div class="invalid-feedback d-block"> {{$message}} </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="number_of_games"class="form-label"> Number of Games: </label>
            <input id="number_of_games"name="number_of_games" type="number" class="form-control" value="{{ old('number_of_games' )}}" min="1" required>
            @error('number_of_games')
                <div class="invalid-feedback d-block"> {{$message}} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"> Schedule Game </button>
    </form>
</div>
@endsection