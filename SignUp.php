<?php
include 'config.php';

if(!empty($_POST)) {

	$email = $_POST['email'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
	$without_hash_password =$_POST["password"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$confirm_password = $_POST['confirm_password'];

	$error = [];
	// Check if passwords match
	if($without_hash_password != $confirm_password) {
		$error[] =   "Password and confirm password do not match!";
	
	}

	// Validate email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error[] =   "Invalid email address!";
	
	}

	// Insert data into database

	if(empty($error)) {
		$sql = "INSERT INTO users (first_name, last_name,email, password) VALUES ('$first_name', '$last_name','$email', '$password')";

		//$sql = "INSERT INTO users ('first_name', 'last_name','email', 'password') VALUES ('$first_name', '$last_name', '$email', '$without_hash_password')";
			$message= '';
		if (mysqli_query($conn, $sql)) {
			$message =  "You have signed up successfuly, Click on login button to login.";
			//header("Location: login.php");
		} else {
			$error[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	
	// Close database connection
	mysqli_close($conn);

	}

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
                    <a class="nav-link" href="index.html">Home</a>
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

<!-- Sign Up Form -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<h2 class="text-center mb-4">Sign Up</h2>
			<form method="post" action="#">
				<div class="form-group">
					<label for="username">First Name</label>
					<input type="text" class="form-control"  name="firstname" id="firstname" placeholder="Enter First Name" required>
				</div>
				<div class="form-group">
					<label for="username">Last Name</label>
					<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control"  name="password" id="password" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
					<label for="password">Confirm Password</label>
					<input type="password" class="form-control"  name="confirm_password" placeholder="Enter Confirm Password" required>
				</div>
				<button type="submit"  name = "submit" class="btn btn-primary btn-block">Sign Up</button>
			</form>
			<br>
			<?php
			if(!empty($error)) {
				foreach($error as $key => $single) {
					echo  "<p class='error'>".$single. "</p>";
				}
			}
			if(isset($message)) {
				
					echo  "<p class='success'>".$message. "</p>";
			
			}
			?>
			<p>Already Registered ? <a href="login.php">Login </a></p>
		</div>
	</div>
</div>

</body>
</html>