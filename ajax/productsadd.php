<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO cart (userid, productid, amount) VALUES ('$userid', '$productid', '$amount')";
    mysqli_query($conn, $sql);
  }
?>