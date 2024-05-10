@extends('layout')
@section('content')

<div class="container mt-3">
    <h1 class="mb-4"> Upcoming Games </h1>
    <div class="mb-3"> <!-- margin bottom for Add game button -->
        <a href="{{ route('game-scheduler.create') }}"class="btn btn-success"> Add Game </a>
    </div>
    @if ($games -> isEmpty())
        <div class="alert alert-info"> No games scheduled yet </div> <!-- if $games is empty give out an alert info bar -->
    @else
        <div class="table-responsive"> <!-- responsive table wrapper -->
            <table class="table table-bordered table-hover"> <!-- table to display list of games -->
                <thead class="thead-dark"> <!-- thead class with dark background -->
                    <tr>
                        <!-- columns -->
                        <th scope="col"> Date </th>
                        <th scope="col"> League </th>
                        <th scope="col"> Start Time </th>
                        <th scope="col"> Number of Games </th>
                        <th scope="col"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game) <!-- repeats for each game -->
                        <tr>
                            <td>{{ $game -> game_date->format('d/m/Y') }}</td> <!-- date/month/year -->
                            <td>{{ $game -> league }}</td>
                            <td>{{ $game -> start_time -> format('H:i') }}</td> <!-- hours then minutes -->
                            <td>{{ $game -> number_of_games }}</td>
                            <td> <!-- actions -->
                                <form action="{{ route('game-scheduler.destroy',$game->id) }}" method="POST" onsubmit=" return confirm('Confirm delete please');"><!-- confirm delete with popup confirmation -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> Delete </button> <!-- delete button with action from game-scheduler controller destroy fucntion -->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection