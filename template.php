<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>

    <div class="container my-4">
        <?php echo $pageContents; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
