<?php
// Editable profile form
?>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Edit Profile: <?= htmlspecialchars($user['username']) ?></h2>
        <form method="post" action="/php-1/profile.php?id=<?= $user['id'] ?>">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <?php include __DIR__ . '/partials/form-fields.php'; ?>
            <button class="btn btn-success" type="submit">Save Changes</button>
            <a class="btn btn-secondary" href="/php-1/profile.php?id=<?= $user['id'] ?>">Cancel</a>
        </form>
    </div>
</div>
