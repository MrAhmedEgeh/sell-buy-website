<?php 
            session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart page</title>
            <!-- Bootstrap core CSS -->    
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css Files/product.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<style>
    h2{
        margin-top: 60px;
        text-align: center;
    }
    .cart-list{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .header{
        margin: 50px auto;

    }
    .header span{
        padding: 15px;
        background-color: black;
        color: white;
        font-size: 20px;
        padding-right:50px;
    }
    .btns{
        justify-self: flex-end;

    }
    .btns button{
        border: 1px solid black;
    }
    .total{
        margin: 20px;
        margin-right: 535px;
        align-self: flex-end;
    }
    .results{
        display: flex;
        flex-direction: column;
        background-color: gray;


    }
    .results div{
        margin-bottom: 10px;
    }
    .results div > span{
        padding: 10px 30px;
        color: white;
        font-size: 20px;
        margin: 10px;
    }
    .results div input{
        width: 10%;
        align-self: center;
        margin-left: 110px;

    }
</style>
<?php
        include 'Navbar/Navbar.php';

        ?>
    <h2>Cart</h2>

    <div class="cart-list">
            <div class="header">
               <span>Product Name:</span><span>Product price:</span><span>Quantity</span><span>Total</span>
            </div>
            <div class="results">
            <?php 
  session_start();
            include 'dbConnect.php';
            
                    if($_SESSION['company']){

                        $query = "SELECT prod_id, prod_name, price, qnt FROM cart";
                        $checkresult = mysqli_query($conn, $query);
                        $checkrowcount=mysqli_num_rows($checkresult);
            
                        if($checkrowcount > 0){
                            while($rows = $checkresult->fetch_assoc()){
                                $id = $_SESSION['userid'];
                                $pid = $rows['prod_id'];
                                $name = $rows['prod_name'];
                                $price = $rows['price'];
                                $qnt = $rows['qnt'];
                                print <<< FORM
                         
                             <div class="item" id="$pid"><span>$name</span><span>$price</span><input class="qnt" type="text" value="$qnt"></div>
                        FORM;
                            echo `<input hidden name="id" id="hide" value="$id"/>`;
                            }
                        }
                    }else {
                        include '../dbConnect.php';
                        $sql = "DELETE FROM `cart`";
                        mysqli_query($conn, $sql);
                    }
                    
          
                    
                ?>
                </div>
            <div class="total">
            <?php 
                if($_SESSION){
                    include 'dbConnect.php';
                    $sum = "SELECT sum(price) as thesum from `cart` ";
                    $res = mysqli_query($conn, $sum);
                    $check = mysqli_num_rows($res);
                    if($check > 0){
                        while($row = $res->fetch_assoc()){
        
                            $name = $row['thesum'];
                            print <<< FORM
                         
                            <span id="total">$$name</span>
                       FORM;
                        }
                    }
                }
            
            ?>
            
            
            </div>

            <div class="btns">
            <button type="submit" id="checkout"><a>Checkout</a></button>
                <button><a href="http://localhost/InvMGMT/Product.php">Keep shopping</a></button>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="cart.js" type="text/javascript"></script>
</body>
</html>