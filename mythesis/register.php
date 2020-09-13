
   <?php 
   		include 'header.php';
    ?>
 
<section class="p-5 text-secondary adjust-top"> 
	<div class="container-fluid">
			<div class="row">
				<div class="col text-center" style="font-family: serif;">
					<h1 class="text-info display-2">Registration Form</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<form method="post" enctype="">
						 <table class="table table-bordered" style="margin-bottom: 50px;"> 

                        <tr>
					        <td>Enter Your name</td>
					          <Td>
						       <input  type="text" name="n" class="form-control" required/>
						      </Td>
				        </tr>

				        <tr>
					      <td>Enter Your email </td>
					        <Td>
					        	<input type="email" name="e" class="form-control" required/>
					        </Td>
				        </tr>

				        <tr>
					       <td>Enter Your Password </td>
					         <Td>
					         	<input type="password" name="p" class="form-control" required/>
					         </Td>
				        </tr>

				<tr>
					<td>Enter Your Mobile Number </td>
					<Td>
						<input type="text" name="mob" class="form-control" required/>
					</Td>
				</tr>

		        <tr>
					<td>Select Your Class</td>
					<Td>
						<select name="pro" class="form-control" required>
					<option>IBE</option>
					<option>IIBE</option>
					<option>IIIBE</option>
					<option>IVBE</option>
					<option>VBE</option>
					<option>VIBE</option>
					</select>
					</Td>
				</tr>

				<tr>
					<td>Select Your Gender</td>
					<Td>
				       Male<input type="radio" name="gen" value="m"/>
				       Female<input type="radio" name="gen" value="f"/>	
					</Td>
			
				</tr>
         <tr>
            <Td colspan="2" align="center">														
             <input type="submit" value="Register" class="btn btn-outline-primary " name="save" style="width: 80px; height: 40px; " />
             <input type="reset" value="Reset" class="btn btn-outline-primary " style="width: 80px; height: 40px;"/>
				
					</td>
				</tr>
				
						 </table> 
					</form>
				</div>
			</div>
    </div>
 </section> 

 
	 <?php 
   		include 'footer.php';
    ?>