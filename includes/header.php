<?php
session_start();
$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>DigiPriest</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/styles.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
<div class="container">
    <a class="navbar-brand fw-bold" href="index.php">🙏 Sanctified Offerings</a>

    <div class="ms-auto">
        <a href="cart.php" class="btn btn-outline-secondary">
            🛒 Cart (<?= $cartCount ?>)
        </a>
    </div>
</div>
</nav>

<div class="container mt-4">