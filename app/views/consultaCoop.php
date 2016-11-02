<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"> 
    <script>
        $(document).ready(function() {
        $('#consuCoop').DataTable();
    } );
    </script>
</head>
<?php 
    require_once '../model/lib/phpExcel/Classes/PHPExcel/IOFactory.php';
    $objPHPExcel = PHPExcel_IOFactory::load("colpensiones.xlsx");
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    //echo "<br>La hoja ".$worksheetTitle." tiene ";
    //echo $nrColumns . ' columnas (A-' . $highestColumn . ') ';
    //echo ' y ' . $highestRow . ' filas.';
    
    
    echo '<br>Data: <table id="consuCoop" class="display" cellspacing="0" width="100%">'
    .'<thead>
            <tr>
                <th>Num Iden</th>
                <th>Nombre</th>
                <th>Dato 1</th>
                <th>Nit</th>
                <th>Centro de costo</th>
                <th>Apellido 1</th>
                <th>Nombre 1</th>
                <th>Numero Iden</th>
                <th>Tipo Iden</th>
                <th>Dato 2</th>
                <th>Dato 3</th>
                <!--<th>Ciudad</th>-->
            </tr>
        </thead>';
    echo '<tbody>';
    for ($row = 1; $row <= $highestRow; ++ $row) {
    echo '<tr>';
    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
    $cell = $worksheet->getCellByColumnAndRow($col, $row);
    $val = $cell->getValue();
    $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
    echo '<td><font size="2">' . $val . '</font></td>';
    }
    echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}