<?php
function can_upload($file) {
    if ($file['name'] == '') {
        return 'Вы не выбрали файл.';
    }
	if ($file['size'] == 0) {
        return 'Файл слишком большой.';
    }
    
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
	
	if(!in_array($mime, $types)) {
        return 'Недопустимый тип файла.';
    }

    return true;
}
  
function make_upload($file) {	
    $name = mt_rand(0, 10000) . $file['name'];
	copy($file['tmp_name'], 'img/' . $name);
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
    $files = scandir('img');

    foreach ($files as $file) {
      if ($file !== '.' && $file !== '..') {
          echo "<img class=\"image\" src=\"" . 'img' . '/' . $file . "\">";
      }
    }

    if(isset($_FILES['file'])) {
      $check = can_upload($_FILES['file']);
    
      if($check === true) {
        make_upload($_FILES['file']);
        
        $files = scandir('img');
        $count = count($files) - 1;
        $file = $files[$count];
        echo "<img class=\"image\" src=\"" . 'img' . '/' . $file . "\">";
      } else {
        echo "<div>Ошибка загрузки файла</div>";
      }
    }
    ?>
  </body>
</html>