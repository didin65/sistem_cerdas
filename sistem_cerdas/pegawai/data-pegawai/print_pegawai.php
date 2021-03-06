<?php
require '/';
require_once("/");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('data_pegawai.pdf');
?>