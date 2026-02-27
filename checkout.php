<?php
include 'includes/header.php';

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'];
}

$returnUrl = urlencode("http://localhost:8000/thankyou.php?paid=1");

?>

<h2>Final Benediction</h2>
<p>You are about to complete your sacred contribution.</p>

<p><strong>Total Offering: €<?= number_format($total,2) ?></strong></p>

<a href="https://ko-fi.com/tommexx/?amount=<?= $total ?>&modal=1&return_url=<?= $returnUrl ?>"
   target="_blank"
   class="btn btn-primary">
   ☕ Support via Ko-fi
</a>

<?php include 'includes/footer.php'; ?>