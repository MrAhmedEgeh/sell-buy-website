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
    $sql = "select m.User_id, m.Company_Id, m.Roll_id, u.username, u.user_password, u.email from  members m, theuser u where m.Company_Id = $name and u.userid = m.User_id;";    

    $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);    

    $json['total'] = count($result);    

    $json['rows'] = $result;    

    echo json_encode($json,JSON_UNESCAPED_UNICODE);

    ?>