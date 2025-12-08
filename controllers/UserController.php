<?php
require_once __DIR__ . '/../config/init.php';

function listUsers() {
    requireAdmin();
    $users = loadUsers();
    include __DIR__ . '/../admin/dashboard.php';
}

function editUser($id) {
    requireLogin();
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
    // Only admin or the user themselves
    if (!isAdmin() && !isUser($id)) {
        header('Location: /php-1/index.php');
        exit;
    }
    $user = $found;
    include __DIR__ . '/../views/profile/edit.php';
}

function updateUser($data) {
    requireLogin();
    $id = intval($data['id']);
    $users = loadUsers();
    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            // Only admin or the user themselves
            if (!isAdmin() && !isUser($id)) {
                header('Location: /php-1/index.php');
                exit;
            }
            // sanitize and update
            $user['name'] = strip_tags($data['name']);
            $user['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if (isAdmin() && isset($data['role'])) {
                $user['role'] = $data['role'];
            }
            saveUsers($users);
            header('Location: /php-1/admin/dashboard.php');
            exit;
        }
    }
}

?>
