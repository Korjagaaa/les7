<?php
$json = "json";
$file_dir = './tests.';
$files = glob('/var/www/user_data/franchuk/me/PHP/les7/tests/*.json');
$fileLast = end($files);
preg_match('/([\d]+).json/s', $fileLast, $match);
$fileNew = ($match[1]+1).'.json';
if (isset($_FILES['myfile']['name']) && !empty($_FILES['myfile']['name'])) {
    $file_name = $_FILES['myfile']['name'];
    $explode = explode(".", $file_name);
    if ($explode[1] !== $json) {
        echo "<script>alert(\"Можно загружать только файлы с разрешением json.\");</script>";
    } else {
        if ($_FILES['myfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES['myfile']['tmp_name'], "/var/www/user_data/franchuk/me/PHP/les7/tests/$fileNew")) {
            echo "<script>alert(\"Файл с тестами успешно загружен\");</script>";
            echo "<script>location=\"list.php\";</script>";
        } else {
            echo "<script>alert(\"Не удалось загрузить файл с тестами.\");</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="list.php">Список тестов</a></li>
        <li><a href="admin.php">Загрузить тест</a></li>
    </ul>
</nav>
<form enctype="multipart/form-data" action="#" method="POST">
    Тест в формате json: <input name="myfile" type="file"/>
    <br/>
    <input class="button" type="submit" value="Отправить" name="otpravit">
</form>
</body>
</html>