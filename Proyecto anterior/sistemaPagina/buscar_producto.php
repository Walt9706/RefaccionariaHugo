<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = 'Buscar Producto';

include_once 'plantillas/documento-apertura.inc.php';
include_once 'plantillas/barra-navegacion-empleado.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">

        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Busqueda de productos
                    </h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Que deseas Buscar?" required="">
                        </div>
                        <p>
                            <a href="<?php echo RUTA_PAGINA_EMPLEADO ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Cancelar
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> Lista de productos
                </div>
                <div id="datos" class="panel-body text-center">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>