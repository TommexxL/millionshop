<?php
$quotes = json_decode(file_get_contents("data/quotes.json"), true);
include 'includes/header.php';
?>



<h1>📜 Quote Shop</h1>
<a href="cart.php">🛒 Cart (<?php echo count($_SESSION['cart'] ?? []); ?>)</a>

<div class="grid">
<?php foreach ($quotes as $quote): ?>
    <div class="card">
        <h2><?php echo htmlspecialchars($quote['title']); ?></h2>
        <p><em><?php echo htmlspecialchars($quote['author']); ?></em></p>
        <p>€<?php echo number_format($quote['price'], 2); ?></p>
        <a href="product.php?id=<?php echo $quote['id']; ?>">View</a>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>