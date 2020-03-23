<?php include "include/header.php" ?>
  
<?php include "include/sidebar.php" ?>

  <?php include "include/statistics.php" ?>

  <?php 
    if(!$_SESSION['admin_email']) {
        header("Location: login.php");
      }
  ?>

  <?php 
    if (isset($_GET['borrow'])) {
      $borrow_id = $_GET['borrow'];

      $query = "SELECT * FROM user WHERE user_id=$borrow_id";
      $borrow_book = mysqli_query($db, $query);

      while ( $row = mysqli_fetch_assoc($borrow_book) ) { 
        $user_id   = $row['user_id'];
        $name      = $row['name'];
        $roll      = $row['roll'];
        $intake    = $row['intake'];
        $faculty   = $row['faculty'];
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
  				        <h3 class="card-title">Borrow New Book</h3>
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
  					                <i class="fas fa-id-card-alt"></i>
  					              </span>
  					            </div>
                        <select type="text" name="book_name" class="form-control float-right" placeholder="Book Title">
                          <option>Select Book Title</option>
                          <?php 
                            $query = "SELECT * FROM book";
                            $all_author = mysqli_query($db, $query);

                            while ( $row = mysqli_fetch_assoc($all_author) ) { ?>
                              <option><?php echo $row['book_name']; ?></option>
                            <?php }
                          ?>
                        </select>

                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <select type="text" name="book_cat" class="form-control float-right" placeholder="Book Category">
                          <option>Select The Book Category</option>
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
                        <select type="text" name="author" class="form-control float-right" placeholder="Book Author">
                          <option>Select Books Author</option>
                          <?php 
                            $query = "SELECT author FROM book";
                            $all_author = mysqli_query($db, $query);

                            while ( $row = mysqli_fetch_assoc($all_author) ) { ?>
                              <option><?php echo $row['author']; ?></option>
                            <?php }
                         ?>
                        </select>
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <select type="text" name="how_many" class="form-control float-right" placeholder="How Many Books">
                          <option>How Many Books?</option>
                          <option value="1">- 1 Book</option>
                          <option value="2">- 2 Books</option>
                          <option value="3">- 3 Books</option>
                          <option value="4">- 4 Books</option>
                        </select>
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <label>Date range:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="date" name="date" class="form-control float-right" id="reservation">
                      </div>
                    </div> -->

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control" name="borrow_date" id="brand">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type='date' class='form-control' name='return_date'>
                      </div>
                    </div>

  				        	<div class="form-group">
  				        		<input type="submit" value="Add New Book" name="add_book" class="btn btn-primary btn-flat">
  				        	</div>
  				        </form>

                  <?php 
                    if ( isset($_POST['add_book']) ) {
                      $user_name  = $_POST['user_name'];
                      $roll       = $_POST['roll'];
                      $intake     = $_POST['intake'];
                      $book_dep   = $_POST['book_dep'];
                      $book_name  = $_POST['book_name'];
                      $book_cat   = $_POST['book_cat'];
                      $author     = $_POST['author'];
                      $how_many   = $_POST['how_many'];

                      $borrow_date   = $_POST['borrow_date'];
                      $return_date   = $_POST['return_date'];

                      if ( empty($user_name) || empty($roll) || empty($intake) || empty($book_name) || empty($author) ) {
                        echo "Please Insert The Required Information";
                      }
                      else{
                        $query = "INSERT INTO borrow(user_name, dept, user_id, intake, book_name, author,borrow_date, return_date, how_many) VALUES('$user_name', '$book_dep', '$roll', '$intake', '$book_name', '$author', '$borrow_date', '$return_date', '$how_many')";
                        $all_borrow = mysqli_query($db, $query);

                        if ($all_borrow) {
                          header("Location: view_all_borrower.php");
                        }else{
                          die("MySql Error.".mysqli_error($db));
                        }
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

		      </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

<?php include "include/footer.php" ?>