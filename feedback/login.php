<?php
require_once "db_connection.php";
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT* FROM `student` WHERE email='$email'";
	$result = mysqli_query($connect, $query);
	if (mysqli_num_rows($result) == 0) {

		echo "<h2 class='text-center text-warning'>Please Register !</h2>";

	} else {

		while ($row = mysqli_fetch_assoc($result)) {
			$db_id = $row['id'];
			$db_password = $row['password'];
		}
		if ($password == $db_password) {
			$_SESSION['id'] = $db_id;
			header("location:feedback.php");
		} else {
			echo "<h3 class='text-danger'>Incorrect Password!</h3>";
		}
	}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Teacher's Performance Analysis</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body >
<div class="container"  style="width:800px">
	<div class="jumbotron">
		<h1 class="text-center">Login Form</h1>
		<form action="" method="post">
<div class="card-body">
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
		</div>
<div class="card-footer">
			<div class="form-group">
				<input type="submit" name="login" value="Login" class="btn btn-primary">
			</div>
    </div>

		</form>
				</div>
			</div>

	</body>
	<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>