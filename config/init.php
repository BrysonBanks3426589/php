<?php
session_start();

// Simple user storage using JSON file for this small project
function loadUsers() {
    $data = file_get_contents(__DIR__ . '/../data/users.json');
    return json_decode($data, true);
}

function saveUsers($users) {
    file_put_contents(__DIR__ . '/../data/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function currentUser() {
    return $_SESSION['user'] ?? null;
}

function isAdmin() {
    $user = currentUser();
    return $user && isset($user['role']) && $user['role'] === 'admin';
}

function isUser($id) {
    $user = currentUser();
    return $user && isset($user['id']) && $user['id'] == $id;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /php-1/login.php');
        exit;
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header('Location: /php-1/index.php');
        exit;
    }
}
?>
