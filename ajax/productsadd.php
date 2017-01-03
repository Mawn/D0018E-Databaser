<?php
  include("../connect.php");
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $amount = $_POST['amount'];
    $sql = "SELECT * FROM cart WHERE userid='$userid'";
    $result = mysqli_query($conn, $sql);
    $n = 0;
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
      $cartproductid[$n] = $row['productid'];
      $cartamount[$n] = $row['amount'];
      $n = $n + 1;
    }
    $inserted = 0;
    for($j=0; $j<$n; $j++){
      if($productid == $cartproductid[$j]){
        $total = $amount + $cartamount[$j];
        $sql = "UPDATE cart SET amount='$total' WHERE productid='$productid'";
        mysqli_query($conn, $sql);
        $inserted = 1;
      }
    }
    if($inserted == 0){
      $sql = "INSERT INTO cart (userid, productid, amount) VALUES ('$userid', '$productid', '$amount')";
      mysqli_query($conn, $sql);
    }
    echo $inserted;
  }
?>
