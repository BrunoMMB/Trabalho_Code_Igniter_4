<?php
    require_once ROOTPATH . '/vendor/autoload.php';
    header("Content-type:application/pdf");    

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',]);
    
    $html = file_get_contents(base_url().'/public/Principal/index');
    // print_r($html);
    $mpdf->WriteHTML($html);
    $mpdf->Output('doc.pdf',"D");

    // // The PDF source is in original.pdf
    // readfile($pdf);
?>