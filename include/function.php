
<?php 
  function user_delete(){
    global $db;

    if ( isset($_GET['delete']) ) {
      $delete_user  = $_GET['delete'];

      $query      = "SELECT * FROM user WHERE user_id='$delete_user' ";
      $delete_image = mysqli_query($db, $query);
      
      while ( $row = mysqli_fetch_assoc($delete_image) ) {
        $avater = $row['avater'];
      }
      unlink("images/users/$avater");

      $delete_query = "DELETE FROM user WHERE user_id='$delete_user' ";
      $delete = mysqli_query( $db, $delete_query);

     if ( $delete ) {
      header("Location: index.php"); 
     }
     else{
      die("mysqli error".mysqli_error($db));
     }
    }

  }
?>
