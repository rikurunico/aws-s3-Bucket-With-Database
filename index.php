<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="postDB.php">Upload Gambar</a>

    <?php

    include 'koneksi.php';

    //show from name and url
    $query = "SELECT * FROM `gambar`";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            //make tabel for show
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td><img src='" . $row['urlGambar'] . "' width='300px' height='300px'></td>";
            echo "<td> <a href='deleteDB.php?id=" . $row['id'] . "'>Delete</a> </td>";
            echo "</tr>";
            echo "</table>";
        }
    } else {
        echo "0 results";
    }

    ?>
</body>

</html>