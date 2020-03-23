
<?php include "include/header.php"; ?>

<section class="hold-transition login-page">
	<div class="login-box">
	  	<div class="register-logo">
	      <img src="images/admin/BUBT-logo.png" width="46px;">
	      <div style="text-align: center; font-size: 20px;">
	        <b>BUBT | </b>Library Management
	      </div>
	    </div>
	  <!-- /.login-logo -->
	  <div class="card">
	    <div class="card-body login-card-body">
	      <p class="login-box-msg">Sign in to your Dashboard</p>

	    <form action="" method="post">
	        <div class="input-group mb-3">
	          <input type="email" class="form-control" name="email" placeholder="Email">
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-envelope"></span>
	            </div>
	          </div>
	        </div>
	        <div class="input-group mb-3">
	          <input type="password" class="form-control" name="password" placeholder="Password">
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-lock"></span>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-8">
	            <div class="icheck-primary">
	              <input type="checkbox" id="remember">
	              <label for="remember">
	                Remember Me
	              </label>
	            </div>
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
	          </div>
	          <!-- /.col -->
	        </div>
	    </form>

	    <?php
	    	if (isset($_POST['login'])) {
	        	$login_email  	 = mysqli_real_escape_string($db, $_POST['email']);
	        	$login_password  = mysqli_real_escape_string($db, $_POST['password']);

	        	$encry_password = sha1($login_password);

	        	$query    = "SELECT * FROM admin WHERE email='$login_email' ";
		      	$all_admin = mysqli_query($db, $query);

		      	while ( $row = mysqli_fetch_array($all_admin) ) {
			        $_SESSION['admin_email'] = $row['email'];
			        $_SESSION['admin_name'] = $row['name'];
			        $admin_password = $row['password'];

			        if ( ($login_email == $_SESSION['admin_email']) && ($admin_password == $encry_password) ) {
			        	header("Location: index.php");
			        }elseif ( ($login_email == $_SESSION['admin_email']) || ($admin_password == $encry_password) ) {
			        	echo "Please Insert Valid Email & Password";
			        }else{
			        	echo "Please Insert Valid Email & Password";
			        }
		      	}
	        }
      	 
	    ?>

	      <p class="mb-1">
	        <a href="">I forgot my password</a>
	      </p>
	      <p class="mb-0">
	        <a href="register.php" class="text-center">Register a new membership</a>
	      </p>
	    </div>
	    <!-- /.login-card-body -->
	  </div>
	</div>
	<!-- /.login-box -->
</section>

<?php include "include/footer.php" ?>