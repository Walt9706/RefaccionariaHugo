
$(document).on('keyup', '.catidad', function (e) {
    var cantidad = $(this).val();
    console.log(cantidad);
    if (cantidad != 0) {
        if (e.keyCode == 13) {
            var id = $(this).attr('data-id');
            var precio = $(this).attr('data-precio');
            $(this).parentsUntil('.tablaproducto').find('.subtotal').text('$' + (precio * cantidad));
            $.post('./js/modificarDatos.php', {
                Id: id,
                Precio: precio,
                Cantidad: cantidad
            }, function (e) {
                $("#total").text('Total: $' + e);
            });
        }
    } else {
        if (e.keyCode == 13) {
            var id = $(this).attr('data-id');
            console.log(id);
            $(this).parentsUntil('.tablaproducto').remove();

            $.post('./js/eliminar.php', {
                Id: id
            }, function (a) {
                if (a == '0') {
                    location.href = "./carrito.php";
                } else {
                    $("#total").text('Total: $' + a);
                }
            });
        }
    }

});
