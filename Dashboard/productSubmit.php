<?php
session_start();
include '../dbConnect.php';
include '../classes/Products.php';
include '../classes/Category.php';

$uploadDir = '../productImages/';
$uploadFile = $uploadDir. basename($_FILES["myfile"]["name"]);

move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadFile);




$product = new Products($_SESSION['company'], $_POST['Pname'], $_POST['price'], $uploadFile);

/*$pid, $cid, $pname, $price, $img*/
$product->insertToDB($product->get_prodId(), $product->get_companyId(), $product->get_prodName(), $product->get_price(), $product->get_img_url());


$category = new Category($_POST['cate'], $product->get_prodId());

$category->insertToDB($category->get_name(), $category->get_prodId());


echo "Seccfully added the product";

header( "refresh:10;url=../index.php" );





