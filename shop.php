<?php 
include 'header.php'; 
include "ASSETS/db/database.php"; 
?>

<div>
    <input type="text" id="searchInput" placeholder="Search products..." oninput="searchProducts()">
</div>

<aside class="banner">
    <h2>Promo Spesial!</h2>
    <p>Dapatkan diskon hingga 50% untuk pembelian pertama Anda!</p>
</aside>

<div class="product-list" id="productList"></div>

<script>
    const products = [
        { name: 'Hatten Aga White', price: 250000, img: 'ASSETS/images/aga white.jpg' },
        { name: 'Hatten Aga Rose', price: 300000, img: 'ASSETS/images/aga rose.jpg' },
        { name: 'Hatten Sweet Alexandria', price: 350000, img: 'ASSETS/images/Hatten Sweet Alexandria.png' },
        { name: 'Two Island Chardonnay', price: 275000, img: 'ASSETS/images/Two Island Chardonnay.jpg' },
        { name: 'Two Island Sauvignon Blanc', price: 275000, img: 'ASSETS/images/Two Island Sauvignon Black.png' },
        { name: 'Two Island Reserve Cabernet Sauvignon', price: 300000, img: 'ASSETS/images/Two Island Reserve Cabernet Sauvignon.png' },
        { name: 'Two Island Rose', price: 300000, img: 'ASSETS/images/aga rose.jpg' },
        { name: 'G7 Merlot', price: 250000, img: 'ASSETS/images/G7 Merlot.png' },
        { name: 'Tunjung Brut Sparkling', price: 375000, img: 'ASSETS/images/tunjung brut.jpg' },
        { name: 'Hatten Sparkling Rose', price: 300000, img: 'ASSETS/images/sparkling rose.jpg' }
    ];

    function loadProducts(products) {
        const productList = document.getElementById('productList');
        productList.innerHTML = ''; // Clear previous products

        products.forEach(product => {
            let div = document.createElement('div');
            div.classList.add('product');
            div.innerHTML = `
                <img src="${product.img}" alt="${product.name}" class="product-image">
                <h3>${product.name}</h3>
                <p>Rp ${product.price.toLocaleString()}</p>
                <button onclick="addToCart('${product.name}', ${product.price})">Add to Cart</button>
            `;
            productList.appendChild(div);
        });
    }

    function searchProducts() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        const filteredProducts = products.filter(product =>
            product.name.toLowerCase().includes(query)
        );
        loadProducts(filteredProducts);
    }

    function addToCart(name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push({ name, price });
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(name + " telah ditambahkan ke keranjang!");
        updateCartCount();
    }

    // Update the cart item count in the header
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartCount = cart.length;
        const cartCountElement = document.getElementById('cartCount');
        if (cartCountElement) {
            cartCountElement.textContent = cartCount;
        }
    }

    loadProducts(products); // Load all products initially
    updateCartCount(); // Update cart count on page load
</script>


<?php include 'footer.php'; ?>
