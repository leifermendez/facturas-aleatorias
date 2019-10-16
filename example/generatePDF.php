<?php

include __DIR__ ."/../vendor/autoload.php";



$clase = new \leifermendez\facturas\RandomPDF();
//$res = $clase->generatePDF([]);
$res = $clase->generatePDF([]);
var_dump($res);