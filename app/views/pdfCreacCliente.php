<?php
//session_start();
require('recursos/fpdf/fpdf.php');
require '../controller/mvc.controller.php'; 

try{
if(strlen($_GET['vartipoid'])>0 and strlen($_GET['identifica'])>0){
	$tipoIdent  = $_GET['vartipoid'];
	$identifica = $_GET['identifica'];
}
    
    
$mvc = new mvc_controller();
$select = $mvc->getClientes($tipoIdent, $identifica, '');

$tipoIdNombre = '';
$nombres = '';
$apellidos = '';
$claveInicial = '';

if( $select != ''){
    foreach( $select as $fila ){
        $tipoIdNombre = $fila['TipoIdentificacion'];
        $nombres      = $fila['nombres'];
        $apellidos    = $fila['apellidos'];
        $claveInicial = $fila['identificacion'];
    }
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('imagenes/arkLogin.jpg' , 10 ,8, 50 , 30,'JPG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, date('d-m-Y').'', 0);

$pdf->Ln(40);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(100, 5, utf8_decode("Señor(a)"), 0);

$pdf->Ln();
$pdf->Cell(100, 5, $nombres . ' ' . $apellidos, 0);

$pdf->Ln();
$pdf->Cell(100, 5, 'Ciudad', 0);

$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(15, 8, 'REF: Bienvenido a ARK ACTIVOS SEGUROS ', 0);

$pdf->Ln(15);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(15, 8, 'Respetado ' . utf8_decode('Señor(a):'), 0);

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 5, 'Reciba un cordial saludo por parte de nuestra empresa ARK ACTIVOS SEGUROS SAS, '
                . 'quien agradece su confianza al solicitar el servicio de Administración de Activos;' 
                . 'por lo cual queremos informarle que la operación que realizó se encuentra a su '
                . 'disposición para ser consultada en nuestra página web www.arkactivos.com.');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(15, 8, 'Para acceder a la informacion debe realizar los siguientes pasos:', 0);

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(15, 8, '1. Ingrese a www.arkactivos.com',0);
$pdf->Ln();
$pdf->Cell(15, 8, '2. Ingrese al botón "PORTAL ARK" en el menú principal.', 0);
$pdf->Ln();
$pdf->MultiCell(0, 5, '3. Y donde dice: "Bienvenido, Ingrese sus credenciales" por favor colocar su usuario '
                       . 'y clave asignado que se enuentra al final de esta carta.');
$pdf->Ln();
$pdf->MultiCell(0, 5, '4. Si desea modificar su clave, lo puede realizar en la parte superior de la página,'
                        . 'donde encontrará el link CAMBIAR SU CLAVE.');
$pdf->Ln();
$pdf->MultiCell(0, 5, '5. Al ingresar con su usuario y clave aparecerá el titulo CLIENTES, donde se'
                        . 'encontrará la información personal.');
$pdf->Ln();
$pdf->MultiCell(0, 5, '6. En la parte derecha encontrará un menú donde puede consultar las libranzas y '
                        . 'las novedades de la operación.');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(15, 8, 'Su usuario y clave asignado son los siguientes:', 0);

$pdf->SetFont('Arial', '', 11);
$pdf->Ln(10);
$pdf->Cell(15, 8, '     Usuario: ' . $identifica, 0);
$pdf->Ln();
$pdf->Cell(15, 8, '     Clave   : ' . $identifica, 0);


$pdf->Ln(15);
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 5,  utf8_decode('Esperamos que esta información sea de gran utilidad. Agradecemos su amable '
                . 'atención y cualquier duda con gusto será atendida.'));

$pdf->Ln(15);
$pdf->Cell(15, 8, ' Cordialmente', 0);

$pdf->Ln(10);
$pdf->Cell(15, 5, ' JEAN PAUL BELTRAN', 0);
$pdf->Ln();
$pdf->Cell(15, 5, ' Presidente', 0);
$pdf->Ln();
$pdf->Cell(15, 5, ' ARK ACTIVOS SEGUROS SAS', 0);



$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

$pdf->Output($identifica .'.pdf','I');

}catch(Exception $ex){
    echo $ex->getMessage();
    
}
