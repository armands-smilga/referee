@extends('layout')
@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referee Assistant</title>
    <!-- google font & bootstraps -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            /* background image & card hover/w button */
            background:url('background.jpeg'); 
            background-size:cover;
            font-family:'Roboto', sans-serif;
        }
        .card:hover {
            transform: scale(1.10); /* on hover make the card bigger */
            box-shadow: 0 0 20px rgba(0,0,0,0.5); /* on hover create shadow box */
        }
        .btn-custom {
            background-color:#4CAF50; /* button color */
            color:white; /* button text color */
        }
    </style>
    <div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.3);"> <!--BANNERIS, .3 transperancy --> 
        <h1> Referee Assistant </h1>
        <p> Manage your officiating needs </p>
    </div>
        <!-- equipment checklist -->
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                    <img src="uniform.jpg" class="card-img-top" alt="Referee Uniform">
                        <div class="card-body">
                            <h4 class="card-title"> Equipment Checklist </h4>
                            <p class="card-text"> Create your custom checklist & ensure you're always game-ready. </p>
                            <a href="/items" class="btn btn-custom"> Check Equipment </a>
                    </div>
                </div>
        </div>
        <!-- game scheduler -->
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="schedule.jpeg" class="card-img-top" alt="Game Scheduler">
                <div class="card-body">
                    <h4 class="card-title"> Game Scheduler </h4>
                    <p class="card-text"> Schedule your future games here. </p>
                    <a href="/game-scheduler" class="btn btn-custom"> See games </a>
                </div>
            </div>
        </div>
        <!-- season game-list -->
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="list.png" class="card-img-top" alt="Game List">
                <div class="card-body">
                    <h4 class="card-title"> Refereed Games </h4>
                    <p class="card-text"> Keep a log of your officiated games. </p>
                    <a href="/season-games" class="btn btn-custom"> Manage Games </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection