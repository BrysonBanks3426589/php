<?php
$pageTitle = "Invoice Form";


$albums = [
    "Taylor Swift" => "1989",
    "The Beatles" => "Abbey Road",
    "Adele" => "21",
    "Drake" => "Scorpion",
    "Beyoncé" => "Lemonade",
    "Coldplay" => "Parachutes",
    "Ed Sheeran" => "Divide",
    "Kanye West" => "Graduation",
    "Billie Eilish" => "When We All Fall Asleep",
    "Bruno Mars" => "24K Magic",
    "The Weeknd" => "After Hours"
];

ob_start(); 
?>

<form action="handle-invoice.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label for="album" class="form-label">Select an Album:</label>
        <select name="album" id="album" class="form-select">
            <?php foreach ($albums as $artist => $album): ?>
                <option value="<?= htmlspecialchars($artist) ?>"><?= htmlspecialchars($artist) ?> – <?= htmlspecialchars($album) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Format:</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="format" value="cd" id="cd" required>
            <label class="form-check-label" for="cd">CD</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="format" value="download" id="download" required>
            <label class="form-check-label" for="download">Download</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
$pageContents = ob_get_clean();
include 'template.php';
?>
