<div class="form-group">
    <label>Nombre del Producto</label>
    <input type="text" class="form-control" name="nombre" placeholder="Emperador" <?php $validador->mostrar_nombre() ?>>
    <?php 
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>Provedor</label>
    <input type="text" class="form-control" name="provedor" placeholder="Gamesa" <?php $validador->mostrar_provedor() ?>>
    <?php 
    $validador->mostrar_error_provedor();
    ?>
</div>
<div class="form-group">
    <label>Cantidad</label>
    <input type="number" class="form-control" name="cantidad" placeholder="50" <?php $validador->mostrar_cantidad() ?>>
    <?php 
    $validador->mostrar_error_catidad();
    ?>
</div>
<div class="form-group">
    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="15" <?php $validador->mostrar_precio() ?>>
    <?php 
    $validador->mostrar_error_precio();
    ?>
</div>
<div class="form-group">
    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <label>Fecha de Caducidad</label>
    <input type="date" class="form-control" name="fechacaducidad" <?php $validador->mostrar_fecha_caducidad() ?>>
    <?php 
    $validador->mostrar_error_fecha_caducidad();
    ?>
</div>
<div class="form-group">
    <label>Tipo de Producto</label>
    <select name="tipoProducto" class="form-control">
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
<br>
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>
<br>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar datos</button>
