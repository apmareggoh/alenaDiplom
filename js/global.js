/**
 * Created by אנלאדוההמם on 09.05.2016.
 */

function addProduct(e) {
    var id = $(e).data('id');
    console.log(id);
    $.ajax({
        url: '/addProduct.php',
        data: 'id=' + id + '&cnt=1'
    });
}

function delProduct(e) {
    var id = $(e).data('id');
    console.log(id);
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
});

$(document).on('click', '.delInOrder', function() {
    delProduct(this);
});