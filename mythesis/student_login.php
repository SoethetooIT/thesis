<?php 

session_start();

include '../feedback/db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

// echo $_SESSION['email'] = $email;

$sql = "SELECT * FROM student where email='$email' && password='$password'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
     $_SESSION['email'] = $row["email"];
     $_SESSION['name'] = $row["name"];
     $_SESSION['student_id'] = $row["id"];

    header("Location: ../feedback/feedback.php"); 
  }
} else {
 
 echo "<script>alert('Incorrect password!!');window.location.href = '../mythesis/login.php';</script>";
 
  
}
$connect->close();

// header("Location: ../feedback/feedback.php"); 
?>