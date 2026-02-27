<?php
include 'includes/header.php';

if (!isset($_GET['paid'])) {
    echo "<h2>Awaiting Confirmation</h2>";
    echo "<p>Your offering has not yet been confirmed.</p>";
    include 'includes/footer.php';
    exit;
}

$hasVerse = false;

foreach ($_SESSION['cart'] as $item) {
    if ($item['has_verse']) {
        $hasVerse = true;
        break;
    }
}

echo "<h2>🙏 Offering Received</h2>";
echo "<p>Your thoughts and prayers have been reverently dispatched.</p>";

if ($hasVerse) {
    $verses = json_decode(file_get_contents('assets/verses.json'), true);
    $randomVerse = $verses[array_rand($verses)];

    echo "<div class='card mt-4 p-3 bg-light'>";
    echo "<h5>📖 A Sacred Verse For You</h5>";
    echo "<p><em>$randomVerse</em></p>";
    echo "</div>";
}

unset($_SESSION['cart']);

include 'includes/footer.php';
?>