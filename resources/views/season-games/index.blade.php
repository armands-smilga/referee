@extends('layout')
@section('content')

<link href="{{ asset('css/season-games.css ')}}" rel="stylesheet">
<div class="container-fluid season-games-container"> <!-- container-fluid class from bootstrap that creates full-width container -->
    <div class="row">
        <!-- pie chart column -->
        <div class="col-md-6">
            <h1 class="my-4"> Refereed Games Currently </h1>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <!-- games table column -->
        <div class="col-md-6">
            <a href="{{ route('season-games.create') }}" class="btn btn-primary my-4"> Add a New Game </a>
            <table class="table table-bordered table-striped season-games-table">
                <thead>
                    <tr>
                        <th> Date </th>
                        <th> Amount of Games </th>
                        <th> League </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($seasonGames as $game)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}</td>
                            <td>{{ $game->amount_of_games }}</td>
                            <td>{{ $game->league }}</td>
                            <td>
                                <a href="{{ route('season-games.edit',$game -> id) }}" class="btn btn-info"> Edit </a> <!-- generates url for editing the game with the given $gameid -->
                                <form action="{{ route('season-games.destroy',$game -> id) }}" method="POST" class="d-inline"> <!-- deletes url for editing the game with the given $gameid -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you positive you want to delete this?')"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="4"> No games have been added </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- https://www.chartjs.org/docs/latest/getting-started/ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx,{
        type: 'pie',
        data:{
            labels: @json($chartData['labels']),
            datasets: [@json($chartData['datasets'][0])]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });
</script>
@endsection
