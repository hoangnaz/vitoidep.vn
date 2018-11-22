function show_detail(id_product) {
    $("#modal_id_product").val(id_product);
    $.ajax({
        url: 'function/popup_product.php',
        type: 'GET',
        dataType: 'html',
        data: {
            id_product: id_product
        }
    }).done(function(ketqua) {
        $("#info_product_popup").html(ketqua);
    });
}