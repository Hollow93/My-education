<?php
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');

//$json1 = file_get_contents('city.list.json');
//json_decode($json1);
//$gorod = array_search('Orenburg',$json1);

?>

<form action="action.php" method="post">
    Метео-центр
 <p>Для получения погоды введите город <input type="text" name="name" /></p>

 <p><input type="submit" /></p>
</form>

