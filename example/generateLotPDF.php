<?php

include __DIR__ ."/../vendor/autoload.php";
use \leifermendez\facturas\RandomPDF;

$options = array(
    'invoice_start_date' => '2019-10-01',
    'invoice_end_date' => '2019-10-15',
    'global_price' => '42462', //USD
    'invoice_amount' => '7'
);

$clase = new RandomPDF($options);
//$res = $clase->generatePDF([]);
$res = $clase->generateLotPDF([]);
var_dump($res);