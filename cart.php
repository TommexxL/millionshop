<?php
include 'includes/header.php';

$products = json_decode(file_get_contents('assets/data.json'), true);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    foreach ($products as $p) {
        if ($p['id'] == $_POST['product_id']) {
            $_SESSION['cart'][] = $p;
        }
    }
}

// Remove item
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

$total = 0;
?>

<h2>Your Sacred Cart</h2>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Your cart awaits divine intention.</p>
<?php else: ?>
    <ul class="list-group mb-3">
        <?php foreach ($_SESSION['cart'] as $index => $item): 
            $total += $item['price']; ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= htmlspecialchars($item['name']) ?>
                <span>
                    €<?= number_format($item['price'],2) ?>
                    <a href="?remove=<?= $index ?>" class="text-danger ms-2">✕</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h5>Total: €<?= number_format($total,2) ?></h5>

    <form method="post" action="checkout.php">
        <button class="btn btn-success mt-3">Proceed to Offering</button>
    </form>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>