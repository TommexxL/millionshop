<?php
include 'includes/header.php';

$products = json_decode(file_get_contents('assets/data.json'), true);
?>

<div class="text-center mb-5">
    <h2 class="fw-light">Need a quick salvation?</h2>
    <p class="lead text-muted">
        Look no further. Here, thoughts are gathered, prayers are packaged, and peace is offered in three carefully curated tiers.
        Choose the blessing that resonates with your spirit and let your worries ascend in quiet reverence.
        May your selection bring comfort, clarity, and a modest sense of divine assurance.
    </p>
</div>

<div class="row">
<?php foreach ($products as $product): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                <p><strong>€<?= number_format($product['price'], 2) ?></strong></p>
                <form method="post" action="cart.php" class="mt-auto">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn-primary w-100">
                        Add to Cart
                </button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>