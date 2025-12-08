<?php
// Shared form fields for username and password only (as per instructions)
$u = $user ?? ['username' => '', 'password' => ''];
?>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($u['username']) ?>" readonly>
</div>
<div class="mb-3">
    <label for="password" class="form-label">New Password</label>
    <input type="password" id="password" name="password" class="form-control" value="">
    <small class="form-text text-muted">Leave blank to keep existing password.</small>
</div>
