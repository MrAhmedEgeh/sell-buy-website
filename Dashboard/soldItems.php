<?php 
    session_start();

    header('Content-Type:application/json');    
    try {        

    $conn = new PDO("mysql:host=localhost;dbname=inventory", 'root', '');        

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        

    $conn->exec("SET NAMES utf8");

    } catch(PDOException $e) {        

    echo "conn_error:<br/>" . $e -> getMessage();

    }    
    $name= $_SESSION['company'];
    $sql = "SELECT p.Product_Id, pr.Product_Name, p.Payment_amount, p.Payment_Date from payments p, product pr where p.Product_Id = pr.Product_Id AND Company_Id = $name";    

    $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);    

    $json['total'] = count($result);    

    $json['rows'] = $result;    

    echo json_encode($json,JSON_UNESCAPED_UNICODE);

    ?>