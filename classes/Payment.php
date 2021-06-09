<?php

class Payments {
    private $payment_id;
    private $prod_id;
    private $qnt;
    private $payment_amount;
    private $payment_date;

    function __construct($payment_id, $prod_id, $qnt, $payment_amount, $payment_date) {
        $this->payment_id = $payment_id;
        $this->prod_id = $prod_id;
        $this->qnt = $qnt;
        $this->payment_amount = $payment_amount;
        $this->payment_date = $payment_date;
    }
    //id
    function get_paymentId() {
        return $this->payment_id;
    }
    function set_paymentId($payment_id) {
        $this->payment_id = $payment_id;
    }
    //prod_id
    function get_prodId() {
        return $this->prod_id;
    }
    function set_prodId($id) {
        $this->prod_id = $id;
    }
    //qnt
    function get_qnt() {
        return $this->qnt;
    }
    function set_qnt($qnt) {
        $this->qnt = $qnt;
    }
    //payment_amount
    function get_paymentAmount() {
        return $this->payment_amount;
    }
    function set_paymentAmount($qnt) {
        $this->payment_amount = $payment_amount;
    }
    //payment_date
    function get_paymentDate() {
        return $this->payment_date;
    }
    function set_paymentDate($payment_date) {
        $this->payment_date = $payment_date;
    }
}
/*$id, $prod_id, $qnt, $payment_amount, $payment_date-*/
$pay = new Payments(4000, 100, 5,500,'12-12-2020');

print_r($pay);