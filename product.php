<?php
include 'includes/header.php';
$quotes = json_decode(file_get_contents("data/quotes.json"), true);

$id = $_GET['id'] ?? null;

foreach ($quotes as $quote) {
    if ($quote['id'] == $id) {
        $product = $quote;
        break;
    }
}

if (!isset($product)) {
    die("Product not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cart'][] = $product;
    header("Location: cart.php");
    exit;
}
?>

<h1><?php echo htmlspecialchars($product['title']); ?></h1>
<p><?php echo htmlspecialchars($product['author']); ?></p>
<p>€<?php echo number_format($product['price'], 2); ?></p>

<form method="POST">
    <button type="submit">Add to Cart</button>
</form>