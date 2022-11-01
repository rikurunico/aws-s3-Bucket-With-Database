<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="postUploadDB.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nama"> <br><br><br>
        <input type="file" name="gambar" accept="image/png, image/gif, image/jpeg">
        <input type="submit" name="submit">
    </form>

</body>

</html>