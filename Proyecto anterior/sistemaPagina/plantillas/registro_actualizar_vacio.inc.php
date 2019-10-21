
<?php
if (isset($_GET['id'])):
    $id_producto = $_GET['id'];
    Conexion::abrir_conexion();
    $total_productos = RepositorioProducto::obtener_usuarios_id(Conexion::obtener_conexion(), $id_producto);
    Conexion::cerrar_conexion();
    foreach ($total_productos as $item):
        ?>
        <div class="form-group">
            <label>ID</label>
            <output class="form-control" name="id"><?php echo $id_producto; ?></output>
        </div>
        <div class="form-group">
            <label>Nombre del Producto</label>
            <input type="text" class="form-control" name="txtnombre" value="<?php echo $item['nombre'] ?>">
        </div>
        <div class="form-group">
            <label>Provedor</label>
            <input type="text" class="form-control" name="txtprovedor" value="<?php echo $item['provedor'] ?>">
        </div>
        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" class="form-control" name="txtcantidad" value="<?php echo $item['cantidad'] ?>">
        </div>
        <div class="form-group">
            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <label>Precio</label>
            <input type="number" class="form-control" name="txtprecio" value="<?php echo $item['precio'] ?>">
        </div>
        <div class="form-group">
            <label>Tipo de Producto</label>
            <select name="txttipo_producto" class="form-control">
                <option><?php echo $item['tipo_producto'] ?></option>
                <option value="Bebidas">Bebidas</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Dulces">Dulces</option>
                <option value="Electronica">Electronica</option>
                <option value="Ropa">Ropa</option>
            </select>
        </div>
        <div class="form-group">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <label>Fecha de Caducidad</label>
            <input type="date" class="form-control" name="txtfecha_caducidad" value="<?php echo $item['fecha_caducidad'] ?>">
        </div>

        <br>
        <button type="submit" class="btn btn-default btn-primary" name="btn_actualizar">Actualizar</button>
        <?php
    endforeach;
endif;
?>