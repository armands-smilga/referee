<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RefereeApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <!-- navbar starts -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/home"> RefereeApp <span class="glyphicon glyphicon-wrench"></span></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="tree"> Tools <span class="caret"></span>
                </a>
                    <!-- dropdown tools menu  -->
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/season-games') }}"> Season Games </a></li>
                    <li><a href="{{ url('/items') }}"> Equipment </a></li>
                    <li><a href="{{ url('/game-scheduler') }}"> Game Scheduler </a></li>
                </ul>
            </li>
        </ul>
            <!-- login/register --- glyphicon are symbols from bootstrap -->
        <ul class="nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ url('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
                <li><a href="{{ url('registration') }}"><span class="glyphicon glyphicon-user"></span> Register </a></li>
            @else
                <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
            @endguest
        </ul>
    </div>
        <!-- ends -->
</nav>
      @yield('content')
</body>
</html>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- for security,dates,clocks,ect -->
<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <!-- using boostrap to have dropable navbar and use glyphicons -->