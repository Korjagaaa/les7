<?php
$testDir = "./tests/";
$testId = $testDir.$_GET["id"].".json";
$jsonFile = file_get_contents($testId);
$jsonArray = json_decode($jsonFile, true);
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
<?php
if (!file_get_contents($testId)){
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    die();
}
$jsonFile = file_get_contents($testId);
$jsonArray = json_decode($jsonFile, true);
?>
<form action="diplom.php" method="POST">
    <?php
        echo "<pre>";
        $i = 0;
        foreach ($jsonArray as $questions) {
            echo "<fieldset><legend>".$questions["question"]."</legend>";
            foreach ($questions["answers"] as $answer) {
                echo "<label><input  value='".key($questions["answers"])."' type='radio' name='$i' required>".$answer."</label>";
                next($questions["answers"]);
            }
            echo "</fieldset>";
            $i++;
        }
    ?>
        <br>
        <b>Введите ваше имя:</b><br>
        <label><input type="text" name="name" required></label>
        <input class="button" type="submit" value="Отправить">
</form>
</body>
</html>