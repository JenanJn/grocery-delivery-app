<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/products' :
        require __DIR__ . '/controllers/ProductController.php';
        break;
    // Add more routes as needed
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
