
Здравствуйте, погода в городе <?php echo htmlspecialchars($_POST['name']); ?>:
<?php
echo '<br/>';

$weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_POST['name'].'&units=metric&APPID=684094df198854c6720ddf14eafad73d');
$My_weather = json_decode($weather);
echo '<br/>';
echo 'temp'.$My_weather->main->temp;
echo '<br/>';
echo 'pressure'.$My_weather->main->pressure;
echo '<br/>';
echo 'humidity'.$My_weather->main->humidity;
echo '<br/>';
echo 'temp_min'.$My_weather->main->temp_min;
echo '<br/>';
echo 'temp_max'.$My_weather->main->temp_max;
echo '<br/>';
//var_dump($My_weather);