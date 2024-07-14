<?php
require_once '../vendor/autoload.php'; // Include the Stripe PHP library

class PaymentService {
    private $secret_key;

    public function __construct() {
        $this->secret_key = 'sk_test_your_secret_key'; // Replace with your Stripe secret key
        \Stripe\Stripe::setApiKey($this->secret_key);
    }

    public function createPaymentIntent($amount) {
        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100, // Amount in cents
                'currency' => 'usd',
            ]);
            return $paymentIntent;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo json_encode(["error" => $e->getMessage()]);
            return null;
        }
    }
}
?>
