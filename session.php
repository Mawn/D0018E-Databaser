<?php
  include("connect.php");
  session_start();
  $user_check=$_SESSION['login_user'];
  
  // SQL Query To Fetch Complete Information Of User
  $ses_sql=mysql_query("SELECT * FROM user WHERE email='$user_check'", $connection);
  $row = mysql_fetch_assoc($ses_sql);
  $login_email =$row['email'];
  $login_password = $row['password'];
  $login_firstname = $row['firstname'];
  $login_lastname = $row['lastname'];
  $login_age = $row['age'];
  $login_country = $row['country'];
  $login_zip = $row['zip'];
  $login_phonenumber = $row['phonenumber'];
  if($row['usertype'] == Admin {
    $login_isAdmin = true;
  } else {
    $login_isAdmin = false;
  }
?>