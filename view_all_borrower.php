<?php include "include/header.php" ?>

<?php include "include/sidebar.php" ?>

<?php 
  if(!$_SESSION['admin_email']) {
      header("Location: login.php");
    }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- Student Table Start -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Total Borrower Information</h3>
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" autocomplete>
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0" style="height: 494px;">
                        <table class="table table-head-fixed text-nowrap table-striped">
                          <thead>
                             <tr>
                              <th scope="col">Sl.</th>
                              <th scope="col">Student Name</th>
                              <th scope="col">Dept.</th>
                              <th scope="col">Roll</th>
                              <th scope="col">Intake</th>
                              <th scope="col">Book Name</th>
                              <th scope="col">Author</th>
                              <th scope="col">Borrow Date</th>
                              <th scope="col">Return Date</th>
                              <th scope="col">Quan.</th>
                              <!-- <th scope="col">Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $query    = "SELECT * FROM borrow";
                              $all_user = mysqli_query($db, $query);

                              $i=0;

                              while ( $row = mysqli_fetch_assoc($all_user) ) {
                                $user_name    = $row['user_name'];
                                $dept         = $row['dept'];
                                $user_id      = $row['user_id'];
                                $intake       = $row['intake'];
                                $book_name    = $row['book_name'];
                                $author       = $row['author'];
                                $borrow_date  = $row['borrow_date'];
                                $return_date  = $row['return_date'];
                                $how_many     = $row['how_many'];
                                
                                $i++;
                              
                              ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $user_name; ?></td>
                                <td>
                                  <?php 
                                  if ($dept==1) { ?>
                                    <span class="badge badge-primary">CSE</span>
                                  <?php }
                                  elseif ($dept==2) { ?>
                                    <span class="badge badge-secondary">EEE</span>
                                  <?php }
                                  elseif ($dept==3) { ?>
                                    <span class="badge badge-succeaa">AE</span>
                                  <?php }
                                  elseif ($dept==4) { ?>
                                    <span class="badge badge-danger">L&J</span>
                                  <?php }
                                  elseif ($dept==5) { ?>
                                    <span class="badge badge-warning">PS</span>
                                  <?php }
                                  elseif ($dept==6) { ?>
                                    <span class="badge badge-info">TEX</span>
                                  <?php }
                                  elseif ($dept==7) { ?>
                                    <span class="badge badge-light">ECO</span>
                                  <?php }
                                  elseif ($dept==8) { ?>
                                    <span class="badge badge-dark">Eng</span>
                                  <?php }

                                  ?>
                                </td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $intake; ?></td>
                                <td><?php echo $book_name; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><?php echo $borrow_date; ?></td>
                                <td><?php echo $return_date; ?></td>
                                <td><?php echo $how_many; ?></td>
                                <!-- <td>
                                  <div class="user-actions">
                                    <ul>
                                      <li><a href="borrowBook.php"><i class="fas fa-book-medical"></i></a></li>
                                      <li><a href=""><i class="fas fa-eye"></i></a></li>
                                      <li><a href=""><i class="fas fa-edit"></i></a></li>
                                      <li><a href=""><i class="fas fa-trash-alt"></i></a></li>
                                    </ul>
                                  </div>
                                </td> -->
                              </tr>
                              
                              <?php }
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
                <!-- /.row -->
              <!-- Student Table End -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "include/footer.php" ?>