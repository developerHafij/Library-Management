<?php 
  /* Query for Registered Students */
  $query = "SELECT COUNT(name) AS 'count_name' FROM user";
  $all_info = mysqli_query($db, $query);
  while ( $row =  mysqli_fetch_assoc($all_info) ) {
    $count_user_name = $row['count_name'];
  } 

  /* Query for Available Books */
  $query = "SELECT sum(stock) AS 'count_book' FROM book";
  $all_info = mysqli_query($db, $query);
  while ( $row =  mysqli_fetch_assoc($all_info) ) {
    $total_books = $row['count_book'];
  } 

  /* Query for Total Borrowed Books */
  $query = "SELECT sum(how_many) AS 'borrowed_books' FROM borrow";
  $all_info = mysqli_query($db, $query);
  while ( $row =  mysqli_fetch_assoc($all_info) ) {
    $total_borrowed_books = $row['borrowed_books'];
  }
 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid status">
        <!-- Start boxes -->
        <form action="" method="POST">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Registered Students</span>
                  <span class="info-box-number" name="register_info" ><?php echo $count_user_name; ?></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Available Books</span>
                  <span class="info-box-number" name="available_info" ><?php echo $total_books-$total_borrowed_books; ?></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-reader"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Borrowed Books</span>
                  <span class="info-box-number" name="borrow_info" ><?php echo $total_borrowed_books; ?></span>
                </div>
              </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Books</span>
                  <span class="info-box-number" name="date_expired" ><?php echo $total_books; ?></span>
                </div>
              </div>
            </div>
            <!-- End boxes -->
          </div>
          <!-- /.row -->
        </form>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->