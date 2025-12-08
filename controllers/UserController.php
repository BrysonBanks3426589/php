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
    // Basic validation: username exists and password length (if provided)
    $errors = [];
    if (empty($data['username'])) {
        $errors[] = 'Username is required.';
    }
    if (!empty($data['password']) && strlen($data['password']) < 4) {
        $errors[] = 'Password must be at least 4 characters.';
    }

    if (!empty($errors)) {
        // In a full app we'd store errors in session or render them
        header('Location: /php-1/profile.php?id=' . $id . '&edit=1');
        exit;
    }

    // update model (for this project using JSON storage functions)
    $users = loadUsers();
    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            // Only admin or owner
            if (!isAdmin() && !isUser($id)) {
                header('Location: /php-1/index.php');
                exit;
            }
            // Update username only if matches (we keep username readonly per spec)
            // Password handling: plain text for testing (never in production)
            if (!empty($data['password'])) {
                $user['password'] = $data['password'];
            }
            saveUsers($users);
            header('Location: /php-1/profile.php?id=' . $id);
            exit;
        }
    }
}

?>
