document.addEventListener('DOMContentLoaded', () => {
    const orderId = 1; // Replace with dynamic order ID

    function fetchOrderStatus() {
        fetch(`http://localhost/grocery-delivery-app/backend/index.php/get-order-status?order_id=${orderId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('order-status').innerText = `Order Status: ${data.status}`;
            });
    }

    // Poll for order status every 5 seconds
    setInterval(fetchOrderStatus, 5000);
});
