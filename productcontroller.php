<?php
include_once '../config/database.php';
include_once '../models/Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $stmt = $this->product->read();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    }

    // Other CRUD operations
}

// Example of calling the index method
$productController = new ProductController();
$productController->index();
?>
