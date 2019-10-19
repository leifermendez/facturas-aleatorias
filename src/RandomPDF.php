<?php

/**
 * Classes for generate fake invoices random.
 * Author: Leifer M
 * email: leifer33@gmail.com
 */

namespace leifermendez\facturas;

use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use Faker\Factory;

class RandomPDF
{
    private $global_price = 0;
    private $invoice_amount = 1;
    private $invoice_tax = 0;
    private $invoice_start_date;
    private $invoice_end_date;
    private $vendor = array();
    private $customer = array();
    private $template = array();
    private $items = array();
    private $faker;

    public function __construct($options = array(), $customer = array(), $vendor = array(), $items = array())
    {
        try {
            $this->faker = Factory::create();
            $this->invoice_start_date = new DateTime($options['invoice_start_date']);
            $this->invoice_end_date = new DateTime($options['invoice_end_date']);
            $this->global_price = floatval($options['global_price']);
            $this->invoice_amount = intval($options['invoice_amount']);
            $this->invoice_tax = intval($options['tax']);

            $this->customer = (count($customer)) ? $customer : [
                [
                    'customer_name' => $this->faker->company,
                    'customer_rif' => $this->faker->ean8,
                    'customer_phone' => $this->faker->phoneNumber,
                    'customer_address' => $this->faker->address,
                    'customer_email' => $this->faker->email
                ]
            ];

            $this->vendor = (count($vendor)) ? $vendor : [
                [
                    'company_header' => $this->faker->name,
                    'company_init' => $this->faker->randomLetter,
                    'company_rif' => $this->faker->ean8,
                    'company_name' => $this->faker->name,
                    'company_phone' => $this->faker->phoneNumber,
                    'company_address' => $this->faker->address
                ]
            ];

            $this->items = (count($items)) ? $items : [
                [
                    'title' => $this->faker->sentence,
                    'price' => 100,
                    'qty' => 1,
                    'tax' => 0,
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

    private function generatePDF($data = array())
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
            $dompdf->render();

            $output = $dompdf->output();
            file_put_contents(__DIR__ . '/../salidas/invoice_' . $num . '_' . $time . '.pdf', $output);


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateLotPDF()
    {
        try {
            $templates = $this->template;
            $vendor = $this->vendor;
            $customer = $this->customer;
           // $items = $this->items;
            $amount = $this->invoice_amount;

            for ($i = 0; $i < $amount; $i++) {

                $template_index = array_rand($templates, 1);
                $vendor_index = array_rand($vendor, 1);
                $customer_index = array_rand($customer, 1);
                //$items_index = array_rand($items, 1);


                $this->generatePDF([
                    'template' => (array_key_exists($i, $templates)) ? $i : $template_index,
                    'vendor' => (array_key_exists($i, $vendor)) ? $this->vendor[$i] : $this->vendor[$vendor_index],
                    'customer' => (array_key_exists($i, $customer)) ? $this->customer[$i] : $this->customer[$customer_index],
                    'num' => $i,
                    'item' => $this->items
                ]);


            }


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}