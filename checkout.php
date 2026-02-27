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
?>

<h2>Final Benediction</h2>
<p>You are about to complete your sacred contribution.</p>

<p><strong>Total Offering: €<?= number_format($total,2) ?></strong></p>

<a href="https://ko-fi.com/YOURPAGE?amount=<?= $total ?>&return_url=http://yourdomain.com/thankyou.php?paid=1"
   class="btn btn-primary">
   Proceed to Ko-fi
</a>

<?php include 'includes/footer.php'; ?>