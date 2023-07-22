<?php
include 'config.php';
  // Start session
session_start();

  // Check for form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
   $password = $_POST["password"];

    // Check if email and password are correct
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $error = '';
    if ($row && password_verify($password, $row["password"])) {
      // Login successful
      $_SESSION["username"] = $row["email"];
      $_SESSION["user_id"] = $row["id"];
      header("Location: home.php");
    } else {
      // Login failed
	 
	  if (empty($name)) {
		  $error = 'Invalid email or password.';
	  }
    }
    
    // Close database connection
    mysqli_close($conn);
  }
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Christmas Event</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
			<li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SignUp.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

<!-- Login Form -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<h2 class="text-center mb-4">Log In</h2>
			<form action="#" method="post">
				<div class="form-group">
					<label for="username">Email</label>
					<input type="email" class="form-control" name ="email" id="email" placeholder="Enter username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name ="password" id="password" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Log In</button>
				<?php if (isset($error)) {
				
					echo  "<p class='error'>".$error. "</p>";
					
        }
    		?>
			</form>
      <br>
      <p><a href= "forgot.php" >Forgot password?</a></p>
      <p>Don't have an account yet? <a href = "signup.php" >Create an account</a></p>

		</div>
	</div>
</div>

</body>
</html>