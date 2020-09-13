<?php
require_once "db_connection.php";

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
			<h1 class="text-center">Overall Performance Ranking Table</h1>
			<table class="table table-hover table-info">
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Score</th>
				</tr>

				<?php 
					$no = 1;
					// $query = "SELECT * FROM teacher";
					$query ="SELECT *
								FROM teacher
								INNER JOIN scores
								ON teacher.id = scores.teacher_id ORDER BY scores.rate DESC";
					$teacher = mysqli_query($connect, $query);
					foreach ($teacher as $teachal) {
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><a href="detail.php?detail=<?php echo $teachal['id'] ?>"> <?php echo $teachal['name'] ?></a></td>
								<!-- <td><?php getdata($connect,$teachal['id']); ?></td> -->
								<td><?php echo $teachal['rate'] ?></td>
							</tr>


						<?php
						}
						?>


						<!-- <?php
								function getdata(mysqli $connect, $id) {
										$teacher_total=0;
		  								$query = "SELECT * FROM scores where teacher_id =$id ";
											$totals = mysqli_query($connect, $query);
		  								$row=mysqli_fetch_assoc($totals);
		  								$total=$row['total_score'];
		  								echo $total;
								} // call the function
							?> -->


				<!-- <?php
						$no = 1;
						$query = "SELECT * FROM teacher join feedback on teacher.id=feedback.teacher_id";
						$teacher = mysqli_query($connect, $query);
						foreach ($teacher as $teachal) {
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><a href="detail.php?detail=<?php echo $teachal['id'] ?>"> <?php echo $teachal['name'] ?></a></td>
								<td><?php echo $teachal['question1'] ?></td>
							</tr>


						<?php
						}
						?> -->
			</table>
			<a id="back" class="btn btn-primary" href="../mythesis/admin.php">Back</a>
			<a id="adding" class="btn btn-success" href="teacher_insert.php">Manage teachers</a>

</div>
</div>

</body>
<style type="text/css">
	#back{
		float: right;
	}
	#adding{
		float:left;
	}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>