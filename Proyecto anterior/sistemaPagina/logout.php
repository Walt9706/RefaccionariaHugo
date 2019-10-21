<?php

include_once 'app/control_secion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Config.inc.php';

controlsecion :: cerrar_secion();
Redireccion :: redirigir(SERVIDOR);
