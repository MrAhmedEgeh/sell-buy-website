<?php 
            session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health page</title>
            <!-- Bootstrap core CSS -->    
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="../css Files/product.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700');
*
{
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    margin: 0;
    padding: 0;
}


body
{
    font-family: 'Roboto', sans-serif;
}
a
{
    text-decoration: none;
}
.product-card {
    display: inline-block;
    width: 335px;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin: 26px;
    background: #fafafa;
}

.badge {
    position: absolute;
    left: 0;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    padding: 50px;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 30px;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #fbb72c;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #fbb72c;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #fbb72c;
}
h2{
    margin: 20px auto;
    text-align: center;
}
</style>
<?php
        include '../Navbar/Navbar.php';
        ?>
        <h2>Health and Beauty</h2>

    <?php 
include '../dbConnect.php';
      $query = "SELECT p.Product_Id, p.Product_Name, p.Price, p.img_url FROM product p, category c WHERE c.Category_Name = 'Health and Beauty' AND P.Product_Id = C.Product_Id";
      $checkresult = mysqli_query($conn, $query);
      $checkrowcount=mysqli_num_rows($checkresult);

      if($checkrowcount > 0){
            while($rows = $checkresult->fetch_assoc()){
                $id = $rows['Product_Id'];
                $name = $rows['Product_Name'];
                $price = $rows['Price'];
                $img = $rows['img_url'];
                myItem($id, $name, $price, $img);
            }
      }
      function myItem($id, $name, $price, $img){
            print <<< FORM

                <div class="product-card">
                <div class="badge">Hot</div>
                <div class="product-tumb">
                    <img src="$img" alt="">
                </div>
                <div class="product-details">
                    <span class="product-catagory">General</span>
                    <h4><a href="">$name</a></h4>
                    <div class="product-bottom-details">
                        <div class="product-price">$$price</div>
                        <div class="product-links">
        
                        <a href="#"><i id="$id" class="shopbtn fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            FORM;
        }


          ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/124707d36e.js" crossorigin="anonymous"></script>
    <script src="items.js" type="text/javascript">
    
    </script>
</body>
</html>