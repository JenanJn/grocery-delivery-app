<?php
include_once '../config/database.php';
include_once '../models/Order.php';

class OrderController {
    private $db;
    private $order;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->order = new Order($this->db);
    }

    public function createOrder($user_id, $product_id, $quantity) {
        $this->order->user_id = $user_id;
        $this->order->product_id = $product_id;
        $this->order->quantity = $quantity;
        if ($this->order->create()) {
            echo json_encode(["message" => "Order created successfully."]);
        } else {
            echo json_encode(["message" => "Unable to create order."]);
        }
    }

    public function updateOrderStatus($order_id, $status) {
        if ($this->order->updateStatus($order_id, $status)) {
            echo json_encode(["message" => "Order status updated successfully."]);
        } else {
            echo json_encode(["message" => "Unable to update order status."]);
        }
    }

    public function getOrderStatus($order_id) {
        $status = $this->order->getStatus($order_id);
        echo json_encode(["status" => $status]);
    }

    // Other CRUD operations
}
?>
