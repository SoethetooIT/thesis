  	<?php 
      include 'header.php';
    ?>

<?php
require_once "db_connection.php";

if (isset($_POST['register'])) {
	$n = $_POST['n'];
	$e = $_POST['e'];
	$p = $_POST['p'];
	//$p = password_hash($p, PASSWORD_DEFAULT)
	$mob = $_POST['mob'];
	$class = $_POST['class'];
	$gen = $_POST['gen'];

	$query = "INSERT INTO `student`(`name`, `email`, `password`, `ph_no`, `class`, `gender`) VALUES ('$n','$e','$p','$mob','$class','$gen')";
	mysqli_query($connect, $query);

	echo "Registeration Successfully!";
	
	
}

?>

<div class="container adjust-top">
	<div class="jumbotron">
		<h1 class="text-center">Register Form</h1>
					<form action="" method="post" enctype="multipart/form-data">
						 <table class="table table-info table-hover">

                        <tr>
					        <td>Enter Your name</td>
					          <Td>
						       <input  type="text" name="n" class="form-control" required/>
						      </Td>
				        </tr>

				        <tr>
					      <td>Enter Your email </td>
					        <td>
					        	<input type="email" name="e" class="form-control" required/>
					        </td>
				        </tr>

				        <tr>
					       <td>Enter Your Password </td>
					         <td>
					         	<input type="password" name="p" class="form-control" required/>
					         </td>
				        </tr>

				<tr>
					<td>Enter Your Mobile Number </td>
					<td>
						<input type="text" name="mob" class="form-control" required/>
					</td>
				</tr>

		        <tr>
					<td>Select Your Class</td>
					<td>
						<select name="class" class="form-control" required/>
					<option>IBE</option>
					<option>IIBE</option>
					<option>IIIBE</option>
					<option>IVBE</option>
					<option>VBE</option>
					<option>VIBE</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Select Your Gender</td>
					<td>
				       Male<input type="radio" name="gen" value="m"/>
				       Female<input type="radio" name="gen" value="f"/>
					</td>

				</tr>
		</table>
			<input type="submit" value="Register" class="btn btn-outline-primary " name="register" style="width: 80px; height: 40px; " />
         <input type="reset" value="Reset" class="btn btn-outline-primary " style="width: 80px; height: 40px;"/> 
         					<a id="login" class="btn btn-success" href="../mythesis/login.php" margin="right">To Login</a>
					</form>
				</div>
			</div>


    
</body>
</html>
<style type="text/css">
#login{
	float:right;
	}

</style>
  <?php 
      include 'footer.php';
    ?>
 