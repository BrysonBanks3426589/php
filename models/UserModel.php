<?php
require_once __DIR__ . '/../config/init.php';

function getAllUsers() {
    return loadUsers();
}

function getUserById($id) {
    $users = loadUsers();
    foreach ($users as $u) {
        if ($u['id'] == $id) return $u;
    }
    return null;
}

function updateUserModel($id, $data) {
    $users = loadUsers();
    foreach ($users as &$u) {
        if ($u['id'] == $id) {
            $u['name'] = $data['name'];
            $u['email'] = $data['email'];
            if (isset($data['role'])) $u['role'] = $data['role'];
            saveUsers($users);
            return true;
        }
    }
    return false;
}

function deactivateUser($id) {
    $users = loadUsers();
    foreach ($users as &$u) {
        if ($u['id'] == $id) {
            $u['active'] = false;
            saveUsers($users);
            return true;
        }
    }
    return false;
}

?>
