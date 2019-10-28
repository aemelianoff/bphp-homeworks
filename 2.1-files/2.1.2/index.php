<?php

if (count($_FILES) > 0) {
    $uploadsDir = 'img';
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['file']['tmp_name'];
        if (is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($_FILES['file']['name']);
            if ($pathParts['extension'] == 'jpg' || $pathParts['extension'] == 'jpeg' || $pathParts['extension'] == 'png' || $pathParts['extension'] == 'gif') {
                move_uploaded_file($tmpName, $uploadsDir . '/' . $pathParts['basename']);
                echo 'Файл успешно загружен';
            } else {
                echo 'Недопустимый формат файла. Можно загружать только изображения в формате jpg, jpeg, png или gif';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang = "ru">
  <head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Загрузить файл">
    </form>

    <?php
        $images = scandir("./img");
        foreach ($images as $key => $value) {
            if ($value == "." || $value == "..") {
                unset($images[$key]);
            }
        }
        if (count($images) > 0) {
            foreach ($images as $value) {
                echo "<img src='./img/" . $value . "'> ";
                
            }
        }
    ?>
  </body>
</html>
