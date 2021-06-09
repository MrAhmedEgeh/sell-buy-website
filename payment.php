<?php

include 'dbConnect.php';

$id = $_POST['ids'];
$qnt = $_POST['qnts'];

//UODATE QUANTITY
$query = "UPDATE cart SET qnt = $qnt WHERE prod_id = $id";

mysqli_query($conn, $query);

//SELECT ROW
$select = "SELECT * FROM cart WHERE prod_id = $id";
$res = mysqli_query($conn, $select);
$num = mysqli_num_rows($res);

if($num){
    while ($rows = $res->fetch_assoc()) {
        $py_pid = $rows['prod_id'];
        $py_qnt = $rows['qnt'];
        $py_price = $rows['price'];
        $py_seller = $rows['seller_id'];
        $py_buyer = $rows['buyer_id'];
        $py_amount = $py_qnt * $py_price;
        $t = time();
        $date = date("d-m-Y",$t);
    }
}
if(isset($py_pid)){
    include 'dbConnect.php';
    $inser = "INSERT INTO payments(Product_id, Quantity, Payment_amount, Payment_Date) VALUES ('$py_pid','$py_qnt','$py_amount','$date')";
     if(mysqli_query($conn, $inser)){
        $orders = "INSERT INTO orders(Buyer_Id, Seller_Id, Order_Date) VALUES ('$py_buyer','$py_seller','$date')";
        if(mysqli_query($conn, $orders)){
            include 'dbConnect.php';
            $sql = "DELETE FROM `cart` WHERE prod_id = $id";
            mysqli_query($conn, $sql);
        }
     }
}