<?php

// Include autoloader
require_once '../dompdf/autoload.inc.php';
 
// Reference the Dompdf namespace
use Dompdf\Dompdf;
 
if (isset($_GET['presentationId'])) {
    // Instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->set_option('enable_remote', true);

    $dompdf->set_option('enable_css_float', true);
    $dompdf->set_option('enable_html5_parser', true);

    $url = $_SERVER['HTTP_REFERER'];

    // Load content from html file
    // $html = file_get_contents($url);
    $dompdf->load_html_file($url);

    // Render the HTML as PDF
    $dompdf->render();
 
    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("presentation", array("Attachment" => 0));
}
