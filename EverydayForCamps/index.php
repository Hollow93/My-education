<?php
session_start();

mb_internal_encoding('utf-8');
error_reporting(E_ALL);



class AuthClass
{
    private $_login = "admin";
    private $_password = "admin";

    public function isAuth()
    {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        } else {
            return false;
        }
    }
    public function auth($login, $passwors)
    {
        if ($login == $this->_login && $passwors == $this->_password) {
            $_SESSION["is_auth"] = true;
            $_SESSION["login"] = $login;
            return true;
        } else {
            $_SESSION["is_auth"] = false;
            return false;
        }
    }
    public function getLogin()
    {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }
    public function out()
    {
        $_SESSION = array();
        session_destroy();
    }
}
$auth = new AuthClass();

if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!$auth->auth($_POST["login"], $_POST["password"])) {
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    }
}
if (isset($_GET["is_exit"])) {
    if ($_GET["is_exit"] == 1) {
        $auth->out();
        header("Location: ?is_exit=0");
    }
}
 if (!$auth->isAuth()) { ?>
    <form method="post" action="">
        Логин: <input type="text" name="login"
                      value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; ?>"/><br/>
        Пароль: <input type="password" name="password" value=""/><br/>
        <input type="submit" value="Войти"/>
    </form>
<?php } else {
    echo "Здравствуйте, " . $auth->getLogin();
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>";

?>

<form name="top" method="post">
    <p><b><h2>Список дел на сегодня :</h2></b>
        <input type="text" size="36" <?php if (isset($_GET['edit'])): ?>name="edition"<?php else: ?>name="list"<?php endif; ?> placeholder="Описание задачи">
        <input type="submit" value="Добавить">&nbsp;&nbsp;&nbsp;
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

}