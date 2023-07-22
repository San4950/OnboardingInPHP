<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christmas Event</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Christmas Event</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
         
            <?php
        if(isset($_SESSION['username'])){
        ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, <?php echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="home.php">Dashboard</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <?php  } else {
        ?>
           <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="SignUp.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
            <?php } ?>
        </div>
      
    </nav>

    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Join Us for a Merry Christmas Celebration</h1>
                    <p class="lead">The first known date of Christmas being rejoiced on December 25th was in 336 AD, through the time of the Roman Emperor Constantine who was the first Christian Roman Emperor. After some years, Pope Julius I formally announced that the birth of Jesus would rejoice on the 25th of December.</p>
                    <a href="signup.php" class="btn btn-primary btn-lg">Join for the Event</a>
                </div>
                <div class="col-md-6">
                    <img src="images/christmasParty.png" alt="Christmas Event" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>About the Event</h2>
                    <p>The festive season began a few months back and we could not be more excited! With the new year around the corner, we are left with only a handful of special occasions and thank God, Christmas is one of them!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Event Schedule</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>December 24</td>
                                <td>6:00 PM</td>
                                <td>Christmas Eve Service</td>
                            </tr>
                            <tr>
                                <td>December 25</td>
                                <td>10:00 AM</td>
                                <td>Christmas Day Brunch</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </section>
                    </body>
                    </html>
