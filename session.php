<?php
  include("connect.php");
  session_start();
  mysqli_set_charset($conn,"utf8");
  /*error_reporting(E_ERROR | E_WARNING | E_PARSE);*/ //Turn this on
  $user_check=$_SESSION['login_user'];
  
  // SQL Query To Fetch Complete Information Of User
  $ses_sql=mysqli_query($conn,"SELECT * FROM user WHERE id='$user_check'");
  $row = mysqli_fetch_assoc($ses_sql);
  $login_id = $row['id'];
  $login_email = $row['email'];
  $login_password = $row['password'];
  $login_firstname = $row['firstname'];
  $login_lastname = $row['lastname'];
  $login_age = $row['age'];
  $login_country = $row['country'];
  $login_zip = $row['zip'];
  $login_phonenumber = $row['phonenumber'];
  if($row['usertype'] == 'Admin') {
    $login_isAdmin = true;
  } else {
    $login_isAdmin = false;
  }
  $query = mysqli_query($conn, "SELECT * FROM cart WHERE userid='$user_check'");
  $login_numofitems = mysqli_num_rows($query);
?>

