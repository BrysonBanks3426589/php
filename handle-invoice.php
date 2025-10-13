<?php
include 'functions.php';

$pageTitle = "Invoice Results";

$artist = $_POST['album'] ?? '';
$quantity = (int) ($_POST['quantity'] ?? 0);
$format = $_POST['format'] ?? 'download';

$pricePerUnit = ($format === 'cd') ? 12.99 : 9.99;
$total = priceCalc($pricePerUnit, $quantity);


$shipping = ($format === 'cd') ? 4.99 : 0.00;
$finalTotal = round($total + $shipping, 2);

ob_start();
?>

<h2>Order Summary</h2>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Artist:</strong> <?= htmlspecialchars($artist) ?></li>
    <li class="list-group-item"><strong>Format:</strong> <?= strtoupper($format) ?></li>
    <li class="list-group-item"><strong>Quantity:</strong> <?= $quantity ?></li>
    <li class="list-group-item"><strong>Unit Price:</strong> $<?= number_format($pricePerUnit, 2) ?></li>
    <li class="list-group-item"><strong>Discounted Total:</strong> $<?= number_format($total, 2) ?></li>
    <li class="list-group-item"><strong>Shipping:</strong> $<?= number_format($shipping, 2) ?></li>
    <li class="list-group-item"><strong>Final Total:</strong> $<?= number_format($finalTotal, 2) ?></li>
</ul>

<a href="invoice.php" class="btn btn-secondary">Go Back</a>

<?php
$pageContents = ob_get_clean();
include 'template.php';
?>
