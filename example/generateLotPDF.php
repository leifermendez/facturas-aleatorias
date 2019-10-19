<?php

include __DIR__ . "/../vendor/autoload.php";

use \leifermendez\facturas\RandomPDF;

$options = array(
    'invoice_start_date' => '2019-10-01',
    'invoice_end_date' => '2019-10-15',
    'global_price' => '42462',
    'invoice_amount' => '7',
    'tax' => '14'
);

$customers = array(
    array(
        'customer_name' => 'Leifer J Mendez Z',
        'customer_rif' => '12345678',
        'customer_phone' => '1234567890',
        'customer_address' => 'Madrid, España',
        'customer_email' => 'leifer33@gmail.com'
    )
);

$vendor = array(
    array(
        'company_header' => 'Media Mark',
        'company_init' => 'MK',
        'company_rif' => '0000000',
        'company_name' => 'Media Mark',
        'company_phone' => '123456789',
        'company_address' => 'La Castellana Madrid'
    )
);

$items = array(
    array(
        'title' => 'Celular Samsung modelo 00000',
        'price' => 100,
        'qty' => 1,
        'tax' => 0,
    ),
    array(
        'title' => 'Cargador auxiliar de coche',
        'price' => 45,
        'qty' => 1,
        'tax' => 0,
    ),
);

$clase = new RandomPDF($options, $customers, $vendor, $items);
$res = $clase->generateLotPDF();
var_dump($res);