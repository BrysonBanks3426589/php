<?php
// Associative Array: Album titles as keys, ratings as values
$albums = [
    "The Dark Side of the Moon" => rand(7, 10),
    "Led Zeppelin IV" => rand(7, 10),
    "Let It Bleed" => rand(7, 10),
    "Rubber Soul" => rand(7, 10),
    "Sticky Fingers" => rand(7, 10)
];

// Add a sixth album
$albums["Abbey Road"] = 10;

// Start building the page content
$pageContent = "<h1>Favorite Albums</h1>";

// Sort albums by title
ksort($albums);

// Create HTML list of albums
$pageContent .= "<ul>";
foreach ($albums as $title => $rating) {
    $pageContent .= "<li><strong>$title</strong> - Rating: $rating</li>";
}
$pageContent .= "</ul>";

// Multidimensional Array: Artists, albums, and release years
$musicLibrary = [
    "The Beatles" => [
        ["title" => "A Hard Day's Night", "year" => 1964],
        ["title" => "Help!", "year" => 1965],
        ["title" => "Rubber Soul", "year" => 1965],
        ["title" => "Abbey Road", "year" => 1969],
    ],
    "Led Zeppelin" => [
        ["title" => "Led Zeppelin IV", "year" => 1971],
    ],
    "Rolling Stones" => [
        ["title" => "Let It Bleed", "year" => 1969],
        ["title" => "Sticky Fingers", "year" => 1971],
    ],
    "The Who" => [
        ["title" => "Tommy", "year" => 1969],
        ["title" => "Quadrophenia", "year" => 1973],
        ["title" => "The Who by Numbers", "year" => 1975],
    ]
];

// Add the release year of "Tommy" by The Who
$tommyYear = $musicLibrary["The Who"][0]["year"];
$pageContent .= "<h2>Featured Album</h2>";
$pageContent .= "<p>'Tommy' by The Who was released in $tommyYear.</p>";

// Display all artists and albums
$pageContent .= "<h2>All Artists and Albums</h2>";
foreach ($musicLibrary as $artist => $albums) {
    $pageContent .= "<h3>$artist</h3><ul>";
    foreach ($albums as $album) {
        $pageContent .= "<li>{$album['title']} ({$album['year']})</li>";
    }
    $pageContent .= "</ul>";
}

// Albums by The Who only
$pageContent .= "<h2>Albums by The Who</h2><ul>";
foreach ($musicLibrary["The Who"] as $album) {
    $pageContent .= "<li>{$album['title']} ({$album['year']})</li>";
}
$pageContent .= "</ul>";

// Albums released after 1970
$pageContent .= "<h2>Albums Released After 1970</h2><ul>";
foreach ($musicLibrary as $artist => $albums) {
    foreach ($albums as $album) {
        if ($album['year'] > 1970) {
            $pageContent .= "<li><strong>$artist</strong>: {$album['title']} ({$album['year']})</li>";
        }
    }
}
$pageContent .= "</ul>";

// Output the final content
echo $pageContent;


<meta name="description" content="This page includes content assisted by AI tools.">

?>
