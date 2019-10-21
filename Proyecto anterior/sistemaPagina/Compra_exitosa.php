<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioProducto.inc.php';

$titulo = 'Compra exitosa';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion.inc.php';

$arreglo = $_SESSION['carrito'];
$total = 0;
$tabla = '<div class="panel-body text-center">
    <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th style="text-align: center">Nombre</th>
                    <th style="text-align: center">Precio</th>
                    <th style="text-align: center">Cantidad</th>
                    <th style="text-align: center">Subtotal</th>
                </tr> 
            </thead>';
for ($i = 0;$i<count($arreglo); $i++) {
    $tabla .= '<tbody>
        <tr>
            <td>' . $arreglo[$i]['Nombre'] . '</td>
            <td>$' . $arreglo[$i]['Precio'] . '</td>    
            <td>' . $arreglo[$i]['Cantidad'] . '</td>
            <td>$' . $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] . '</td>
            </tr>';
    $total = $total + ($arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']);
}
$tabla .= '</tbody>
        </table> 
        </div>';
//echo $tabla;
$nombre_usuario=$_SESSION['nombre_usuario'];
date_default_timezone_set("America/Mexico_City");
$fecha=date("d-m-Y");
$hora=date("H:i:s");
$asunto="Compra en CarlosGG";
$desde="www.CarlosGG.com";
$correo=$_SESSION['email_usuario'];
$comentario='<div style="
                border:1px solid #d6d2d2;
                borde-radius:5px;
                padding:10px;
                width:800px;
                heigth:300px;
            ">
            <h1>Muchas gracias por comprar en CarlosGG</h1>
            <p>Hola '.$nombre_usuario.' muchas gracias por comprar con nosotros en este correo te mandamos los detalles de tu compra </p><br>
            <p> Fecha de la compra: '.$fecha.' </p><br>
            <p> Hora de la compra: '.$hora.' </p><br>
            <p>Lista de Articulos</p>
            <p> 
            '.$tabla.'
            </p><br>
            <p>Total a pagar es: $'.$total.' MXN.</p>
            </div>
            ';
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf8\r\n";
$headers.="From: Remitente\r\n";
mail($correo,$asunto,$comentario,$headers);
unset($_SESSION['carrito']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Compra Exitosa
                </div>
                <div class="panel-body text-center">
                    <p>Gracias por Comprar con nosotros, Sigue viendo nuestro catalogo de productos</p>
                    <br>
                    <p><a href="<?php echo SERVIDOR ?>" 
                          class="btn btn-default btn-primary"> Regresa al catalogo </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>