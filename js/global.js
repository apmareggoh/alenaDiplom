/**
 * Created by армагеддон on 09.05.2016.
 */

function addProduct(e) {
    var id = $(e).data('id');
    $.ajax({
        url: '/addProduct.php',
        data: 'id=' + id + '&cnt=' + $('#count_' + id).val()
    });
}

function delProduct(e) {
    var id = $(e).data('id');
    $.ajax({
        url: '/delProduct.php',
        data: 'id=' + id,
        success: function() {
            $(e).parents('.basic-other-products-item').remove();
        }
    });
}

$(document).on('click', '.addInOrder', function() {
    addProduct(this);
    $(this).html('Товар добавлен').removeClass('addInOrder');
});

$(document).on('click', '.delInOrder', function() {
    delProduct(this);
});