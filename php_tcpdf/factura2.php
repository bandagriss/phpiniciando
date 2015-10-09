<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/examples/tcpdf_include.php');
require_once('tcpdf/examples/barcodes/tcpdf_barcodes_2d_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		
		
		$image_file = K_PATH_IMAGES.'asd.png';
		$this->Image($image_file, 5, -2, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roy');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Primera Factura');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set margins
$pdf->SetMargins(5, PDF_MARGIN_TOP, 9);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B' , 11);
$nit = 7024739019;
$nfac = 001;
$nauto = 1234567890123;
// add a page
$pdf->AddPage();
//cuadro roy
$html = '
<p>
NIT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$nit.' <br>
Nº FACTURA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: '.$nfac.' <br>
Nº AUTORIZACION &nbsp;: '.$nauto.'  <br>
</p>					';

$pdf->writeHTMLCell($w=0, $h=0, $x='133', $y='8', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
// Rounded rectangle
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(130, 5, 75, 22, 2, '1111', null);

///title roy
$pdf->SetFont('times', 'B', 18);
$html2='<h1>FACTURA</h1>';
$pdf->writeHTMLCell($w=0, $h=0, $x='75', $y='18', $html2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//nombre de la empresa roy

$pdf->SetFont('times', 'B', 12);
$datos = '
<p style="line-height: 150% ">
Roy Corp
</p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='35', $datos, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//original scf-1 roy

$pdf->SetFont('times', 'B', 12);
$datos2 = '
<p style="line-height: 150% ">
ORIGINAL  SFC-1
</p>';
$pdf->writeHTMLCell($w=0, $h=0, $x='145', $y='28', $datos2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

//datos de la empresa roy
$sucursal = "Casa Matriz";
$direccion = "Calle de las Rosas Nº 100";
$ciudad = "La Paz - Bolivia";

$pdf->SetFont('times', '', 10);
$datos = '
<p>
'.$sucursal.'<br>
Dirección<br>
'.$direccion.'<br>
'.$ciudad.'<br>
</p>					';

$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='42', $datos, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//actividad económica roy
$actividad = "Venta de Productos";
$pdf->SetFont('times', 'B', 11);
$act = '
<p>
Actividad Económica : '.$actividad.'<br>
</p>';

$pdf->writeHTMLCell($w=0, $h=0, $x='130', $y='35', $act, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//TABLA 1 roy
$pdf->SetFont('times', '', 11);
$fecha = "09 de Octubre de 2015";
$señor = "Cascada";
$nit = 20245475018;
$tbl = <<<EOD
<table cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td><b>Fecha :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fecha <br/><b>Señor(es):</b>&nbsp;&nbsp; $señor  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIT/CI : $nit</b></td>
    </tr>
</table>
EOD;

$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='65', $tbl, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

/////tabla 2 roy

$tbl2 ='
<table border="1" cellpadding="2" cellspacing="0">
<thead>
 <tr>
  <td width="70" align="center"><b>CANTIDAD</b></td>
  <td width="240" align="center"><b>CONCEPTO</b></td>
  <td width="130" align="center"><b>PRECIO UNITARIO</b></td>
  <td width="94" align="center"> <b>SUBTOTAL</b></td>
 </tr>
</thead>

<tr>
  <td width="70" align="center">1</td>
  <td width="240" align="center">100</td>
  <td width="130" align="center">252.00</td>
  <td width="94" align="center"> 252.00</td>
</tr>
<tr>
  <td width="70" align="center">1</td>
  <td width="240" align="center">100</td>
  <td width="130" align="center">252.00</td>
  <td width="94" align="center"> 252.00</td>
</tr>

 
 <tr>
  <td colspan="3" align="rigth"><b>Total Bs.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
  <td width="94" align="center"><b>252.00</b></td>

 </tr>
</table>
<p>Son: DOS CIENTOS CINCUENTA Y DOS 00/100.....BOLIVIANOS.</p>
';

$pdf->writeHTMLCell($w=0, $h=0, $x='10', $y='84', $tbl2, $border=0, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);
//qr roy
$prueba = $pdf->write2DBarcode('7024736019|3|2104002021751|2015-10-02|30.50|30.50|15451254|0|0|0|0', 'QRCODE,L', '175', '', 30, 0, '', 'N');
//final roy
$final = '
<table>
<tr>
	<td align="left"><b>CODIGO DE CONTROL :&nbsp;&nbsp;&nbsp;&nbsp; BF-86-6B-98 </b></td>
	<td>'.$prueba.'</td>
</tr>
<tr>
	<td align="left"><b>Fecha Limite de Emision : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;28/12/2015 </b></td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
	<td width="400" align="center"><b>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</b></td>
</tr>
';
$pdf->writeHTMLCell($w=160, $h=0, $x='10', $y='', $final, $border=1, $ln=1, $fill=0, $reseth=true, $align='left', $autopadding=true);

// set some text to print
//$html = <<<EOD
//<div style="border-radius: 20px;">border-radius: 20px; </div>
//EOD;

// print a block of text using Write()
//$pdf->writeHTMLCell(0, $txt, '', 0, 'C', true, 0, false, false, 0);
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

//--------------------------------
//$stylediv = "border: 5px solid; height: 60px; width: 260px; margin:10px; background-color:yellow;
//font-size: 20px; text-align:center; padding-top: 20px; word-wrap:break-word;border-radius: 20px;";
//$html = '
//<div style="'.$stylediv.'">border-radius: 20px; </div>
//';
//$pdf->writeHTML($html, true, 0, true, 0);



// set the barcode content and type

//qr roy




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
