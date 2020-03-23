<?php include "include/header.php" ?>
  
<?php include "include/sidebar.php" ?>

  <?php include "include/statistics.php" ?>

  <?php 
    if(!$_SESSION['admin_email']) {
        header("Location: login.php");
      }
  ?>

  <?php 
    if (isset($_GET['edit'])) {
      $edit_id = $_GET['edit'];

      $query = "SELECT * FROM user WHERE user_id='$edit_id'";
      $borrow_book = mysqli_query($db, $query);

      while ( $row = mysqli_fetch_assoc($borrow_book) ) { 
        $user_id   = $row['user_id'];
        $name      = $row['name'];
        $roll      = $row['roll'];
        $intake    = $row['intake'];
        $faculty   = $row['faculty'];
        $phone   = $row['phone'];
        $avater    = $row['avater'];
      }
    }
  ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
	        	<div class="col-md-8">
  				    <div class="card card-primary">
  				      <div class="card-header">
  				        <h3 class="card-title">Update User Information</h3>
  				      </div>
  				      <div class="card-body">
  				        <form action="" method="post" enctype="multipart/form-data">
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-book"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="user_name" value="<?php echo $name ?>" class="form-control float-right" placeholder="Student Name">
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-user-graduate"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="roll" value="<?php echo $roll ?>" class="form-control float-right" placeholder="Student ID">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </span>
                        </div>
                        <input type="text" name="intake" value="<?php echo $intake ?>" class="form-control float-right" placeholder="Intake">
  					          </div>
  					        </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <select type="text" name="book_dep" value="<?php echo $faculty ?>" class="form-control float-right">
                          <option>Select Department</option>
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
                            <i class="fas fa-phone"></i>
                          </span>
                        </div>
                        <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control float-right" placeholder="+8801792815353">
                      </div>
                    </div>
                     <div class="avater" style="margin-bottom: 20px;">
                      <label>Update Image: </label>
                      <input type="file" name="avater">
                    </div>

  				        	<div class="form-group">
  				        		<input type="submit" value="Update Information" name="update_user" class="btn btn-primary btn-flat">
  				        	</div>
  				        </form>

                  <?php 
                    if ( isset($_POST['update_user']) ) {
                      $user_id   = $row['user_id'];
                      $name      = $row['name'];
                      $roll      = $row['roll'];
                      $intake    = $row['intake'];
                      $faculty   = $row['faculty'];
                      $phone     = $row['phone'];
                      $avater    = $row['avater'];

                      $query = "UPDATE user SET name='$name', avater='$avater', faculty='$faculty', roll='$roll', intake='$intake', phone='$phone' WHERE user_id='$user_id' ";
                      $update_all = mysqli_query($db, $query);

                      if ( $update_all ) {
                        header("Location: index.php");
                      }
                      else{
                        die("mysqli error".mysqli_error($db));
                      }
                    }
                  ?>

  				      </div>
  				    </div>
				    </div>

            <div class="col-md-2" style="top: 0%; position: absolute; left: 68%;">
              <div>
                <?php
                  if (empty($avater)) { ?>
                    <img src="images" width= "85px" style="border: 1px solid #ddd; height: 85px;">
                  <?php }
                  else{ ?>
                    <img src="images/users/<?php echo $avater; ?>" width= "85px">
                  <?php }
                ?>
              </div>
              <span style="float: left;"><b>Name: </b> <?php echo $name; ?></span>
              <span style="float: left;"><b>Student ID: </b> <?php echo $roll; ?></span>
              <span style="float: left;"><b>Intake: </b> <?php echo $intake; ?></span>
              <span style="float: left;">
                <b>Department: </b>
                  <?php
                    if ($faculty==1) {
                      echo "CSE";
                    }
                    elseif ($faculty==2) {
                      echo "EEE";
                    }
                    elseif ($faculty==3) {
                      echo "AE";
                    }
                    elseif ($faculty==4) {
                      echo "L&J";
                    }
                    elseif ($faculty==5) {
                      echo "PS";
                    }
                    elseif ($faculty==6) {
                      echo "TEX";
                    }
                    elseif ($faculty==7) {
                      echo "ECO";
                    }
                    elseif ($faculty==8) {
                      echo "Eng";
                    }
                  ?>
                </span>
            </div>

            <!-- User Delete Function -->
            <?php user_delete() ?>

		      </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "include/footer.php" ?>