<?php

session_start();
$name1 = $_POST['name'];
echo 'Ваше имя: ' . $name1;
$ot = 0;
$not = 0;
if ($_POST['q1'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q2'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q3'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q4'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q5'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q6'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q7'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q8'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q9'] == 'А') {
    $ot++;
} else {
    $not++;
}
if ($_POST['q10'] == 'А') {
    $ot++;
} else {
    $not++;
}

echo '<br/>';
echo 'Правильных ответов: ' . $ot;
echo '<br/>';
echo 'Неправильных ответов: ' . $not;
echo '<br/>';

if ($ot >= 9) {
    $ocenka = 5;
    echo 'Ваша оценка: ' . $ocenka;
} else {
    if ($ot >= 7) {
        $ocenka = 4;
        echo 'Ваша оценка: ' . $ocenka;
    } else {
        if ($ot >= 5) {
            $ocenka = 3;
            echo 'Ваша оценка: ' . $ocenka;
        } else {
            if ($ot >= 4) {
                $ocenka = 2;
                echo 'Ваша оценка: ' . $ocenka;
            }
        }
    }
}

$_SESSION['sertifName'] = 'Name : '.$name1;
$_SESSION['sertifOcenka'] = 'Ocenka : '.$ocenka;

?>
<html>
<header>
    <title>Сертификат PNG</title>
</header>
<body>
<form action=".">
    <label> Ваш сертификат :</label><br/>
    <input type="image" src="../Tester/sertef.php" name="sub" />
    <br/>
</form>
</body>
</html>

