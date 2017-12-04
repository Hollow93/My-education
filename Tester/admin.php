<?php
require_once 'core.php';
if (!AutoRise()) {
    location('login');
}


?>
<form action="list.php" enctype="multipart/form-data" method="post">
    <label>Добро пожаловать, Admin</label><br/>
    <label>Добавить тест: </label><br/>
    <input name="test_up" type="file">
    <br/>
    <input type="submit" value="Отправить"><br/>
    <a href="index.php">Главная</a><br/>
    <a href="logout.php">Выход</a>


</form>

