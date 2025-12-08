<?php
require_once __DIR__ . '/../config/init.php';
requireAdmin();
$users = loadUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="This page includes content assisted by AI tools.">
    <title>Admin Dashboard</title>
    <link href="/php-1/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../header.php'; ?>
<?php include __DIR__ . '/../navbar.php'; ?>
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <p><a class="btn btn-primary" href="/php-1/admin/dashboard.php">Refresh</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td><?= $user['active'] ? 'Yes' : 'No' ?></td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="/php-1/admin/dashboard.php?id=<?= $user['id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="/php-1/delete.php?id=<?= $user['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
