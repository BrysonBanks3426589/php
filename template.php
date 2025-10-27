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
  <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
      <a href="#" class="navbar-brand">PHP File Upload Project</a>
    </div>
  </nav>

  <main class="container">
    <?php ?>
  </main>

  <footer class="text-center py-4 text-muted">
    <p>&copy; <?= date('Y') ?> My PHP Project</p>
  </footer>
</body>
<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>

    <div class="container my-4">
        <?php echo $pageContents; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">CodeStream Calendar</a>
        </div>
    </nav>

    <main class="container">
        <?php echo $content; ?>
    </main>

    <footer class="text-center mt-5 mb-3 text-muted">
        &copy; <?php echo date('Y'); ?> CodeStream Solutions
    </footer>
</body>
</html>