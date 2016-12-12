<?php
  include("../connect.php");
  if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){
    $email = $_POST['email'];
    $type = $_POST['type'];
    $sql = "UPDATE user SET usertype = '$type' WHERE email = '$email'";
    mysqli_query($conn, $sql);
  }
?>