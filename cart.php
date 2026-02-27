<?php
include 'includes/header.php';
$cart = $_SESSION['cart'] ?? [];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'];
}
?>

<h1>Your Cart</h1>

<?php if (empty($cart)): ?>
    <p>Cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li><?php echo $item['title']; ?> - €<?php echo number_format($item['price'],2); ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Total: €<?php echo number_format($total,2); ?></h3>
    <a href="checkout.php">Proceed to Checkout</a>
<?php endif; ?>