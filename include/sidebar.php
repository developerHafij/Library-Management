  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="images/admin/BUBT-Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Library Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/admin/avater.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>View All Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_all_borrower.php" class="nav-link">
                  <i class="fas fa-hands-helping nav-icon"></i>
                  <p>View All Borrower</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addNewStudent.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add New Student</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="borrowBook.php" class="nav-link">
                  <i class="far fa-handshake nav-icon"></i>
                  <p>Borrow Books</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="addBook.php" class="nav-link">
                  <i class="fas fa-book-medical nav-icon"></i>
                  <p>Add New Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>