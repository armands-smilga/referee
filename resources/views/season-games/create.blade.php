@extends('layout')
@section('content')

<div class="container">
    <h1 class="my-4"> Add a New Game </h1>
        <!-- Form action to the season-games.store route -->
    <form action="{{route('season-games.store')}}"method="POST">
    @csrf
        <!-- field for date -->
        <div class="form-group mb-3">
            <label for="date"> Date </label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <!-- field for amount of games -->
        <div class="form-group mb-3">
            <label for="amount_of_games"> Amount of Games </label>
            <input type="number" class="form-control" id="amount_of_games" name="amount_of_games" required>
        </div>
        <!-- dropdown leagues -->
        <div class="form-group mb-3">
            <label for="league"> League </label>
            <select class="form-control" id="league" name="league" required>
                <option value=""> Choose a league </option>
                <option value="NBA Jr."> NBA Jr. </option>
                <option value="LJBL"> LJBL </option>
                <option value="City Championship"> City Championship </option>
                <option value="BBBL"> BBBL </option>
                <option value="Seniors"> Seniors </option>
                <option value="LBL3"> LBL3 </option>
                <option value="LBL2"> LBL2 </option>
                <option value="LBL1"> LBL1 </option>
                <option value="FIBA"> FIBA </option>
                <option value="EuroLeague"> EuroLeague </option>
            </select>
        </div>
        <!-- button -->
        <button type="submit" class="btn btn-primary"> Submit </button>
    </form>
</div>
@endsection