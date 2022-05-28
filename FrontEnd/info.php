
<?php



require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hola mundo</h1>');
$mpdf->WriteHTML('<p>Soy un archivo PDF</p>');

var_dump($mpdf);

?>