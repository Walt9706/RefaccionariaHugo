<div class="form-group">
    <label>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nombre de Usuario
    </label>
    <input type="text" class="form-control" name="nombre" placeholder="Novato" <?php $validador->mostrar_nombre() ?>>
    <?php 
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>
        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email
    </label>
    <input type="email" class="form-control" name="email" placeholder="ejemplo_1@ejemplo.com" <?php $validador->mostrar_email() ?>>
    <?php 
    $validador->mostrar_error_email();
    ?>
</div>
<div class="form-group">
    <label>Contaseña</label>
    <input type="password" class="form-control" name="clave1">
    <?php 
    $validador->mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label>Repetir la contraseña</label>
    <input type="password" class="form-control" name="clave2">
    <?php 
    $validador->mostrar_error_clave2();
    ?>
</div>
<br>
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>
<br>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar datos</button>