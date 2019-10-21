<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="imag/mostacho.ico" rel="icon">
        
        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo='Y el titulo?';
        }
        echo "<title>$titulo</title>";
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=divice-width, initial-scale=1">
        <link href="Css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="Css/estilos_pag.css"/>
    </head>
    <body>