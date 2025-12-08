<?php
require_once __DIR__ . '/../../config/init.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/php-1/index.php">Album Store</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/php-1/index.php">Home</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if (isLoggedIn()): ?>
            <li class="nav-item"><a class="nav-link" href="/php-1/profile.php">Profile</a></li>
            <?php if (isAdmin()): ?>
                <li class="nav-item"><a class="nav-link" href="/php-1/admin/dashboard.php">Admin</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="/php-1/logout.php">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/php-1/login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="/php-1/register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
