<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="This page includes content assisted by AI tools.">
  <title>Album Order Form</title>

  
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body class="bg-light">

<div class="container mt-5">
  <h1 class="mb-4">Order an Album</h1>

  <?php
    
    if (isset($_GET['error'])) {
      echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
    }
  ?>

  <?php

    $albums = [
      "evermore" => "Evermore - Taylor Swift",
      "midnights" => "Midnights - Taylor Swift",
      "1989" => "1989 (Taylor's Version)",
      "folklore" => "Folklore - Taylor Swift"
    ];
  ?>

  <form action="handle-form.php" method="POST" class="card p-4 shadow-sm bg-white">

    
    <div class="mb-3">
      <label for="name" class="form-label">Your Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>

    
    <div class="mb-3">
      <label for="album" class="form-label">Choose an Album</label>
      <select id="album" name="album" class="form-select" required>
        <option value="">-- Select an Album --</option>
        <?php
          foreach ($albums as $key => $title) {
            echo "<option value=\"$title\">$title</option>";
          }
        ?>
      </select>
    </div>

    
    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
    </div>

    
    <div class="mb-3">
      <label class="form-label">Format</label><br>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="media" id="cd" value="CD">
        <label class="form-check-label" for="cd">CD</label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="media" id="download" value="Download">
        <label class="form-check-label" for="download">Download</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit Order</button>
  </form>
</div>

</body>
</html>
