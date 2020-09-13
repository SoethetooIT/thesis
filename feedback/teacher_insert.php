<?php
require_once "db_connection.php";
if (isset($_POST['add_teacher'])) {
	$name = $_POST['name'];
	$query = "INSERT INTO `teacher`(`name`) VALUES ('$name')";
	$insertquery = mysqli_query($connect, $query);
	$latest_id = $connect->insert_id;
	$score = "INSERT INTO `scores`(`teacher_id`) VALUES ('$latest_id')";
	$save = mysqli_query($connect, $score);

	//echo "Insert Successfully";
}
if (isset($_POST['update'])) {
	$id = $_GET['edit'];
	$name = $_POST['update_teacher'];
	$query = "UPDATE `teacher` SET `name`='$name' WHERE id=$id";
	mysqli_query($connect, $query);
	//echo "Update Successfully";
	header('location:teacher_insert.php');
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$query = "DELETE FROM `teacher` WHERE id=$id";
	mysqli_query($connect, $query);
	//echo "Delete Successfully";
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Teacher Insert Form
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="col-md-4">

    <?php
//==================================Insert and Update===================================
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	?>
        <form action=" " method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Update Teacher</label>
       <?php
		$query = "SELECT * FROM teacher WHERE id=$id";
		$data = mysqli_query($connect, $query);
		foreach ($data as $techal) {
	   ?>
                <input type="text" name="update_teacher" value="<?php echo $techal['name'] ?>" class="form-control">
 <?php
}
 ?>

            </div>
            <div class="form-group">
                <input type="submit" name ="update" value="Update" class="btn btn-primary">
                <a id="cancel" href="teacher_insert.php" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    <?php
} else {
	?>
<form action=" " method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="aaa">Please fill the name of teacher who you want to add!</label>
            <input type="text" name="name" class="form-control" placeholder="Teacher name" required/>
        </div>

        <div class="form-group">
         <input type="submit" name="add_teacher" class="btn btn-success" value="Add Teacher">
         <a id="back" class= "btn btn-primary" href="view.php">Back</a>
        </div>
    </form>
   <!--  =======================End Update and insert================================ -->
<?php }?>
</div>


    <div class="col-md-8">
        <table class="table table-hover">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Name</th>
                <th class="text-center">Update</th>
                <th class="text-center">Delete</th>
            </tr>
            <?php
$no = 1;
$query = "SELECT * FROM teacher";
$data = mysqli_query($connect, $query);
foreach ($data as $value) {
	?>
	<tr>
	<td class="text-center"><?php echo $no++ ?></td>
	<td class="text-center"><?php echo $value['name'] ?></td>
	<td class="text-center"><a href="teacher_insert.php?edit=<?php echo $value['id'] ?>" class="btn btn-warning">Update</td>
	<td class="text-center"><a href="teacher_insert.php?delete=<?php echo $value['id'] ?>" class='btn btn-danger' onclick="return confirm('Are You Sure to Delete')">Delete</td>
		</tr>

<?php }?>
        </table>
    </div>
</body>
<style type="text/css">
	#back{
		float:right;
	}
	#cancel{
		float:right;
	}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
