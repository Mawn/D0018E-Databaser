<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $productid = $_POST['productid'];
    $sql = "DELETE FROM products WHERE id = '$productid'";
    mysqli_query($conn, $sql);
  }
?>