document.addEventListener('DOMContentLoaded', () => {
    fetch('http://localhost/grocery-delivery-app/backend/index.php/products')
        .then(response => response.json())
        .then(products => {
            const productsSection = document.getElementById('products');
            products.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.className = 'product';
                productDiv.innerHTML = `
                    <h2>${product.name}</h2>
                    <p>${product.description}</p>
                    <p>${product.price}</p>
                `;
                productsSection.appendChild(productDiv);
            });
        });
});
