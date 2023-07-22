<?php
include 'config.php';
  // Start session
session_start();

  // Check for form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
  

   $without_hash_password =$_POST["password"];
   $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
   $confirm_password = $_POST['confirm_password'];


    // Check if email and password are correct
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $error = [];
    $message = '';
    if ($row) {
       
        // Check if passwords match
        if($without_hash_password != $confirm_password) {
            $error[] =  "Password and confirm password do not match!";
        
        }
        if(empty($error)) {
            $query = "UPDATE users SET password='$password' WHERE email='$email'";

            $return =  mysqli_query($conn, $query);
    
                if($return) {
                    $message =  "Password has been updated successfully, <a href='login.php'>Click here to login</a>";
                }else {
                    $error[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }

   
    } else {
		  $error[] = 'Email does not exist in our database, Please enter valid email.';
	  
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
			<h2 class="text-center mb-4">Update Password</h2>
			<form action="#" method="post">
				<div class="form-group">
					<label for="username">Email</label>
					<input type="email" class="form-control" name ="email" id="email" placeholder="Enter Email" required>
				</div>
                <div class="form-group">
					<label for="password">New Password</label>
					<input type="password" class="form-control"  name="password" id="password" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
					<label for="password">Confirm New Password</label>
					<input type="password" class="form-control"  name="confirm_password" placeholder="Enter Confirm Password" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Update</button>
                <br>
				<?php if (!empty($error)) {
                    foreach($error as $key => $single){
                        echo  "<p class='error'>".$single. "</p>";
                    }
                }
                if(isset($message)) {
                    echo  "<p class='success'>".$message. "</p>";
                }
                ?>
			</form>

		</div>
	</div>
</div>

</body>
</html>