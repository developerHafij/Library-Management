<?php include "include/header.php" ?>

<?php include "include/sidebar.php" ?>

  <?php include "include/statistics.php" ?>

  <?php 
    if(!$_SESSION['admin_email']) {
        header("Location: login.php");
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
  				        <h3 class="card-title">Add New Book</h3>
  				      </div>
  				      <div class="card-body">
  				        <!-- Date range -->
  				        <form action="" method="post" enctype="multipart/form-data">
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-book"></i>
  					              </span>
  					            </div>
                        <input type="text" name="book_name" class="form-control float-right" placeholder="Add Book Title*">
                        <!-- <select type="text" name="book_name" class="form-control float-right" placeholder="Book Title">
                          <option>Select Book Title</option>
                          <?php 
                           /* $query = "SELECT * FROM book";
                            $all_author = mysqli_query($db, $query);

                            while ( $row = mysqli_fetch_assoc($all_author) ) { ?>
                              <option><?php echo $row['book_name']; ?></option>
                            <?php }*/
                          ?>
                         <input type="text" name="book_name" class="form-control float-right" placeholder="Or Add Book Title*">
                        </select> -->
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-user-graduate"></i>
  					              </span>
  					            </div>
                        <input type="text" name="author" class="form-control float-right" placeholder="Add Author*">
                        <!-- <select type="text" name="author" class="form-control float-right" placeholder="Book Author">
                          <option>Select Books Author</option>
                          <?php 
                            $query/* = "SELECT author FROM book";
                            $all_author = mysqli_query($db, $query);*/

                           /* while ( $row = mysqli_fetch_assoc($all_author) ) { ?>
                              <option><?php echo $row['author']; ?></option>
                            <?php }*/
                          ?>
                         <input type="text" name="author" class="form-control float-right" placeholder="Or Add Author*">
                        </select> -->
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-id-card-alt"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="stock" class="form-control float-right" placeholder="How Many Books*">

                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <select type="text" name="cat_id" class="form-control float-right" placeholder="Book Category">
                          <option>Select The Book Category*</option>
                          <option value="1">Computer Science & Engineering</option>
                          <option value="2">Electrical & Electronic Engineering</option>
                          <option value="3">Architectural Engineering</option>
                          <option value="4">Law & Justice</option>
                          <option value="5">Political Science</option>
                          <option value="6">Textile Department</option>
                          <option value="7">Economics Department</option>
                          <option value="8">English Department</option>
                          <option value="8">Mathematics Department</option>
                        </select>
  					          </div>
  					        </div>
  					        <div class="form-group">
  					          <div class="input-group">
  					            <div class="input-group-prepend">
  					              <span class="input-group-text">
  					                <i class="fas fa-edit"></i>
  					              </span>
  					            </div>
  					            <input type="text" name="edition" class="form-control float-right" placeholder="Edition">
  					          </div>
  					        </div>
  				        	<div class="form-group">
  				        		<input type="submit" value="Add New Book" name="add_book" class="btn btn-primary btn-flat">
  				        	</div>
  				        </form>

                  <?php 
                    if (isset($_POST['add_book'])) {
                      $book_name  = $_POST['book_name'];
                      $author     = $_POST['author'];
                      $stock      = $_POST['stock'];
                      $cat_id     = $_POST['cat_id'];
                      $edition    = $_POST['edition'];

                      if ( empty($book_name) || empty($author) || empty($stock) || empty($cat_id) ) { ?>
                        <span style="color: red;"><b>Please, Insert The Required Inforamation.</b></span>
                      <?php }
                      else{
                        $query = "INSERT INTO book(book_name, author, stock, cat_id, edition) VALUES('$book_name', '$author', '$stock', '$cat_id', '$edition')";
                        $all_user = mysqli_query($db, $query);

                        if ($all_user) {
                          header("Location: addBook.php");
                        }else{
                          die("MySql Error".mysqli_error($db));
                        }
                      }
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