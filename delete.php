<?php
require_once __DIR__ . '/config/init.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $users = loadUsers();
    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            // Only admin or the user themselves can deactivate
            if (!isAdmin() && !isUser($id)) {
                header('Location: /php-1/index.php');
                exit;
            }
            $user['active'] = false; // soft delete
            saveUsers($users);
            header('Location: /php-1/admin/dashboard.php');
            exit;
        }
    }
}

// If GET with id and admin, show verification
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = intval($_GET['id'] ?? 0);
    $users = loadUsers();
    $found = null;
    foreach ($users as $u) {
        if ($u['id'] == $id) {
            $found = $u;
            break;
        }
    }
    if (!$found) {
        header('Location: /php-1/admin/dashboard.php');
        exit;
    }
    // Only admin or the user themselves can see the verify page
    if (!isAdmin() && !isUser($id)) {
        header('Location: /php-1/index.php');
        exit;
    }
    $user = $found;
    include __DIR__ . '/views/profile/delete-verify.php';
}

?>
