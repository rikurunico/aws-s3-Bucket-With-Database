<?php

include 'koneksi.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

require 'vendor/autoload.php';

$nama = $_POST['nama'];
$gambar = $_FILES['gambar']['name'];

$source = $_FILES['gambar']['tmp_name'];
$folder = './gambar/';

try {
    $client = S3Client::factory([
        'version' => 'latest',
        'region'  => $region,
        'endpoint' => $endpoint,
        'credentials' => [
            'key'    => $AWSKey,
            'secret' => $AWSSecret
        ]
    ]);

    $bucket = 'tugas-aws-dbbucket';

    $client->putObject([
        'Bucket' => $bucket,
        'Key'    => $gambar,
        'SourceFile' => $source,
        'ACL'    => 'public-read'
    ]);

    $gambar = $endpoint . '/' . $bucket . '/' . $gambar;

    $query = "insert into `gambar` (nama, urlGambar) values ('$nama', '$gambar')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Gagal";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
