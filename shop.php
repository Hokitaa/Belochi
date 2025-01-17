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
   <script>
    <div id="shop">
        <h1>Shop Our Wines</h1>
        <div class="products">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                    <p><?php echo $row['name']; ?> - $<?php echo $row['price']; ?></p>
                    <button onclick="addToCart(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', <?php echo $row['price']; ?>)">Add to Cart</button>
                </div>
            <?php endwhile; 

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
