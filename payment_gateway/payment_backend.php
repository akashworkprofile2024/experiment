<?php
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$keyId = 'YOUR_RAZORPAY_KEY';
$keySecret = 'YOUR_RAZORPAY_SECRET';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = intval($_POST['amount']) * 100; // Convert to paise
    $api = new Api($keyId, $keySecret);

    // Create an order
    $order = $api->order->create([
        'amount' => $amount,
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    echo json_encode(['id' => $order['id'], 'amount' => $order['amount']]);
}
?>
