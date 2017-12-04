<html>
<body>
<?php

mb_internal_encoding('utf-8');
error_reporting(E_ALL);

function sortty()
{
    echo '1';
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
            <option <?php if($_POST['top2'] == 'Дате добавления'): ?>selected<?php endif; ?>>Дате добавления</option>
            <option <?php if($_POST['top2'] == 'Статусу'): ?>selected<?php endif; ?>>Статусу</option>
            <option <?php if($_POST['top2'] == 'Описанию'): ?>selected<?php endif; ?>>Описанию</option>
        </select>
    <input type="submit"  value="Отсортировать">
    </p>
</form>
<?php
$host = 'localhost';
$dataBase = 'tasks';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$date = date("Y-m-d H:i:s");

$sql2 = "INSERT INTO tasks VALUES (NULL , ? , 'В процессе', ?)";
if (isset($_POST['list']))
{
    $sql2 = "INSERT INTO tasks VALUES (NULL , ? , 'В процессе', ?)";
    $state = $pdo->prepare($sql2);
    $state->execute(array($_POST['list'], $date));
}
if (isset($_POST['top2']))
{
    switch ($_POST['top2']){
        case 'Дате добавления' :
            $sql2 = "SELECT * FROM tasks ORDER BY date_added ASC";
            break;
        case 'Статусу' :
            $sql2 = "SELECT * FROM tasks ORDER BY is_done ASC";
            break;
        case 'Описанию' :
            $sql2 = "SELECT * FROM tasks ORDER BY description ASC";
            break;
    }
    $state = $pdo->prepare($sql2);
    $state->execute();
}else{
    $sql = "SELECT * FROM tasks";
    $state = $pdo->prepare($sql);
    $state->execute();
}


?>
<table align="left" width="600" border="1">
    <tr>
        <td>
            <?php echo 'id';?>
        </td>
        <td>
            <?php echo 'Описание задачи';?>
        </td>
        <td>
            <?php echo 'Статус';?>
        </td>
        <td>
            <?php echo 'Дата добавления';?>
        </td>
        <td>
            <?php echo ' ';?>
        </td>
    </tr>
    <?php
foreach ($state as $row){
?>
    <tr>
        <td>
            <?php echo $row['id'];?>
        </td>
        <td>
            <?php echo $row['description'];?>
        </td>
        <td>
            <?php echo $row['is_done'];?>
        </td>
        <td>
            <?php echo $row['date_added'];?>
        </td>
        <td>

            <a href=" __DIR__ . '/../index.php?id=<?php echo $row['id']?>&action=delete">Удалить</a>

        </td>

    </tr>


    <?php
}
var_dump($_GET);
    var_dump($_POST);
?>
</table>
</body>
</html>