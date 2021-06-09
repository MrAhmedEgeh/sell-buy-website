<?PHP
session_start();




// from prodcut ID ==>> PROD_NAME  --- COMPANY_ID   --- PRICE

include '../dbConnect.php';

$id = $_POST['el'];
$query = "SELECT Company_Id, Product_Name, Price FROM product WHERE Product_Id = $id";

$checkresult = mysqli_query($conn, $query);
$checkrowcount=mysqli_num_rows($checkresult);

if($checkrowcount > 0){
    while($rows = $checkresult->fetch_assoc()){
        $company = $rows['Company_Id'];
        $pname = $rows['Product_Name'];
        $price = $rows['Price'];
    }
}

if(isset($company) && isset($pname) && isset($price)){
    include '../dbConnect.php';
    $select = "SELECT * FROM cart WHERE prod_id = '$id'";
    $theres = mysqli_query($conn, $select);
    $num = mysqli_num_rows($theres);

    if($num <= 0){
        $userid = $_SESSION['userid'];
        $insert = "INSERT INTO cart (prod_id, prod_name, qnt, price, seller_id, buyer_id) VALUES ('$id', '$pname',  '1', '$price', '$company', '$userid' )"; 
        mysqli_query($conn, $insert);
        echo "seccfully submitted";
    }
}