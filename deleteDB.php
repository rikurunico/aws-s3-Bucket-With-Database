<?php

include 'koneksi.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

require 'vendor/autoload.php';

$client = S3Client::factory([
    'version' => 'latest',
    'region'  => $region,
    'endpoint' => $endpoint,
    'credentials' => [
        'key'    => $AWSKey,
        'secret' => $AWSSecret
    ]
]);

$id = $_GET['id'];

$query = "SELECT * FROM `gambar` WHERE id = '$id'";

$result = mysqli_query($connect, $query);

$result = mysqli_fetch_assoc($result);

$explode = explode("/", $result['urlGambar']);

$endURL = end($explode);

$bucket = 'tugas-aws-dbbucket';

try {
    $client->deleteObject([
        'Bucket' => $bucket,
        'Key'    => $endURL
    ]);

    $query = "DELETE FROM `gambar` WHERE id = '$id'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Gagal";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
