<?php
require_once __DIR__ . '/../../config/init.php';
requireLogin();

$id = intval($_GET['id'] ?? 0);
$user = getUserById($id);
if (!$user) {
    header('Location: /php-1/index.php');
    exit;
}
// Only owner or admin
if (!isAdmin() && !isUser($id)) {
    header('Location: /php-1/index.php');
    exit;
}
?>
<div class="card">
    <div class="card-body">
        <h2>Deactivate Account</h2>
        <p>Are you sure you want to deactivate <strong><?= htmlspecialchars($user['username']) ?></strong>?</p>
        <form method="post" action="/php-1/delete.php">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <button class="btn btn-danger" type="submit">Yes, Deactivate</button>
            <a class="btn btn-secondary" href="/php-1/profile.php?id=<?= $user['id'] ?>">Cancel</a>
        </form>
    </div>
</div>
