<?php
include 'includes/header.php';
$total = 0;

foreach ($_SESSION['cart'] ?? [] as $item) {
    $total += $item['price'];
}
?>

<h1>Checkout</h1>
<p>Total: €<?php echo number_format($total, 2); ?></p>

<!-- Ko-fi Payment Button -->
<script src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script>
<script>
kofiwidget2.init('Pay €<?php echo number_format($total,2); ?>', '#29abe0', 'YOUR_KOFI_USERNAME');
kofiwidget2.draw();
</script>

<p>After payment, you can manually redirect to success page.</p>
<a href="success.php">I have paid</a>