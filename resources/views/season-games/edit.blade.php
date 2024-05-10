@extends('layout')
@section('content')

<div class="container">
    <h1 class="my-4"> Edit Game </h1>
    <form action="{{route('season-games.update', $seasonGame->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group"> <!-- form group for date -->
            <label for="date"> Date </label>
            <input type="date" class="form-control" id="date" name="date" value="{{\Carbon\Carbon::parse($seasonGame -> date) -> format('Y-m-d')}}" required>
        </div>

        <div class="form-group"> <!-- form group for amount of games -->
            <label for="amount_of_games"> Amount of Games </label>
            <input type="number" class="form-control" id="amount_of_games" name="amount_of_games" value="{{ $seasonGame -> amount_of_games }}" required>
        </div>

        <div class="form-group"> <!-- form group for league -->
            <label for="league"> League </label>
            <input type="text" class="form-control" id="league" name="league" value="{{ $seasonGame -> league }}" required>
        </div>
            <!-- button -->
        <button type="submit" class="btn btn-primary"> Update Game </button>
    </form>
</div>
@endsection
