<?php include 'header.php'; ?>

<!-- Cart Items -->
<div id="cartItems"></div>

<!-- Total Price -->
<div class="total-price" id="totalPrice">Total: Rp 0</div>

<!-- Payment Section -->
<div id="paymentSection">
    <h3>Payment via QRIS</h3>
    <p>Scan the QR code below and input the nominal to make the payment.</p>
    <img src="ASSETS/images/qrcode.png" alt="QRIS Payment" id="qrisImage" />
</div>

<!-- Confirm Payment Button -->
<button onclick="window.location.href='https://wa.me/6281805639726';">Confirm your payment here!</button>

<!-- Load Cart -->
<script>
    // Load the cart when the page loads
    loadCart(); 

    function loadCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cartItems');
        const totalPriceElement = document.getElementById('totalPrice');
        
        // Clear the current cart display
        cartItemsContainer.innerHTML = '';

        let totalPrice = 0;

        // Display the cart items
        cart.forEach((item, index) => {
            const cartItemDiv = document.createElement('div');
            cartItemDiv.classList.add('cart-item');
            cartItemDiv.innerHTML = `
                <p>${item.name} - Rp ${item.price.toLocaleString()}</p>
                <button onclick="removeFromCart(${index})">Remove</button>
            `;
            cartItemsContainer.appendChild(cartItemDiv);
            totalPrice += item.price;
        });

        // Update the total price
        totalPriceElement.textContent = `Total: Rp ${totalPrice.toLocaleString()}`;
    }

    // Function to add items to cart
    function addToCart(name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push({ name, price });
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(name + " telah ditambahkan ke keranjang!");
        loadCart(); // Reload the cart after adding
        updateCartCount(); // Update the cart count in the header
    }

    // Function to remove an item from the cart
    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1); // Remove item at the given index
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart(); // Reload the cart after removing an item
        updateCartCount(); // Update the cart count in the header
    }

    // Update the cart count in the header
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartCount = cart.length;
        const cartCountElement = document.getElementById('cartCount');
        if (cartCountElement) {
            cartCountElement.textContent = cartCount;
        }
    }
</script>

<?php include 'footer.php'; ?>
