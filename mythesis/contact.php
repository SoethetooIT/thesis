
  	<?php 
   		include 'header.php';
    ?>

    <?php
    session_start();
	include'../feedback/db_connection.php';

if (isset($_POST['submit'])) {
	$n = $_POST['n'];
	$mb = $_POST['mb'];
	$e = $_POST['e'];
	//$p = password_hash($p, PASSWORD_DEFAULT)
	$msg= $_POST['msg'];
	

	$query = "INSERT INTO `contact`(`name`, `mobile`, `email`, `message`) VALUES ('$n','$mb','$e','$msg')";
	mysqli_query($connect, $query);

	echo "Thanks for your contact!";
	
	
}

?>	
  	<section class="p-5 text-secondary adjust-top"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col text-left" style="font-family: serif;">
					<h1 class="text-info display-2">Contact Us</h1>
					
				</div>
			</div>

			<div class="row justify-content-left">
		       <div class="col-lg-6 col-md-8 ol-sm-10">
			     
			    <form action="" class="text-muted">
		             <div class="form-group">
			           <label for="" >Name:</label>
			           <input type="text" name="n" class="form-control" required/>
		             </div>

		        <div class="form-group">
		             <label for="" >Mobile Number:</label>
		             <input type="mobile" name="mb" class="form-control" required/>
	            </div>

	            <div class="form-group">
		             <label for="">Email Address:</label>
		             <input type="email" name="e" class="form-control" required/>
	            </div>


	            <div class="form-group">
		            <label for="" >Message</label>
		            <textarea name="" name="msg" id="" cols="40" rows="10" class="form-control" required></textarea>
	           </div>
                  <button class="btn btn-outline-primary btn-block" style="submit" name="submit">Submit</button>
	           </form>

		      </div>
		    
        <div class="col-md-4 text-right" style="margin-top:200px;">
                <h3 class="text-info" style="font-family: cursive;">Contact Details</h3>
                
                <p>
                    <abbr title="Phone">Phone</abbr>: (+95)9972281023</p>
                <p> 
                    <abbr title="Email">Email</abbr>: <a href="soethetoo.lethloke@gmail.com">soethetoo.lethloke@gmail.com</a><br>Technological University(Monywa)
                </p>           
        </div>

	       </div>
        </div>
	 </section> 



   <?php 
   		include 'footer.php';
    ?>