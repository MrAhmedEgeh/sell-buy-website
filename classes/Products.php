<?php

class Products {
    private $prod_id;
    private $company_id;
    private $prod_name;
    private $price;
    private $img_url;

    function __construct($company_id, $prod_name, $price, $img_url) {
        $this->prod_id = time()+7;
        $this->company_id = $company_id;
        $this->prod_name = $prod_name;
        $this->price = $price;
        $this->img_url = $img_url;
    }
    //prod_id
    function get_prodId() {
        return $this->prod_id;
    }
    //company_id
    function get_companyId() {
        return $this->company_id;
    }
    function set_companyId($company_id) {
        $this->company_id = $company_id;
    }
    //prod_name
    function get_prodName() {
        return $this->prod_name;
    }
    function set_prodName($prod_name) {
        $this->prod_name = $prod_name;
    }
    //price
    function get_price() {
        return $this->price;
    }
    function set_price($price) {
        $this->price = $price;
    }
    //img_url
    function get_img_url() {
        return $this->img_url;
    }
    function set_img_url($img_url) {
        $this->img_url = $img_url;
    }
    //inser to DB
    public function insertToDB($pid, $cid, $pname, $price, $img){
        include '../dbConnect.php';

        
        $prod = "INSERT INTO product(`Product_Id`, `Company_Id`, `Product_Name`, `Price`, `img_url`) VALUES ('$pid', '$cid', '$pname', '$price', '$img')";
        mysqli_query($conn, $prod);

    }
}
