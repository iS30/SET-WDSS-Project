<?php
global $conn;
require 'GSS_DB.php';
require 'layout/header.php';
class Payments {
    public $payment_ID;
    public $paymentType;
    public $order_ID;

    public function getPaymentID()
    {
        return $this->payment_ID;
    }

    public function setPaymentID($payment_ID)
    {
        $this->payment_ID = $payment_ID;
    }

    public function getPaymentType()
    {
        return $this->paymentType;
    }

    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    public function getOrderID()
    {
        return $this->order_ID;
    }

    public function setOrderID($order_ID)
    {
        $this->order_ID = $order_ID;
    }
}

$query = "SELECT payment_ID, paymentType, order_ID FROM payments";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt-> fetchAll(PDO::FETCH_ASSOC);

$allPayments = array();

foreach ($row as $item) {
// Create a Product object and assign values
    $payment = new Payments();
    $payment->setPaymentID($item['payment_ID']);
    $payment->setPaymentType($item['paymentType']);
    $payment->setOrderID($item['order_ID']);

    $allPayments[] = $payment;
}

foreach ($allPayments as $payment) {
    echo "<b>Payment ID: </b>" . $payment->getPaymentID() . "<br>";
    echo "<b>Type: </b>" . $payment->getPaymentType() . "<br>";
    echo "<b>Order ID: </b>" . $payment->getOrderID() . "<br>";
    echo "<hr>";
}
?>