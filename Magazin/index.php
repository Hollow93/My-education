<?php
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');

spl_autoload_register(function ($includeName)
{
    $path = rtrim(__DIR__,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR;
    $filePass = $path . str_replace('\\',DIRECTORY_SEPARATOR,$includeName). '.php';
    if(file_exists($filePass))
    {
        var_dump($filePass);
        require $filePass;
    }
}
);






echo '<br/>';

echo 'Hellow world' ;
echo '<br/>';

$bannan = new \Products\Variabls\Bannana();

//$bannan->getVes(10);
//$bannan->getPrice(100);
//$bannan->getSkidka(0);
$bannan->type();
//$bannan->view();