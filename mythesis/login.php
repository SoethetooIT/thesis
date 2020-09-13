
    <?php 
      include 'header.php';

    ?>

<body>
  <html>
<header>
  <div class="main-header" style="margin-top: 5%;"> 
    <h1 class="text-info display-2" style="font-size: 50px">Login</h1> 
    <hr/>
    <h3 class="text-dark">Welcome To TPA System </h3>
    <form action="student_login.php" method="post">
      <p><input type="text" name="email" placeholder="Email" required/></p>
      <p><input type="password" name="password" placeholder="Password" required/></p>
      <p><button>Continue</button></p>
    </form>
  </div>
  

</header>
    <?php  
      include 'footer.php';
    ?>
