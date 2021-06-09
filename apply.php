<?php

error_reporting(0);
$sendRequest=$_GET['sendRequest'];
if(isset($sendRequest))
{
    include 'dbConnect.php';
    $id = $_GET['id'];
    $company = $_GET['psw'];

    $query = "SELECT * FROM `notification` WHERE user_id = $id";
    $checkresult = mysqli_query($conn, $query);
    $checkrowcount=mysqli_num_rows($checkresult);

    if($checkrowcount <= 0){
        $insert = "INSERT INTO notification(user_id, company_id, status) VALUES ('$id','$company','pending')";;
        mysqli_query($conn, $insert);
        header('Location: http://localhost/InvMGMT/index.php');
    }
    header('Location: http://localhost/InvMGMT/index.php');
}else{
    showForm();
}

$id = $_SESSION['userid'];


function showForm(){
    include 'Navbar/Navbar.php';
    print <<< FORM
    <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.80.0">
        <title>Apply Page</title>
        
        <!-- Bootstrap core CSS -->    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css Files/product.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <style>
        h1{
            text-align: center;
            margin-top: 90px;
        }
        #myForms {
            display:  block;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        #myForms button{
            margin-top: 20px;
        }
        </style>
<form id="myForms" action="http://localhost/InvMGMT/apply.php" class="form-container" METHOD="get">
    <h1>Login</h1>

    <label style="color:white;" for="user"><b>User ID</b></label>
    <input type="text" value="$id" id="userid"  name="user" disabled>
    <input hidden name="id" value="$id"/>

    <label style="color:white;" for="psw"><b>Company:</b></label>
    <input type="text" id="cid"  placeholder="Company id" name="psw" required>

    <button style=" background-color: black; color:white; border: 1px solid white" type="submit" id="sendRequest" name="sendRequest" class="btn">Submit</button>
  </form>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/InvMGMT/Navbar/navbar.js" type="text/javascript"></script>
   

  </body>
</html>
FORM;
}

