<?php

require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('../CSS/style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHTML('<h1>Estilo personalizado</h1>');
$mpdf->WriteHTML('<table class="blueTable">
<thead>
<tr>
<th>head1</th>
<th>head2</th>
<th>head3</th>
<th>head4</th>
</tr>
</thead>
<tbody>
<tr>
<td>cell1_1</td><td>cell2_1</td><td>cell3_1</td><td>cell4_1</td></tr>
<tr>
<td>cell1_2</td><td>cell2_2</td><td>cell3_2</td><td>cell4_2</td></tr>
<tr>
<td>cell1_3</td><td>cell2_3</td><td>cell3_3</td><td>cell4_3</td></tr>
<tr>
<td>cell1_4</td><td>cell2_4</td><td>cell3_4</td><td>cell4_4</td></tr>
</tbody>
</tr>
</table>');
$mpdf->Output();