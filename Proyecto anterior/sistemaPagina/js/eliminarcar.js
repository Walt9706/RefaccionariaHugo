$(document).on('click', '.eliminar', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    console.log(id);
    $(this).parentsUntil('.tablaproducto').remove();
    
    $.post('./js/eliminar.php', {
        Id: id
    }, function (a) {
        if (a == '0') {
            location.href = "./carrito.php";
        }else{
            $("#total").text('Total: $' + a);
        }
    });
})


