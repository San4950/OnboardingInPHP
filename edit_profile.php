<?php
include 'config.php';
session_start(); // Start session

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];


// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];

  // Update the user's information in the database
  $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', email='$email' WHERE id='$user_id'";

  $return =  mysqli_query($conn, $query);

    if($return) {
      $message =  "Data has been updated successfully.";
    }else {
      $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }


$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Christmas Event</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
	  <a class="nav-link" href="home.php">Home</a>      </li>
  </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome, <?php echo $user['first_name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="home.php">Home</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
    
			<h2 class="text-center mb-4">Edit Information</h2>
			<form method="post" action="#">
				<div class="form-group">
					<label for="username">First Name</label>
					<input type="text" class="form-control"  name="firstname" id="firstname" placeholder="Enter First Name" value= "<?php  echo  (!empty($user)) ?  $user['first_name'] : ''?>" required>
				</div>
				<div class="form-group">
					<label for="username">Last Name</label>
					<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name"  value= "<?php  echo  (!empty($user)) ?  $user['last_name'] : ''?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value= "<?php  echo  (!empty($user)) ?  $user['email'] : ''?>" required>
				</div>
				<button type="submit"  name = "submit" class="btn btn-primary btn-block">Update</button>
<br>
                <?php
                    if(isset($message)) {
                        echo  "<p class='success'>".$message. "</p>";
                    }
                  ?>
			</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

</script>

</body>
</html>
