<html>
<body>
<?php
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');

echo 'Hellow world';

$host = 'localhost';
$dataBase = 'books';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$sql = "SELECT * FROM books";
echo '<br/>';

$state = $pdo->prepare($sql);
$state->execute();


?>

<form name="test" method="post">
    <p><b>Фильтр:</b><br>
        Доступные фильтры: "name", "author", "year", "isbn" , "genre" <br><br>
        <input type="text" size="40" name="filtr">
    </p>
    <p><input type="submit" value="Отправить">
        <input type="reset" value="Очистить"></p>
</form>
<ol>
    <?php

    if (isset($_POST['filtr'])) {
        $explodeFiltr = explode(',', $_POST['filtr']);
    } else {
        $explodeFiltr = array('name', 'author');
    }
    //        {exit;}

    foreach ($state as $row) {
        ?>
        <li><?php
        for ($i = 0; $i < count($explodeFiltr); $i++) {
            switch ($explodeFiltr[$i]) {

                case "name":
                    echo 'Имя книги: ' . htmlspecialchars($row["name"], ENT_QUOTES) . '<br/>';
                    break;
                case "author":
                    echo 'Автор: ' . htmlspecialchars($row["author"], ENT_QUOTES) . '<br/>';
                    break;
                case "year":
                    echo ' Год: ' . htmlspecialchars($row["year"], ENT_QUOTES) . '<br/>';
                    break;
                case "isbn":
                    echo ' ISBN: ' . htmlspecialchars($row["isbn"], ENT_QUOTES) . '<br/>';
                    break;
                case "genre":
                    echo ' Раздел: ' . htmlspecialchars($row["genre"], ENT_QUOTES) . '<br/>';
                    break;
            }
        }
        ?></li><?php
    }
    ?>
</ol>
</body>
</html>