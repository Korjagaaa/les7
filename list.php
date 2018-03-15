<?php
$json = "json";
$files_dir = "./tests";
$files_list = scandir($files_dir);
$jsn_files = [];
for ($i = 0; $i < count($files_list); $i++){
    $explode = explode(".", $files_list[$i]);
    if ($explode[1] === $json){
        array_push($jsn_files, $files_list[$i]);
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
        for ($i = 0; $i < count($jsn_files); $i++) {
            echo "<li><a href='test.php?id=".$i."'>Тест №".$i."</a></li>";
        }
        ?>
    </ul>
</div>
</body>
</html>