<?php

session_start();
$arreglo = $_SESSION['carrito'];

for ($i = 0; $i < count($arreglo); $i++) {
    if ($arreglo[$i]['Id'] != $_POST['Id']) {
        $datosnuevos[] = array(
            'Id' => $arreglo[$i]['Id'],
            'Nombre' => $arreglo[$i]['Nombre'],
            'Precio' => $arreglo[$i]['Precio'],
            'Cantidad' => $arreglo[$i]['Cantidad']
        );
    }
}
if (isset($datosnuevos)) {
    $_SESSION['carrito'] = $datosnuevos;
    $total=0;
    for ($i = 0; $i < count($datosnuevos); $i++) {
        $total = ($datosnuevos[$i]['Precio'] * $datosnuevos[$i]['Cantidad']) + $total;
    }
    echo $total;
} else {
    unset($_SESSION['carrito']);
    echo '0';
}