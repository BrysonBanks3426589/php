<?php
// Include your template wrapper (optional if you’re using template.php)
include 'template.php';

// Initialize variables
$firstName = $lastName = $email = $password = $verifyPassword = "";
$errors = [];
$success = false;
$targetFile = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Sanitize input ---
    $firstName = trim(htmlspecialchars($_POST['firstName']));
    $lastName = trim(htmlspecialchars($_POST['lastName']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = $_POST['password'];
    $verifyPassword = $_POST['verifyPassword'];

    // --- Validate text inputs ---
    if (empty($firstName)) $errors[] = "First name is required.";
    if (empty($lastName)) $errors[] = "Last name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($password) || $password !== $verifyPassword)
        $errors[] = "Passwords must match and not be empty.";

    // --- Validate file upload ---
    if (!empty($_FILES['profile']['name'])) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES["profile"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // File checks
        if (file_exists($targetFile)) {
            $errors[] = "File already exists.";
        } elseif ($_FILES["profile"]["size"] > 300000) {
            $errors[] = "File too large (max 300KB).";
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        $errors[] = "Profile image is required.";
    }

    // --- If no errors, process data ---
    if (empty($errors)) {
        $username = strtolower(substr($firstName, 0, 1) . $lastName);
        $fullName = ucfirst($firstName) . " " . ucfirst($lastName);

        // Move uploaded file to images folder
        move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile);

        // Append user data to membership.txt
        $userData = "$fullName | $email | $password | $username\n";
        file_put_contents("membership.txt", $userData, FILE_APPEND);

        $success = true;
    }
}
?>

<div class="container py-5">
  <h2 class="mb-4">Member Registration</h2>

  <?php if ($success): ?>
    <div class="alert alert-success">
      Welcome, <?= $fullName ?>! Your account has been created successfully.
    </div>

    <img src="<?= $targetFile ?>" alt="Profile Photo" class="img-thumbnail mb-3" width="200">
    <p><strong>Username:</strong> <?= $username ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>

    <h4 class="mt-4">Your Poem:</h4>
    <pre class="bg-light p-3 rounded"><?php echo file_get_contents("poem.txt"); ?></pre>

  <?php else: ?>
    <?php if ($errors): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach ($errors as $error) echo "<li>$error</li>"; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="needs-validation">

      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="firstName" value="<?= $firstName ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="lastName" value="<?= $lastName ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="<?= $email ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Verify Password</label>
        <input type="password" name="verifyPassword" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Upload Profile Image</label>
        <input type="file" name="profile" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  <?php endif; ?>
</div>
