<?php
    if(isset($_POST["f"])){
      
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="#" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="hidden" name="f" value="upload">
        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>