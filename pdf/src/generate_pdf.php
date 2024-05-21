<?php

use Dompdf\Dompdf;

require_once __DIR__ . '/../vendor/autoload.php';

$dompdf = new Dompdf();
$html = '<h1>Halo, dunia!</h1>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output();
file_put_contents('output.pdf', $output);
?>
