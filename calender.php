<?php



date_default_timezone_set('America/Chicago');


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["custom_date"])) {
    $selectedDate = strtotime($_POST["custom_date"]);
} else {
    $selectedDate = time();
}

$currentDate = date("l, F j, Y", $selectedDate);
$currentTime = date("g:i A", $selectedDate);
$hour = date("H", $selectedDate);
$month = date("n", $selectedDate);


if ($hour >= 5 && $hour < 12) {
    $greeting = "Good morning!";
    $timeImage = "morning.jpg";
} elseif ($hour >= 12 && $hour < 17) {
    $greeting = "Good afternoon!";
    $timeImage = "afternoon.jpg";
} elseif ($hour >= 17 && $hour < 21) {
    $greeting = "Good evening!";
    $timeImage = "evening.jpg";
} else {
    $greeting = "Good night!";
    $timeImage = "night.jpg";
}


if ($month >= 3 && $month <= 5) {
    $season = "Spring Semester ";
    $seasonImage = "spring.jpg";
} elseif ($month >= 6 && $month <= 8) {
    $season = "Summer Semester ";
    $seasonImage = "summer.jpg";
} elseif ($month >= 9 && $month <= 11) {
    $season = "Fall Semester ";
    $seasonImage = "fall.jpg";
} else {
    $season = "Winter Semester ";
    $seasonImage = "winter.jpg";
}


$holidayName = "Christmas";
$holidayDate = strtotime("December 25 " . date("Y", $selectedDate));
if ($selectedDate > $holidayDate) {
   
    $holidayDate = strtotime("December 25 " . (date("Y", $selectedDate) + 1));
}

$daysUntilHoliday = ceil(($holidayDate - $selectedDate) / 86400);
if ($daysUntilHoliday == 0) {
    $holidayMessage = "Merry Christmas! Enjoy your holiday! ";
} else {
    $holidayMessage = "$daysUntilHoliday day" . ($daysUntilHoliday > 1 ? "s" : "") . " until $holidayName!";
}


ob_start();
?>

<div class="card shadow p-4">
    <h2 class="text-center mb-3"><?php echo $greeting; ?></h2>
    <p class="text-center lead">Today is <strong><?php echo $currentDate; ?></strong>. The time is <strong><?php echo $currentTime; ?></strong>.</p>
    
    <div class="text-center my-4">
        <img src="images/<?php echo $timeImage; ?>" alt="Time of day image" class="img-fluid rounded shadow-sm" style="max-width: 300px;">
    </div>

    <h3 class="text-center mt-4"><?php echo $season; ?></h3>
    <div class="text-center mb-4">
        <img src="images/<?php echo $seasonImage; ?>" alt="Season image" class="img-fluid rounded shadow-sm" style="max-width: 300px;">
    </div>

    <div class="alert alert-success text-center fs-5">
        <?php echo $holidayMessage; ?>
    </div>

    <hr>

    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="custom_date" class="form-label">Simulate a Different Date/Time</label>
            <input type="datetime-local" id="custom_date" name="custom_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Calendar</button>
    </form>
</div>

<?php
$content = ob_get_clean();
include 'template.php';
?>
<!DOCTYPE html>
<html lang="en">