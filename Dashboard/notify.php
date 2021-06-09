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
    $id= $_SESSION['company'];
    $sql = "SELECT * FROM notification where company_id = $id";    

    $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);    

    $json['total'] = count($result);    

    $json['rows'] = $result;    

    echo json_encode($json,JSON_UNESCAPED_UNICODE);

    ?>