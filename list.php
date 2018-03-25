<?php
$json = "json";
$filesDir = "./tests";
$filesList = scandir($filesDir);
$jsnFiles = [];
for ($i = 0; $i < count($filesList); $i++){
    $explode = explode(".", $filesList[$i]);
    if ($explode[1] === $json){
        array_push($jsnFiles, $filesList[$i]);
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
<div class="list">
    <ul>
        <?php
        for ($i = 0; $i < count($jsnFiles); $i++) {
            echo "<li><a href='test.php?id=".$i."'>Тест №".$i."</a></li>";
        }
        ?>
    </ul>
</div>
</body>
</html>