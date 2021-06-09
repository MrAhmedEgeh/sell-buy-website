<?php

class Orders {
    private $order_id;
    private $buyer_id;
    private $seller_id;
    private $payment_id;
    private $order_date;

    function __construct($order_id, $buyer_id, $seller_id, $payment_id, $order_date) {
        $this->order_id = $order_id;
        $this->buyer_id = $buyer_id;
        $this->seller_id = $seller_id;
        $this->payment_id = $payment_id;
        $this->order_date = $order_date;
    }
    //id
    function get_orderId() {
        return $this->order_id;
    }
    function set_orderId($order_id) {
        $this->order_id = $order_id;
    }
    //buyer_id
    function get_buyerId() {
        return $this->buyer_id;
    }
    function set_buyerId($buyer_id) {
        $this->buyer_id = $buyer_id;
    }
    //seller_id
    function get_sellerId() {
        return $this->seller_id;
    }
    function set_sellerId($seller_id) {
        $this->seller_id = $seller_id;
    }
    //payment_id
    function get_payementId() {
        return $this->payment_id;
    }
    function set_payementId($payment_id) {
        $this->payment_id = $payment_id;
    }
    //order_date
    function get_orderDate() {
        return $this->order_date;
    }
    function set_orderDate($order_date) {
        $this->order_date = $order_date;
    }
}

$order = new Orders(100, 1000, 1500, 1200, '12-12-2020');

print_r($order);