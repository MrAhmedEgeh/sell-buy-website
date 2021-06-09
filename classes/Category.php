<?php

class Category {
    private $name;
    private $prod_id;

    function __construct($name, $prod_id) {
        $this->name = $name;
        $this->prod_id = $prod_id;
    }
    //name
    function get_name() {
        return $this->name;
    }
    function set_name($name) {
        $this->name = $name;
    }
    //prod_id
    function get_prodId() {
        return $this->prod_id;
    }
    function set_prodId($id) {
        $this->prod_id = $id;
    }
    //inser to DB
    public function insertToDB($cate_name, $prod_id){
        include '../dbConnect.php';

        
        $query = "INSERT into category(`Category_Name`, `Product_Id`)VALUES('$cate_name', '$prod_id')";
        mysqli_query($conn, $query);

    }
}

