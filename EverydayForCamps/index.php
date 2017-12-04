<html>
<body>
<?php

mb_internal_encoding('utf-8');
error_reporting(E_ALL);

function parsingHomeWork()
{
    $getHomeWork = file_get_contents('http://university.netology.ru/u/vfilipov/homework2.php');
    file_put_contents('3.txt',$getHomeWork);
}


?>

<form name="top" method="post">
    <p><b><h2>Список дел на сегодня :</h2></b>
        <input type="text" size="36" name="list"  placeholder="Описание задачи">
        <input type="submit"  value="Добавить" >&nbsp;&nbsp;&nbsp;
</form>
    <form name="top3" method="post">
         Сортировать по:
        <select name="top2">
            <option>Дате добавления</option>
            <option>Статусу</option>
            <option>Описанию</option>
        </select>
    <input type="submit"  value="Отсортировать">
    </p>
</form>
<?php
$host = 'localhost';
$dataBase = 'task2';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);




?>

</body>
</html>