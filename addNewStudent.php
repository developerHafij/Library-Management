<?php include "include/header.php" ?>

<?php include "include/sidebar.php" ?>

  <?php include "include/statistics.php" ?>

  <?php 
    if(!$_SESSION['admin_email']) {
        header("Location: login.php");
      }
  ?>

  <!-- Update Section Start -->
  <!-- <?php 
  /*if (isset($_GET['edit'])) {
    $user_edit = $_GET['edit'];

    $user_query = "SELECT * FROM user WHERE user_id='$user_edit'";
    $selected_user = mysqli_query($db, $user_query);
    while ( $row = mysqli_fetch_assoc($selected_user) ) {
      $user_id  = $row['user_id'];
      $name     = $row['name'];
      $avater   = $row['avater'];
      $faculty  = $row['faculty'];
      $roll     = $row['roll'];
      $intake   = $row['intake'];
      $phone    = $row['phone'];*/
  ?> -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
	        	<div class="col-md-6">
  				    <div class="card card-primary">
  				      <div class="card-header">
  				        <h3 class="card-title">Register New student</h3>
  				      </div>
  				      <div class="card-body">
  				        <!-- Date range -->
  				        <form action="" method="post" enctype="multipart/form-data">
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="far fa-user"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="full_name" class="form-control float-right" placeholder="Full Name*">
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-user-graduate"></i>
  					              </span>
  					            </div>
                        <select type="text" name="faculty" class="form-control float-right" placeholder="Faculty Name*">
                          <option>Select Department*</option>
                          <option value="1">Computer Science & Engineering</option>
                          <option value="2">Electrical & Electronic Engineering</option>
                          <option value="3">Architectural Engineering</option>
                          <option value="4">Law & Justice</option>
                          <option value="5">Political Science</option>
                          <option value="6">Textile Department</option>
                          <option value="7">Economics Department</option>
                          <option value="8">English Department</option>
                        </select>
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-id-card-alt"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="roll" class="form-control float-right" placeholder="Student ID*">

                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="intake" class="form-control float-right" placeholder="Intake*">
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-phone"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="phone" class="form-control float-right" placeholder="+8801792815353">
  					          </div>
  					        </div>
                    <div class="avater" style="margin-bottom: 20px;">
                      <label>Select an Image: </label>
                      <input type="file" name="avater">
                    </div>
  				        	
  				        	<div class="form-group">
  				        		<input type="submit" value="Register" name="register" class="btn btn-primary btn-flat">
  				        	</div>
  				        </form>

                  <?php 
                    if (isset($_POST['register'])) {
                      $full_name  = $_POST['full_name'];
                      $faculty    = $_POST['faculty'];
                      $roll       = $_POST['roll'];
                      $intake     = $_POST['intake'];
                      $phone      = $_POST['phone'];
                      /*$user_date  = $_POST['date(dd-mm-YYYY)'];*/

                      $avater     = $_FILES['avater']['name'];
                      $image_tmp  = $_FILES['avater']['tmp_name'];
                      $random_number = rand(0,10000);
                      $single_image  = $random_number.$avater;

                      /*$extn = strtolower(end(explode('.', $avater)));
                      $extensions = array("png","jpeg","jpg");

                      if (in_array($exten, $extensions) === false) { 
                        header("Location: addNewStudent.php");
                      }else{*/

                        if ( empty($full_name) || empty($faculty) || empty($roll)|| empty($intake) ) { ?>
                          <span style="color: red; "><b>Ops!! Please, Insert The Required Inforamation.</b></span>
                        <?php }
                        else{
                          move_uploaded_file($image_tmp, "images/users/$single_image");

                          $query = "INSERT INTO user(name, faculty, roll, intake, phone, avater) VALUES('$full_name', '$faculty', '$roll', '$intake', '$phone', '$single_image')";
                          $all_user = mysqli_query($db, $query);

                          if ($all_user) {
                            echo "<script>
                                    alert('Ok Great! New Student Has been Added.');
                                    Location: 'addNewStudent.php';
                                  </script>";
                          }else{
                            die("MySql Error".mysqli_error($db));
                          }
                        }
                    /*}*/
                    }
                  ?>

  				      </div>
  				    </div>
				    </div>
		      </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "include/footer.php" ?>