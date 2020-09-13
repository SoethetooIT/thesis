<?php
require_once "db_connection.php";
if (isset($_GET['detail'])) {
	$id = $_GET['detail'];

	$query = "SELECT * FROM teacher WHERE id=$id";
	$teacher = mysqli_query($connect, $query);
	foreach ($teacher as $techal) {
		$name = $techal['name'];
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>View</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="jumbotron">
			<h1 class="text-center">Performance Detail of <?php echo $name ?></h1>
	<table class="table table-bordered table-info">
		<tr>
			<th>No</th>
			<th class="text-center">Question</th>
			<th>Score</th>
		</tr>
		<?php
$no = 1;
$question1 = 0;
$question2 = 0;
$question3 = 0;
$question4 = 0;
$question5 = 0;
$question6 = 0;
$question7 = 0;
$query = "SELECT * FROM feedback WHERE teacher_id=$id";
$teacher = mysqli_query($connect, $query);
foreach ($teacher as $score) {
		$question1 += $score['question1'];
		$question2 += $score['question2'];
		$question3 += $score['question3'];
		$question4 += $score['question4'];
		$question5 += $score['question5'];
		$question6 += $score['question6'];
		$question7 += $score['question7'];
}
// Total score
	$totals =  $question1+$question2+$question3+$question4+$question5+$question6+$question7;


?>

<tr>
		<td>1</td>
		<td>Appears well-versed in this subject area.</td>
		<td class="text-center"><?php echo $question1 ?></td>
	</tr>
	<tr>
		<td>2</td>
		<td> Be enthusiastic in teaching subject in class rooom.</td>
		<td class="text-center"><?php echo $question2 ?></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Be well prepared.</td>
		<td class="text-center"><?php echo $question3 ?></td>
	</tr>
	<tr>
		<td>4</td>
		<td>Communicates clearly in class.</td>
		<td class="text-center"><?php echo $question4 ?></td>
	</tr>
	<tr>
		<td>5</td>
		<td>Be approachable to discuss.</td>
		<td class="text-center"><?php echo $question5 ?></td>
	</tr>
	<tr>
		<td>6</td>
		<td>Provides useful guidelines.</td>
		<td class="text-center"><?php echo $question6 ?></td>
	</tr>
	<tr>
		<td>7</td>
		<td>Be effective teacher.</td>
		<td class="text-center"><?php echo $question7 ?></td>
	</tr>

<tr>
		<!-- Total for score -->
		
		<td colspan="2" class="text-center">Total Score</td>
		<td class="text-center"><?php echo $totals ?></td>
	</tr>
</table>
<a style="float:right;" class="btn btn-primary" href="view.php">Back</a>
</div>
</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>