<?php
	echo "<h1>Welcome to My Website</h1>";
	echo "<p>My name is Bryson banks, I have attended 2 classes that had to do with mysql and html. I been at dallas college for 1 year, I got 1 certificate last semester and have met 1 friend at the college.</p>";
    // My introduction

	$Thequote= "The Heart May Be Weak. And Sometimes, It May Even Give In. But I've Learned That Deep Down, There's A Light That Never Goes Out!";
	echo $Thequote;
	// My favorite Kingdom hearts quote 

	// Company address information
    $company = "CodeStream Solutions";
    $address = "3939 Valley View Ln";
    $city = "Farmers Branch";
    $state = "TX";
    $zip = "75244";

	// Concatenate the address into a formatted block
$fullAddress = "<address><strong>$company</strong><br>$address<br>$city, $state $zip</address>";
echo $fullAddress;

// Assign two numbers and perform operations
$x = 10;
$y = 3;

// Perform and display arithmetic operations
echo "<h2>Math Operations</h2>";
echo "<p>Addition: $x + $y = " . ($x + $y) . "</p>";
echo "<p>Subtraction: $x - $y = " . ($x - $y) . "</p>";
echo "<p>Multiplication: $x * $y = " . ($x * $y) . "</p>";
echo "<p>Division: $x / $y = " . ($x / $y) . "</p>";
echo "<p>Modulus: $x % $y = " . ($x % $y) . "</p>";

// Define a constant with your name and display it
define("MY_NAME", "Bryson Banks");
echo "<h2>Created by: " . MY_NAME . "</h2>";

// Use a PHP superglobal to display the current script filename
echo "<p><strong>Current Script:</strong> " . $_SERVER['PHP_SELF'] . "</p>";

<meta name="description" content="This page includes content assisted by AI tools.">

?>