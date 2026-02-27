<?php
include 'includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$products = json_decode(file_get_contents('assets/data.json'), true);

$product = null;
foreach ($products as $p) {
    if ($p['id'] == $_GET['id']) {
        $product = $p;
        break;
    }
}

if (!$product) {
    header("Location: index.php");
    exit;
}
?>

<h2><?= htmlspecialchars($product['name']) ?></h2>
<p><?= htmlspecialchars($product['description']) ?></p>
<p><strong>€<?= number_format($product['price'], 2) ?></strong></p>

<form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <button type="submit" class="btn btn-primary">
        Add to Cart
    </button>
</form>

<?php include 'includes/footer.php'; ?>