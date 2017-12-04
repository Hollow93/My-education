<?php
if (isset($_FILES['test_up'])) {
    echo 'Файл теста сохранен';
    $new_test = $_FILES['test_up'];
    move_uploaded_file($new_test["tmp_name"],$new_test['name']);

    file_put_contents('list_tests',$new_test['name'].PHP_EOL,FILE_APPEND);

}

echo'<br/>';
echo 'Список загруженных тестов: ';
echo'<br/>';
$list_tests =  file_get_contents('list_tests');
$mass_tests = explode(PHP_EOL ,$list_tests);
for ($i=0; $i <count($mass_tests)-1; $i++){
    echo $mass_tests[$i];
    echo'<br/>';
}

