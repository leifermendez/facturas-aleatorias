<?php

namespace leifermendez\facturas;

use Dompdf\Dompdf;

class RandomPDF
{
    private $pdf;

    public function __construct()
    {

    }

    public function generatePDF($data = array())
    {
        try {
            $template = '01';
            $dompdf = new Dompdf();
            $time = time();
            ob_start();
            $data = [
                'company_header' => 'Tecni-Servicios Leifer',
                'company_rif' => 'V-20625405-6',
                'company_number_invoice' => '00011111',
                'company_name' => 'Tecni-Servicios Leifer',
                'company_address' => 'San Cristobál',
                'company_phone' => '44444444',
                'customer_name' => 'Leifer M',
                'customer_rif' => '1111',
                'customer_address' => 'madrid maria jauna',
                'customer_email' => 'ddd@dff.com',
                'customer_date' => '10/04/2019',
            ];
            include __DIR__ . '/template/'.$template.'.php';
            $content = ob_get_clean();
            $dompdf->loadHtml($content);

            $dompdf->setPaper('A4');

// Render the HTML as PDF
            $dompdf->render();

// Output the generated PDF to Browser

            $output = $dompdf->output();
            file_put_contents(__DIR__ . '/../salidas/dom_' . $time . '.pdf', $output);


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}