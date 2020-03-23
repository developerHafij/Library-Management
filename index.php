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
                        <h3 class="card-title">Total Student Information</h3>
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" autocomplete>
                            <div class="input-group-append">
                              <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                              <th scope="col">Name</th>
                              <th scope="col">Avater</th>
                              <th scope="col">Faculty</th>
                              <th scope="col">ID</th>
                              <th scope="col">Intake</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $query    = "SELECT * FROM user";
                              $all_user = mysqli_query($db, $query);

                              $i=0;

                              while ( $row = mysqli_fetch_assoc($all_user) ) {
                                $user_id  = $row['user_id'];
                                $name     = $row['name'];
                                $avater   = $row['avater'];
                                $faculty  = $row['faculty'];
                                $roll     = $row['roll'];
                                $intake   = $row['intake'];
                                $phone    = $row['phone'];
                                
                                $i++;
                              
                              ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td>
                                  <?php
                                    if (empty($avater)) { ?>
                                      <span class="badge badge-danger">empty</span>
                                    <?php }
                                    else{ ?>
                                      <img src="images/users/<?php echo $avater; ?>" width= "35px">
                                    <?php }
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                  if ($faculty==1) { ?>
                                    <span class="badge badge-primary">CSE</span>
                                  <?php }
                                  elseif ($faculty==2) { ?>
                                    <span class="badge badge-secondary">EEE</span>
                                  <?php }
                                  elseif ($faculty==3) { ?>
                                    <span class="badge badge-succeaa">AE</span>
                                  <?php }
                                  elseif ($faculty==4) { ?>
                                    <span class="badge badge-danger">L&J</span>
                                  <?php }
                                  elseif ($faculty==5) { ?>
                                    <span class="badge badge-warning">PS</span>
                                  <?php }
                                  elseif ($faculty==6) { ?>
                                    <span class="badge badge-info">TEX</span>
                                  <?php }
                                  elseif ($faculty==7) { ?>
                                    <span class="badge badge-light">ECO</span>
                                  <?php }
                                  elseif ($faculty==8) { ?>
                                    <span class="badge badge-dark">Eng</span>
                                  <?php }

                                  ?>
                                </td>
                                <td><?php echo $roll; ?></td>
                                <td><?php echo $intake; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td>
                                  <div class="user-actions">
                                    <ul>
                                      <li><a href="borrowBook.php?borrow=<?php echo $user_id ?>"><i class="fas fa-book-medical"></i></a></li>
                                      <li><a href=""><i class="fas fa-eye"></i></a></li>
                                      <li><a href="edit_user.php?edit=<?php echo $user_id ?>"><i class="fas fa-edit"></i></a></li>
                                      <li><a href="" data-toggle="modal" data-target="#delete<?php echo $user_id ?>"><i class="fas fa-trash-alt"></i></a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>

                              <!-- Delete Modal Start -->
                              <div class="modal fade" id="delete<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body sure-btn">
                                      <ul>
                                        <li><a href="edit_user.php?delete=<?php echo $user_id ?>"><button type="button" name="yes" class="btn btn-primary btn-flat md-lg btn-success">Yes</button></a></li>
                                        <li><button type="button" name="no" class="btn btn-primary btn-flat md-lg btn-danger" data-dismiss="modal">No</button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Delete Modal End -->

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