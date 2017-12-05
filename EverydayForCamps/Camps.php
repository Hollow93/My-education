<html>
<body>
<?php

mb_internal_encoding('utf-8');
error_reporting(E_ALL);

?>

<form name="top" method="post">
    <p><b><h2>Список дел на сегодня :</h2></b>
        <input type="text" size="36" <?php if (isset($_GET['edit'])): ?>name="edition"<?php else: ?>name="list"<?php endif; ?> placeholder="Описание задачи">
        <input type="submit" <?php if (isset($_GET['edit'])): ?>value="Изменить"<?php else: ?>value="Добавить"<?php endif; ?>>&nbsp;&nbsp;&nbsp;
</form>
<form name="top2" method="post">
    Сортировать по:
    <select name="top2">
        <option <?php if (isset($_POST['top2']) && $_POST['top2'] == 'Дате добавления'): ?>selected<?php endif; ?>>Дате добавления</option>
        <option <?php if (isset($_POST['top2']) && $_POST['top2'] == 'Статусу'): ?>selected<?php endif; ?>>Статусу</option>
        <option <?php if (isset($_POST['top2']) && $_POST['top2'] == 'Описанию'): ?>selected<?php endif; ?>>Описанию</option>
    </select>
    <input type="submit" value="Отсортировать">
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


if (isset($_POST['list'])) {
    $sql2 = "INSERT INTO tasks VALUES (NULL , ? , 'В процессе', ?)";
    $state = $pdo->prepare($sql2);
    $state->execute(array($_POST['list'], $date));
}

if (isset($_POST['edition']))
{
    $sql2 = "UPDATE tasks SET description = ? WHERE id = ?";
    $state = $pdo->prepare($sql2);
    $state->execute(array($_POST['edition'],$_GET['id']));
}

if (isset($_GET['delete'])) {
    $sql2 = "DELETE FROM tasks WHERE id = ?";
    $state = $pdo->prepare($sql2);
    $state->execute(array($_GET['id']));
}
if (isset($_GET['complete'])) {
    $sql2 = "UPDATE tasks SET is_done = 'Выполнено' WHERE id = ?";
    $state = $pdo->prepare($sql2);
    $state->execute(array($_GET['id']));
}

if (isset($_POST['top2'])) {
    switch ($_POST['top2']) {
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
} else {
    $sql = "SELECT * FROM tasks";
    $state = $pdo->prepare($sql);
    $state->execute();
}

?>
<table align="left" width="600" border="1">
    <tr>
        <td>
            <?php echo 'id'; ?>
        </td>
        <td>
            <?php echo 'Описание задачи'; ?>
        </td>
        <td>
            <?php echo 'Статус'; ?>
        </td>
        <td>
            <?php echo 'Дата добавления'; ?>
        </td>
        <td>
            <?php echo ' '; ?>
        </td>
    </tr>
    <?php
    foreach ($state as $row) {
        ?>
        <tr>
            <td>
                <?php echo $row['id']; ?>
            </td>
            <td>
                <?php echo $row['description']; ?>
            </td>
            <td>
                <?php echo $row['is_done']; ?>
            </td>
            <td>
                <?php echo $row['date_added']; ?>
            </td>
            <td>
                <a href=" __DIR__ . '/../index.php?id=<?php echo $row['id'] ?>&edit=<?php echo $row['description'] ?>">Изменить</a>
                <a href=" __DIR__ . '/../index.php?id=<?php echo $row['id'] ?>&complete">Выполнить</a>
                <a href=" __DIR__ . '/../index.php?id=<?php echo $row['id'] ?>&delete">Удалить</a>

            </td>

        </tr>


        <?php
    }
    var_dump($_GET);
    var_dump($_POST);
    ?>
</body>
</html>