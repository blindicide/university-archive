<?php
echo "Тип загруженного документа: " . $_FILES['filename']['type'] . '<br>';

if(move_uploaded_file($_FILES['filename']['tmp_name'],
                'files/' . $_FILES['filename']['name'])){
    echo "Документ под названием " . $_FILES['filename']['name']
                        . ' загружен на сервер';
                }
    else{
        echo "Загрузка документа не удалась. Обратитесь к администратору сети.";
}

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
    </head>
    <body>
        <br>
        <br>
        <a href="load.html">Вернуться на страницу загрузки</a><br>
        <a href="gallery.php">Перейти к галерее</a>
    </body>
</html>