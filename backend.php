<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/products' :
        require __DIR__ . '/controllers/ProductController.php';
        break;
    case '/create-order' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/OrderController.php';
            $orderController = new OrderController();
            $orderController->createOrder($data->user_id, $data->product_id, $data->quantity);
        }
        break;
    case '/update-order-status' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/OrderController.php';
            $orderController = new OrderController();
            $orderController->updateOrderStatus($data->order_id, $data->status);
        }
        break;
    case '/get-order-status' :
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $order_id = $_GET['order_id'];
            require __DIR__ . '/controllers/OrderController.php';
            $orderController = new OrderController();
            $orderController->getOrderStatus($order_id);
        }
        break;
    case '/create-payment-intent' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/services/PaymentService.php';
            $paymentService = new PaymentService();
            $paymentIntent = $paymentService->createPaymentIntent($data->amount);
            echo json_encode($paymentIntent);
        }
        break;
    // Add more routes as needed
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
