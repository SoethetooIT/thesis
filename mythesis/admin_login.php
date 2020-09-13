<?php
if(isset($_POST['login'])){
	include '../feedback/db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

// echo $_SESSION['email'] = $email;

$sql = "SELECT * FROM admin where email='$email' && password='$password'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc() ;
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
  

    header("Location: ../feedback/view.php");  
  
} else {
 
 echo "<script>alert('Incorrect password!!');window.location.href = '../mythesis/admin.php';</script>";
 
  
}
$connect->close();

}
//header("Location: ../feedback/view.php"); 
?>