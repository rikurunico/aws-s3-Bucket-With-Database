<?php

$username = "root";
$password = "";
$hostname = "localhost";
$database = ""; // Database name

$AWSKey = ""; // AWS Key
$AWSSecret = ""; // AWS Secret
$endpoint = ""; // Endpoint Example "https://s3.ap-southeast-1.amazonaws.com"
$region = ""; // Region Example "ap-southeast-1"

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}

$query = "SELECT * FROM `gambar`";

if (mysqli_query($connect, $query)) {
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
