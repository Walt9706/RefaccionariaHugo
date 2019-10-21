<?php
if (isset($_POST['codigo'])):
    $id_producto = $_POST['codigo'];
endif;
?>
<div class="form-group">
    <label>ID</label>
    <output class="form-control" name="id"><?php echo $id_producto; ?></output>
</div>
<div class="form-group">
    <label >Nombre del Producto</label>
    <input type="text" class="form-control" name="txtnombre"<?php $validador->mostrar_nombre() ?>>
    <?php
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>Provedor</label>
    <input type="text" class="form-control" name="txtprovedor"<?php $validador->mostrar_provedor() ?>>
    <?php
    $validador->mostrar_error_provedor();
    ?>
</div>
<div class="form-group">
    <label>Cantidad</label>
    <input type="number" class="form-control" name="txtcantidad"<?php $validador->mostrar_cantidad() ?>>
    <?php
    $validador->mostrar_error_catidad();
    ?>
</div>
<div class="form-group">
    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <label>Precio</label>
    <input type="number" class="form-control" name="txtprecio" <?php $validador->mostrar_precio() ?>>
    <?php
    $validador->mostrar_error_precio();
    ?>
</div>
<div class="form-group">
    <label>Tipo de Producto</label>
<!--    <input type="text" class="form-control" name="txttipo_producto" <?php $validador->mostrar_tipo_producto() ?>>-->
    <select name="txttipo_producto" class="form-control">
        <option><?php $validador->mostrar_tipo_producto() ?></option>
        <option value="Bebidas">Bebidas</option>
        <option value="Alimentos">Alimentos</option>
        <option value="Dulces">Dulces</option>
        <option value="Electronica">Electronica</option>
        <option value="Ropa">Ropa</option>
    </select>
    <?php
    $validador->mostrar_error_tipo_producto();
    ?>
</div>
<div class="form-group">
    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <label>Fecha de Caducidad</label>
    <input type="date" class="form-control" name="txtfecha_caducidad" <?php $validador->mostrar_fecha_caducidad() ?>>
    <?php
    $validador->mostrar_error_fecha_caducidad();
    ?>
</div>

<br>
<button type="submit" class="btn btn-default btn-primary" name="btn_actualizar">Actualizar</button>
