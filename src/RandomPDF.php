<?php

namespace leifermendez\facturas;

use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;

class RandomPDF
{
    private $global_price = 0;
    private $invoice_amount = 1;
    private $invoice_start_date;
    private $invoice_end_date;
    private $vendor = array();
    private $customer = array();
    private $template = array();
    private $items = array();

    public function __construct($options = array())
    {
        try {

            $this->invoice_start_date = new DateTime($options['invoice_start_date']);
            $this->invoice_end_date = new DateTime($options['invoice_end_date']);
            $this->global_price = floatval($options['global_price']);
            $this->invoice_amount = intval($options['invoice_amount']);

            $this->customer = [
                [
                    'customer_name' => 'Leanga Software S.L',
                    'customer_rif' => 'CIF B-87549440',
                    'customer_phone' => '0034695123840',
                    'customer_address' => 'Calle de Otero y Delage, 57. Madrid 28035',
                    'customer_email' => 'contacto@leangasoftware.es'
                ]
            ];

            $this->vendor = [
                [
                    'company_header' => 'Víctor Leandro Contreras Méndez',
                    'company_init' => 'V.L',
                    'company_rif' => 'V-15927235-0',
                    'company_name' => 'Víctor Leandro Contreras Méndez',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 5 con Carrera 3 barrio <br> Centro a 20 mts. De Ipostel'
                ],
                [
                    'company_header' => 'JORGE IVAN GARZON LABRADOR ',
                    'company_init' => 'J.G',
                    'company_rif' => 'V138915219',
                    'company_name' => 'JORGE IVAN GARZON LABRADOR ',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 5 con Carrera 3 barrio <br> Centro a 20 mts. De Ipostel'
                ],
                [
                    'company_header' => 'CRISTHIAN JAVIER GARCIA VIVAS',
                    'company_init' => 'C.G',
                    'company_rif' => 'V139732495',
                    'company_name' => 'CRISTHIAN JAVIER GARCIA VIVAS',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 1, entre carrera 7 y 8, N 2<br> antigua medicina sistémica'
                ],
                [
                    'company_header' => 'LUIS EDUARDO RINCON ARAQUE ',
                    'company_init' => 'L.R',
                    'company_rif' => 'V056613087',
                    'company_name' => 'LUIS EDUARDO RINCON ARAQUE ',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 1, entre carrera 7 y 8, N 2<br> antigua medicina sistémica'
                ],
                [
                    'company_header' => 'WILMER JUNIOR LUGO HERNANDEZ',
                    'company_init' => 'W.H',
                    'company_rif' => 'V203683231',
                    'company_name' => 'WILMER JUNIOR LUGO HERNANDEZ ',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 1, entre carrera 7 y 8, N 2<br> antigua medicina sistémica'
                ],
                [
                    'company_header' => 'CARLOS EDUARDO VALENCIA MORA',
                    'company_init' => 'C.V',
                    'company_rif' => 'V104082439',
                    'company_name' => 'CARLOS EDUARDO VALENCIA MORA',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 1, entre carrera 7 y 8, N 2<br> antigua medicina sistémica'
                ],
                [
                    'company_header' => 'MARIA ELENA PASSINI OLIVIERI ',
                    'company_init' => 'M.P',
                    'company_rif' => 'V030763692',
                    'company_name' => 'MARIA ELENA PASSINI OLIVIERI ',
                    'company_phone' => '0424-7494491',
                    'company_address' => 'Calle 1, entre carrera 7 y 8, N 2<br> antigua medicina sistémica'
                ]
            ];

            $this->items = [
                [
                    'title' => 'Modulo, Reporte de usuarios con referidos, se incluye filtro y opcion de bloqueo ZIIM',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Estructuracion de servidors, y grupo de auto-escalado en AWS ZIIM.',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Modulo, Auto envio de virtual-cards en productos del market. ZIIM.',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Actualización de plataforma ZIIM',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Mantenimiento y Repaldo de plataforma ZIIM',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Modulo de ZiimCoins.',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0,
                ],
                [
                    'title' => 'Sistema preventivo de fallos en plataforma ziim',
                    'price' => 0,
                    'qty' => 1,
                    'tax' => 0
                ]
            ];

            $this->items = $this->randomTotal($this->items, $this->global_price);

            $this->template = [
                '01', '02', '03', '04', '05', '06'
            ];

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    private function randomTotal($items = array(), $total = 500)
    {
        $numbers = [];
        $num_numbers = count($items);
        var_dump($num_numbers);

        $loose_pcc = $total / $num_numbers;

        for ($i = 0; $i < $num_numbers; $i++) {
            // Random number +/- 10%
            $ten_pcc = $loose_pcc * 0.1;
            $rand_num = mt_rand(($loose_pcc - $ten_pcc), ($loose_pcc + $ten_pcc));

            $numbers[] = $rand_num;
            $items[$i]['price'] = number_format($rand_num, 2, '.', ',');
            $items[$i]['price_total'] = number_format(
                ($rand_num * $items[$i]['qty']), 2, '.', ',');
        }

        // $numbers now contains 1 less number than it should do, sum
        // all the numbers and use the difference as final number.
        /* $numbers_total = array_sum($numbers);

         $numbers[] = $total - $numbers_total;*/

        return $items;
    }

    private function numberInvoice($digits = 3)
    {
        try {
            $num = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $invoice = str_pad($num, 6, '0', STR_PAD_LEFT);
            return $invoice;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function randomDateInRange(DateTime $start, DateTime $end)
    {
        try {
            $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
            $randomDate = new DateTime();
            $randomDate->setTimestamp($randomTimestamp);
            return $randomDate->format('d/m/Y');
        } catch (\Exception $e) {
            var_dump($e);
            return $e->getMessage();
        }
    }

    public function generatePDF($data = array())
    {
        try {
            $num = $data['num'];
            $template = $this->template[$data['template']];
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);
            $data['vendor']['date'] = $this->randomDateInRange(
                $this->invoice_start_date,
                $this->invoice_end_date
            );
            $time = time();
            ob_start();
            $data['vendor']['invoice_number'] = $this->numberInvoice(4);
            //$data = $data['vendor'];
            include __DIR__ . '/template/' . $template . '.php';
            $content = ob_get_clean();
            $dompdf->loadHtml($content);

            $dompdf->setPaper('A4');

// Render the HTML as PDF
            $dompdf->render();

// Output the generated PDF to Browser

            $output = $dompdf->output();
            file_put_contents(__DIR__ . '/../salidas/invoice_' . $num . '_' . $time . '.pdf', $output);


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateLotPDF($data = array())
    {
        try {
            $templates = $this->template;
            $vendor = $this->vendor;
            $customer = $this->customer;
            $amount = $this->invoice_amount;

            for ($i = 0; $i < $amount; $i++) {

                $template_index = array_rand($templates, 1);
                $vendor_index = array_rand($vendor, 1);
                $customer_index = array_rand($customer, 1);



                $this->generatePDF([
                    'template' => (array_key_exists($i, $templates)) ? $i : $template_index,
                    'vendor' => (array_key_exists($i, $vendor)) ? $this->vendor[$i] : $this->vendor[$vendor_index],
                    'customer' => (array_key_exists($i, $customer)) ? $this->customer[$i] : $this->customer[$customer_index],
                    'num' => $i,
                    'item' => $this->items[$i]
                ]);


            }


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}