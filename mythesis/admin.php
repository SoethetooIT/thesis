  	<?php 
      include 'header.php';
    ?>

<div class="container adjust-top">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Login with your email!</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="admin_login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="text" autofocus placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                
                                
                <div class="form-group">
                                    <input name="login" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                </div>
                
                <div class="form-group">
<!--                                     <label>
                                                                            
                                               </label> -->
                                </div>
                
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>

  <?php 
      include 'footer.php';
    ?>