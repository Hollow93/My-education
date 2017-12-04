<?php
date_default_timezone_set("Europe");

echo  'Сегодня : '.date('Y-m-d') ;
echo '<br/>';
echo 'Сейчас : '.date("H:i:s") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News site</title>
</head>
<body>
    <form action="news.php" method="post">
        <label>Введите заголовок</label>  <br/>
        <input type="text" name="label" size="20"><br/>

        <label>Введите текст новости</label>  <br/>
        <textarea name="comment" cols="100" rows="10"></textarea>  <br/>

        <input type="submit" value="Отправить">

    </form>
</body>
</html>
