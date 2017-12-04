<?php
$name = $_GET["name"];
echo 'Выбран тест: ' . htmlspecialchars($name) . ' !';
echo '<br/>';

if (file_exists($name)) {
    $test = file_get_contents($name);
    $test1 = json_decode($test, true);
    echo '<br/>';
} else {
    http_response_code(404);
    echo '<br/>';
    echo 'Cтраница не найдена!';
    exit(1);
}


?>

<html>
<head>
</head>
<body>

<form action="result.php" method="POST">
   <p> Введите ваше имя <input type="text" name="name"></p>
    <br/>
    <div>
        <p><?php echo $test1[0]["Вопрос"] ?></p>
        <label><input name="q1" type="radio" value="А"><?php echo $test1[0]["Ответ А"] ?></label>
        <label><input name="q1" type="radio" value="В"><?php echo $test1[0]["Ответ В"] ?></label>
        <label><input name="q1" type="radio" value="С"><?php echo $test1[0]["Ответ С"] ?></label>
        <label><input name="q1" type="radio" value="Д"><?php echo $test1[0]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[1]["Вопрос"] ?></p>
        <label><input name="q2" type="radio" value="А"><?php echo $test1[1]["Ответ А"] ?></label>
        <label><input name="q2" type="radio" value="В"><?php echo $test1[1]["Ответ В"] ?></label>
        <label><input name="q2" type="radio" value="С"><?php echo $test1[1]["Ответ С"] ?></label>
        <label><input name="q2" type="radio" value="Д"><?php echo $test1[1]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[2]["Вопрос"] ?></p>
        <label><input name="q3" type="radio" value="А"><?php echo $test1[2]["Ответ А"] ?></label>
        <label><input name="q3" type="radio" value="В"><?php echo $test1[2]["Ответ В"] ?></label>
        <label><input name="q3" type="radio" value="С"><?php echo $test1[2]["Ответ С"] ?></label>
        <label><input name="q3" type="radio" value="Д"><?php echo $test1[2]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[3]["Вопрос"] ?></p>
        <label><input name="q4" type="radio" value="А"><?php echo $test1[3]["Ответ А"] ?></label>
        <label><input name="q4" type="radio" value="В"><?php echo $test1[3]["Ответ В"] ?></label>
        <label><input name="q4" type="radio" value="С"><?php echo $test1[3]["Ответ С"] ?></label>
        <label><input name="q4" type="radio" value="Д"><?php echo $test1[3]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[4]["Вопрос"] ?></p>
        <label><input name="q5" type="radio" value="А"><?php echo $test1[4]["Ответ А"] ?></label>
        <label><input name="q5" type="radio" value="В"><?php echo $test1[4]["Ответ В"] ?></label>
        <label><input name="q5" type="radio" value="С"><?php echo $test1[4]["Ответ С"] ?></label>
        <label><input name="q5" type="radio" value="Д"><?php echo $test1[4]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[5]["Вопрос"] ?></p>
        <label><input name="q6" type="radio" value="А"><?php echo $test1[5]["Ответ А"] ?></label>
        <label><input name="q6" type="radio" value="В"><?php echo $test1[5]["Ответ В"] ?></label>
        <label><input name="q6" type="radio" value="С"><?php echo $test1[5]["Ответ С"] ?></label>
        <label><input name="q6" type="radio" value="Д"><?php echo $test1[5]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[6]["Вопрос"] ?></p>
        <label><input name="q7" type="radio" value="А"><?php echo $test1[6]["Ответ А"] ?></label>
        <label><input name="q7" type="radio" value="В"><?php echo $test1[6]["Ответ В"] ?></label>
        <label><input name="q7" type="radio" value="С"><?php echo $test1[6]["Ответ С"] ?></label>
        <label><input name="q7" type="radio" value="Д"><?php echo $test1[6]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[7]["Вопрос"] ?></p>
        <label><input name="q8" type="radio" value="А"><?php echo $test1[7]["Ответ А"] ?></label>
        <label><input name="q8" type="radio" value="В"><?php echo $test1[7]["Ответ В"] ?></label>
        <label><input name="q8" type="radio" value="С"><?php echo $test1[7]["Ответ С"] ?></label>
        <label><input name="q8" type="radio" value="Д"><?php echo $test1[7]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[8]["Вопрос"] ?></p>
        <label><input name="q9" type="radio" value="А"><?php echo $test1[8]["Ответ А"] ?></label>
        <label><input name="q9" type="radio" value="В"><?php echo $test1[8]["Ответ В"] ?></label>
        <label><input name="q9" type="radio" value="С"><?php echo $test1[8]["Ответ С"] ?></label>
        <label><input name="q9" type="radio" value="Д"><?php echo $test1[8]["Ответ Д"] ?></label>
    </div>
    <div>
        <p><?php echo $test1[9]["Вопрос"] ?></p>
        <label><input name="q10" type="radio" value="А"><?php echo $test1[9]["Ответ А"] ?></label>
        <label><input name="q10" type="radio" value="В"><?php echo $test1[9]["Ответ В"] ?></label>
        <label><input name="q10" type="radio" value="С"><?php echo $test1[9]["Ответ С"] ?></label>
        <label><input name="q10" type="radio" value="Д"><?php echo $test1[9]["Ответ Д"] ?></label>
    </div>

    <?php echo '<br/>'; ?>
    <button type="submit">Результат</button>


</form>
</body>
</html>


