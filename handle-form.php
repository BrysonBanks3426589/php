<?php

if (
  empty($_POST['name']) ||
  empty($_POST['album']) ||
  empty($_POST['quantity']) ||
  empty($_POST['media'])
) {
  $msg = urlencode("Please fill in all fields.");
  header("Location: form.php?error=$msg");
  exit;
}


$name     = htmlspecialchars($_POST['name']);
$album    = htmlspecialchars($_POST['album']);
$quantity = (int) $_POST['quantity'];
$media    = $_POST['media'];


$shipping      = 2.99;
$downloadPrice = 9.99;
$cdPrice       = 12.99;

$heading = "Cost by Quantity";

$total = 0;


if ($media === "CD") {
  
  for ($i = 1; $i <= $quantity; $i++) {
    $total += $cdPrice;
  }
  $total += $shipping;
} else {
  
  $count = 1;
  while ($count <= $quantity) {
    $total += $downloadPrice;
    $count++;
  }
}


$totalFormatted = number_format($total, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="This page includes content assisted by AI tools.">
  <title>Order Summary</title>

  
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card p-4 shadow-sm">

    <h2 class="mb-3"><?php echo $heading; ?></h2>

    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Album Chosen:</strong> <?php echo $album; ?></p>
    <p><strong>Format:</strong> <?php echo $media; ?></p>
    <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>

    <div class="alert alert-success mt-4">
      <h4 class="alert-heading">Total Cost</h4>
      <p>$<?php echo $totalFormatted; ?></p>
    </div>

    <a href="form.php" class="btn btn-secondary mt-2">Place Another Order</a>
  </div>
</div>

</body>
</html>
