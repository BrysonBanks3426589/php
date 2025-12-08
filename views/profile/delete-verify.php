<?php
// Simple delete verification view
$user = $user ?? null;
?>
<div class="container mt-4">
    <h2>Confirm Deletion</h2>
    <?php if ($user): ?>
        <p>Are you sure you want to deactivate/delete user <strong><?= htmlspecialchars($user['name']) ?></strong>?</p>
        <form method="post" action="/php-1/delete.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
            <button class="btn btn-danger" type="submit">Yes, Deactivate</button>
            <a class="btn btn-secondary" href="/php-1/admin/dashboard.php">Cancel</a>
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</div>
