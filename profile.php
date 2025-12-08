<?php
require_once __DIR__ . '/config/init.php';
require_once __DIR__ . '/controllers/UserController.php';

// Ensure user is logged in to view profile pages
requireLogin();

$id = intval($_GET['id'] ?? (currentUser()['id'] ?? 0));
if (!$id) {
    header('Location: /php-1/index.php');
    exit;
}

// If handling POST update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // update via controller
    updateUser($_POST);
    // updateUser will redirect on success
}

// Determine mode: edit or view
$editMode = isset($_GET['edit']) && $_GET['edit'] == '1';

// Load user for display
$user = getUserById($id);
if (!$user) {
    header('Location: /php-1/index.php');
    exit;
}

// Only owner or admin can view this profile
if (!isAdmin() && !isUser($id)) {
    header('Location: /php-1/index.php');
    exit;
}

$pageTitle = 'Profile - ' . htmlspecialchars($user['username']);
$content = '';
if ($editMode) {
    // include edit view
    ob_start();
    include __DIR__ . '/views/profile/edit.php';
    $content = ob_get_clean();
} else {
    ob_start();
    include __DIR__ . '/views/profile/show.php';
    $content = ob_get_clean();
}

include __DIR__ . '/template.php';
?>
