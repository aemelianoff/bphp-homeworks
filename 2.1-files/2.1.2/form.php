<?php
$uploadsDir = '/uploads';
foreach ($_FILES['pictures']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['pictures']['tmp_name'][$key];
        if (is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($_FILES['pictures']['name'][$key]);
            if ($pathParts['extension'] != 'jpg') {
                move_uploaded_file($tmpName,
                $uploadsDir.'/'.$pathParts['basename']
            );
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <img src="<?php $_FILES['pictures']['tmp_name'][0]?>" alt="0">
            <img src="<?php $_FILES['pictures']['tmp_name'][1]?>" alt="1">
            <img src="<?php $_FILES['pictures']['tmp_name'][2]?>" alt="2">
        </div>
    </body>
</html>