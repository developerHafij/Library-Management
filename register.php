
<?php include "include/header.php" ?>

<section class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <img src="images/admin/BUBT-logo.png" width="46px;">
      <div style="text-align: center; font-size: 20px;">
        <b>BUBT | </b>Library Management
      </div>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Full name*">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email*">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="phone" class="form-control" name="phone" placeholder="Phone Number*">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password*">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="retype_password" placeholder="Retype password*">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <?php 
          if (isset($_POST['register'])) {
            $name             = $_POST['name'];
            $email            = $_POST['email'];
            $phone            = $_POST['phone'];
            $password         = sha1($_POST['password']);
            $retype_password  = sha1($_POST['retype_password']);

              $query    = "SELECT * FROM admin";
              $all_admin = mysqli_query($db, $query);
              while ( $row = mysqli_fetch_assoc($all_admin) ) {
                $admin_email     = $row['email'];
                $admin_phone     = $row['phone'];
              }
              if ( ($email==$admin_email) || ($phone==$admin_phone) ) {
                echo "Email/Phone Matched! Please, Try Another";
              }else{
              if ($password==$retype_password) {
                if ( empty($name) || empty($email) || empty($phone) ) {
                  echo "Please Fill the Required Information";
                }else{
                  $query = "INSERT INTO admin(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')";
                  $register_admin = mysqli_query($db, $query);

                  if ($register_admin) {
                    header("Location: login.php");
                  }else{
                    die("MySql Error".mysqli_error($db));
                  }
                }
              }else{
                echo "Your Password Dosen't match";
              }
            }
          }
        ?>

        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
</section>

<?php include "include/footer.php" ?>