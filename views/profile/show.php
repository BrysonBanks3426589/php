<?php
// Read-only profile view
?>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Profile: <?= htmlspecialchars($user['username']) ?></h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
        <p><strong>Active:</strong> <?= $user['active'] ? 'Yes' : 'No' ?></p>
        <a class="btn btn-primary" href="/php-1/profile.php?id=<?= $user['id'] ?>&edit=1">Edit Profile</a>
        <a class="btn btn-danger" href="/php-1/views/profile/deactivate.php?id=<?= $user['id'] ?>">Deactivate</a>
    </div>
</div>
