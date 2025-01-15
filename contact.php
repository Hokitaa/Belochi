<?php include 'header.php'; ?>

<div class="contact">
    <h1>Contact Us</h1>
    <form method="post" action="contact.php">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Send email or save to database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Process the contact form (store in DB, send email, etc.)
    echo "<p>Thank you for your message, $name!</p>";
}
?>

<?php include 'footer.php'; ?>
