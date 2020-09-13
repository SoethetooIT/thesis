<?php
session_start();
require_once "db_connection.php";
if (isset($_POST['submit'])) {
	$id = $_POST['teacher'];

	$Q1 = $_POST['Q1'];
	$Q2 = $_POST['Q2'];
	$Q3 = $_POST['Q3'];
	$Q4 = $_POST['Q4'];
	$Q5 = $_POST['Q5'];
	$Q6 = $_POST['Q6'];
	$Q7 = $_POST['Q7'];

	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$student_id = $_SESSION['student_id'];

	$query = "SELECT * FROM feedback WHERE teacher_id = $id and student_id =$student_id";
	$data = mysqli_query($connect, $query);
	// echo $data->num_rows;
	if($data->num_rows ==0){
		
		$query = "INSERT INTO feedback (teacher_id, student_id, question1, question2, question3, question4, question5, question6, question7)
				VALUES ('$id', '$student_id', '$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7')";
				if (mysqli_query($connect, $query)) {
		  echo "<font color='blue'<h1 text-align='center'>Thank for your feedback!</h1></font>";

		  $latest_id = $connect->insert_id;

		  $last = "SELECT teacher_id FROM feedback where id = $latest_id";
		  $last1 = mysqli_query($connect, $last);
		  $row=mysqli_fetch_assoc($last1);
		  $teacher_id=$row['teacher_id'];

		  $teacher_total=0;
		  $teacher_rate=0.0;
		  $q1_max=0;
		  $q2_max=0;
		  $q3_max=0;
		  $q4_max=0;
		  $q5_max=0;
		  $q6_max=0;
		  $q7_max=0;
			$selectall = "SELECT * FROM feedback where teacher_id =$teacher_id ";
			$totals = mysqli_query($connect, $selectall);
			foreach ($totals as $total) {
					$teacher_total += $total['question1']+$total['question2']+$total['question3']+$total['question4']+$total['question5']+$total['question6']+$total['question7'];
					$teacher_rate += $total['question1']*0.15 +$total['question2']*0.15+$total['question3']*0.15+$total['question4']*0.15+$total['question5']*0.15+$total['question6']*0.15+$total['question7']*0.1;
					$q1_max+= $total['question1'];
					$q2_max+= $total['question2'];
					$q3_max+= $total['question3'];
					$q4_max+= $total['question4'];
					$q5_max+= $total['question5'];
					$q6_max+= $total['question6'];
					$q7_max+= $total['question7'];
			}


		  $score = "UPDATE scores SET total_score=$teacher_total,
		  q1_max=$q1_max,q2_max=$q2_max,q3_max=$q3_max,q4_max=$q4_max,q5_max=$q5_max,q6_max=$q6_max,q7_max=$q7_max WHERE teacher_id=$teacher_id";
		  mysqli_query($connect, $score);

		  ////////////
		} //else {
		  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		//}

			// $query = "SELECT * FROM feedback";

			//  $data = mysqli_query($connect, $query);
	}else{ echo '<script>alert("You are already given feedback to this teacher!")</script>';
		

	}
	// $score = "UPDATE 'scores' SET 'total_score'=1 WHERE id=1";
	// $score = "UPDATE scores SET total_score=1 WHERE id=1";
	// 		if(mysqli_query($connect, $score))
	// 		{
	// 			echo '<script>alert("Success")</script>';
	// 		}else{
	// 			echo '<script>alert("Error")</script>';
	// 		}
			
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FeedBack Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="jumbotron">
		<a href="../mythesis/login.php" style="float:right;" class="btn btn-primary"  onclick="return confirm('Are you sure want to logout!!');">Logout</a>
			<h1 class="text-center">Feedback Form</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-md-4">

				Select Teacher
				<select name="teacher" id="" class="form-control">
							<?php
				$query = "SELECT * FROM teacher";
				$teacher = mysqli_query($connect, $query);

				foreach ($teacher as $teachal) {
					?>
									<option value="<?php echo $teachal['id'] ?>"><?php echo $teachal['name'] ?></option>
							<?php
				}
				?>

				        </select>
							</div>
							<div class='col-md-4 ml-auto'>
								<p>Welcome</p>
								<p><?php echo $_SESSION['name']; ?></p>
							</div>
			</div>

			<table class="table table-hover table-bordered table-info">
				<tr>
					<td colspan="3" class="text-center">
						<button type="button" style="background-color:green;color: white">Strongly Agree = 5</button>
						<button type="button" style="background-color:blue;color: white"> Agree = 4</button>
						<button type="button" style="background-color:gray;color:white">Neutral =3</button>
						<button type="button" style="background-color:yellow;color: gray">Disagree =2</button>
						<button type="button" style="background-color:red;color: white">Strongly Disagree =1</button>
					</td>
				</tr>

				<tr>
					<th>No</th>
					<th>Question</th>
					<th>Rate</th>
				</tr>
				<tr>
					<td>1</td>
					<td><p> Appears well-versed in this subject area.</p></td>
					<td>
						<label for="15">5</label><input type='radio' name="Q1" checked value='5' id="15">
						<label for="14">4</label><input type='radio' name="Q1" value='4' id="14">
						<label for="13">3</label><input type='radio' name="Q1" value='3' id="13">
						<label for="12">2</label><input type='radio' name="Q1" value='2' id="12">
						<label for="11">1</label><input type='radio' name="Q1" value='1' id="11">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><p> Be enthusiastic in teaching subject in class rooom.</p></td>
					<td>
						<label for="25">5</label><input type='radio' name="Q2" checked value='5' id="25">
						<label for="24">4</label><input type='radio' name="Q2" value='4' id="24">
						<label for="23">3</label><input type='radio' name="Q2" value='3' id="23">
						<label for="22">2</label><input type='radio' name="Q2" value='2' id="22">
						<label for="21">1</label><input type='radio' name="Q2" value='1' id="21">
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td><p> Be well prepared.</p></td>
					<td>
						<label for="35">5</label><input type='radio' name="Q3" checked value='5' id="35">
						<label for="34">4</label><input type='radio' name="Q3" value='4' id="34">
						<label for="33">3</label><input type='radio' name="Q3" value='3' id="33">
						<label for="32">2</label><input type='radio' name="Q3" value='2' id="32">
						<label for="31">1</label><input type='radio' name="Q3" value='1' id="31">
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td><p> Communicates clearly in class.</p></td>
					<td>
						<label for="45">5</label><input type='radio' name="Q4" checked value='5' id="45">
						<label for="44">4</label><input type='radio' name="Q4" value='4' id="44">
						<label for="43">3</label><input type='radio' name="Q4" value='3' id="43">
						<label for="42">2</label><input type='radio' name="Q4" value='2' id="42">
						<label for="41">1</label><input type='radio' name="Q4" value='1' id="41">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><p> Be approachable to disucuss.</p></td>
					<td>
						<label for="55">5</label><input type='radio' name="Q5" checked value='5' id="55">
						<label for="54">4</label><input type='radio' name="Q5" value='4' id="54">
						<label for="53">3</label><input type='radio' name="Q5" value='3' id="53">
						<label for="52">2</label><input type='radio' name="Q5" value='2' id="52">
						<label for="51">1</label><input type='radio' name="Q5" value='1' id="51">
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td><p> Provides useful guidelines.</p></td>
					<td>
						<label for="65">5</label><input type='radio' name="Q6" checked value='5' id="65">
						<label for="64">4</label><input type='radio' name="Q6" value='4' id="64">
						<label for="63">3</label><input type='radio' name="Q6" value='3' id="63">
						<label for="62">2</label><input type='radio' name="Q6" value='2' id="62">
						<label for="61">1</label><input type='radio' name="Q6" value='1' id="61">
					</td>
				</tr>
				<tr>
					<td>7</td>
					<td><p> Be effective teacher.</p></td>
					<td>
						<label for="75">5</label><input type='radio' name="Q7" checked value='5' id="75">
						<label for="74">4</label><input type='radio' name="Q7" value='4' id="74">
						<label for="73">3</label><input type='radio' name="Q7" value='3' id="73">
						<label for="72">2</label><input type='radio' name="Q7" value='2' id="72">
						<label for="71">1</label><input type='radio' name="Q7" value='1' id="71">
					</td>
				</tr>

			</table>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>

</div>
</div>

</body>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>