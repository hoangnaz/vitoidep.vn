// JavaScript Document
function deleta_product_cart(id_pro) {

    var kq = confirm("Bạn thực sự muốn xóa sản phẩm này?");
    if (kq == true) {
        $.ajax({
            url: "ad_manipulation/car_delete_one.php",
            type: "post",
            dataType: "text",
            data: {

                id: id_pro
            },
            success: function(result) {

                $("#aaa").html(result);

            }
        });
        window.location = "sub_import_bill.php";
    }
}
// JavaScript Document