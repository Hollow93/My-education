<?php
include __DIR__ . '/../Tester/src/SertificatGD.php';
include __DIR__ . '/../Tester/src/Code.php';

session_start();


$sertificat = new SertificatGD();

//$code = new Code();
//$text = $code->getCode();
$sertificat->generaitt($_SESSION['sertifName'],$_SESSION['sertifOcenka']);