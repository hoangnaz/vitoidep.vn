function suscribleNow() {

    var subEmail = $("input#subEmail").val();
    $('#error-mail-sub').html("")
    if (subEmail == "") {
        $('#error-mail-sub').html("Vui lòng nhập địa chỉ email của bạn!");
        $("input#subEmail").focus();
        return false;
    }
    if (!isEmail(subEmail)) {
        $('#error-mail-sub').html("Vui lòng nhập đúng định dạng email!");
        $("input#subEmail").focus();
        return false;
    }
    swal({
        text: "Chúc mừng  bạn đã đăng ký thành công.",
        icon: "success"
    });
    $("input#subEmail").val("");
}

function sendContact() {

    var ctName = $("input#ctname").val();
    var ctEmail = $("input#ctemail").val();
    var ctSubject = $("input#ctsubject").val();
    var ctMessage = $("#ctmessage").val();
    $('#mail-fail').html("")
    $('#content-error').html("")
    if (ctEmail == "") {
        $('#mail-fail').html("Vui lòng nhập địa chỉ email của bạn!");
        $("input#ctemail").focus();
        return false;
    }
    if (!isEmail(ctEmail)) {
        $('#mail-fail').html("Vui lòng nhập đúng định dạng email!");
        $("input#ctemail").focus();
        return false;
    }
    if (ctEmail.length >= 100) {
        $('#mail-fail').html("Email có độ dài tối đa là 100 ký tự!");
        $("input#ctemail").focus();
        return false;
    }
    if (ctMessage == "") {
        $('#content-error').html("Vui lòng nhập nội tên phản hồi!");
        $("input#ctmessage").focus();
        return false;
    }
    swal({
        text: "Cảm ơn bạn đã gửi thông tin phản hồi.",
        icon: "success"
    });
    $("input#ctname").val("");
    $("input#ctemail").val("");
    $("input#ctsubject").val("");
    $("#ctmessage").val("");


}

function topFunction() {
    $('html, body').animate({
        scrollTop: $("#body").offset().top
    }, 1000);
}

function topPageHeaderFunction() {
    $('html, body').animate({
        scrollTop: $(".page-header").offset().top
    }, 1000);
}

function search() {
    $(function() {
        $("#skill_input").autocomplete({
            source: "search.php",
            select: function(event, ui) {
                $(this).val(ui.item.value);
                $('.search_product').submit();
            }
        });
    });
}

function confirm_info_order() {

    var orderFullName = $("input#full_name_confirm_order").val();
    var orderAddress = $("input#user_address_order").val();
    var orderPhone = $("input#phone_order").val();
    var orderEmail = $("input#email_order").val();
    var orderDelivery = $("input[name='delivery_method']:checked").val();
    $('#message-error-fullname').html("")
    $('#message-error-address').html("")
    $('#message-error-phone-order').html("")
    $('#message-error-email_order').html("")


    if (orderFullName.length > 50) {
        $('#message-error-fullname').html("Họ tên có độ dài tối đa là 50 ký tự");
        $("input#full_name_confirm_order").focus();
        return false;
    }
    if (orderFullName == "") {
        $('#message-error-fullname').html("Vui lòng nhập họ tên");
        $("input#full_name_confirm_order").focus();
        return false;
    }


    if (orderAddress.length > 500) {
        $('#message-error-address').html("Địa chỉ tối đa là 500 ký tự");
        $("input#user_address_order").focus();
        return false;
    }
    if (orderAddress.length == 0) {
        $('#message-error-address').html("Vui lòng nhập địa chỉ");
        $("input#user_address_order").focus();
        return false;
    }
    if (orderPhone.length > 10) {
        $('#message-error-phone-order').html("Số điện thoại có độ dài tối đa là 10 ký tự");
        $("input#phone_order").focus();
        return false;
    }
    if (orderPhone == "") {
        $('#message-error-phone-order').html("Vui lòng nhập số điện thoại");
        $("input#phone_order").focus();
        return false;
    }

    if (orderEmail == "" || !isEmail(orderEmail)) {
        $('#message-error-email_order').html("Bạn chưa nhập email hoặc email không đúng định dạng");
        $("input#email_order").focus();
        return false;
    }
    if (orderPhone.length == "") {
        $('#message-error-phone-order').html("Vui lòng bổ sung ít nhất số điện thoại");
        $("input#phone_order").focus();
        return false;
    }
    $('#popup_order_name').html(orderFullName);
    $('#popup_order_address').html(orderAddress);
    $('#popup_order_email').html(orderEmail);
    $('#popup_order_phone').html(orderPhone);
    $('#popup_order_delivery').html(orderDelivery);
    $('#btn_confirm_all').modal('show');
    $('#confirm_complete_order').click(function() {

        $.ajax({
            url: 'function/complete_order.php',
            type: 'POST',
            dataType: 'html',
            data: {
                txtFullName: $("input#full_name_confirm_order").val(),
                txtPhone: $("input#phone_order").val(),
                txtEmail: $("input#email_order").val(),
                txtAdress: $("input#user_address_order").val(),
                txtDelivery: $("input[name='delivery_method']:checked").val()
            }
        }).done(function(ketqua) {

            if (ketqua == 200) {
                $('#btn_confirm_all').modal('hide');
                swal({
                    text: "Chúc mừng bạn đã đặt hàng thành công. Chúng tôi sẽ sớm liên hệ để chuyển hàng cho bạn.",
                    icon: "success"
                }).then(() => {
                    window.location = "index";
                });

            } else {

                $('#btn_confirm_all').modal('hide');
                swal({
                    text: "Rất tiếc quá trình xử lý đơn hàng thất bại. Bạn vui lòng thử lại.",
                    icon: "error"
                }).then(() => {
                    window.location = "index.php";
                });
            }
        });
    });



}


// JavaScript Document
function delete_product_cart(id_pro) {


    swal({
            text: "Bạn thực sự muốn xóa sản phẩm này?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "function/delete_product_in_cart.php",
                    type: "get",
                    dataType: "text",
                    data: {

                        id: id_pro
                    },
                    success: function(result) {


                        window.location = result;
                    }
                });
            }
        });

}


function shopping_cart(id_product, modal, number) {

    $.ajax({
        url: "function/cart_store.php",
        type: "get",
        dataType: "JSON",
        data: {

            id_product: id_product,
            number: number
        },
        success: function(response) {
          
           
           var arrayProduct = Object.values(response.data);
           console.log( $arrayProduct);
            if (response.result != 200) {
                swal({
                    title: "Rất tiếc!",
                    text: response.alert,
                    icon: "warning",
                    dangerMode: true,
                })
            } else {
                if (modal == 0) {
                    swal({
                        title: "Thành công!",
                        text: 'Bạn đã thêm thành công sản phẩm vào giỏ hàng',
                        icon: "success"
                    })
                    $(".number_cart").hide();
                    $("#shopping_cart").hide();
                    $("#ajax_shopping_cart").append("<p>123</p>");
                    var len = arrayProduct.length;
                        for(var i=0; i<len; i++){
                            var id_product = arrayProduct[i].id_product;
                            var name_product_no_vietnamse = arrayProduct[i].name_product_no_vietnamse;
                            var product_name = arrayProduct[i].product_name;
                            var point_promotion = arrayProduct[i].point_promotion;
                            var price_product = arrayProduct[i].price_product;
                            var image_product = arrayProduct[i].image_product;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i+1) + "</td>" +
                                "<td align='center'>" + username + "</td>" +
                                "<td align='center'>" + name + "</td>" +
                                "<td align='center'>" + email + "</td>" +
                                "</tr>";

                            $("#userTable tbody").append(tr_str);
                        }
                } else {

                    swal({
                        title: "Thành công!",
                        text: 'Bạn đã thêm thành công sản phẩm vào giỏ hàng',
                        icon: "success"
                    })
                    $('#product-modal').on('hidden.bs.modal', function() {
                        $("#test").append(response.alert);
                    });
                }

            }

        }
    });


}

function buy_now(id_product) {

    $.ajax({
        url: "function/cart_store.php",
        type: "get",
        dataType: "text",
        data: {

            id_product: id_product,
            number: 1
        },
        success: function(result) {

            topFunction();
            setTimeout(function() {
                window.location = 'shopping_cart.php'
            }, 1200);
        }
    });


}

function getresult(url, catalog, numberRecord, order) {

    $.ajax({
        url: url,
        type: "GET",
        data: { rowcount: $("#rowcount").val(), kubun: catalog, order: order, numberRecord: numberRecord },
        beforeSend: function() { $("#overlay").show(); },
        success: function(data) {
            $("#pagination-result").html(data);
            setInterval(function() { $("#overlay").hide(); }, 500);
        },
        error: function() {}
    });
    topPageHeaderFunction();

}

function updateDelivery(id_customer) {
    var rgAddress = $.trim($("#txt_up_address").val());
    $.ajax({
        url: 'function/update_address_deliver.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id_customer: id_customer,
            txtAdress: rgAddress
        }
    }).done(function(ketqua) {

        if (ketqua == 200) {
            $("#btn_update_delivery").hide();
            message = 'Bạn đã cập nhật thành công thông tin';
            $('#message-update').html(message);

            setTimeout(function() {
                window.location.href = 'shopping_cart.php';
            }, 3000);
        } else {
            message = 'Quá trình cập nhật thông tin thất bại. Vui lòng thử lại';
            $('#message-update').html(message);
        }

    });
}

function updateInfo(id_customer) {
    var rgPhone = $("input#rg_phone_number").val();
    var rgSex = $("input[name='rg_sex']:checked").val();
    var rgDate = $("input#rg_date").val();
    var rgAddress = $.trim($("#rg_address").val());
    var rgSocialAccount = $("input#rg_social_account").val();
    $('#message-update').html("")
    $('#message-error-phone').html("")
    $('#message-error-social').html("")
    $('#message-error-date').html("")
    $('#message-error-address').html("")


    if (rgPhone.length == "") {
        $('#message-error-phone').html("Vui lòng bổ sung ít nhất số điện thoại");
        $("input#rg_phone_number").focus();
        return false;
    }

    if (rgPhone.length > 10) {
        $('#message-error-phone').html("Số điện thoại có độ dài tối đa là 10 ký tự");
        $("input#rg_phone_number").focus();
        return false;
    }

    if (rgAddress.length > 500) {
        $('#message-error-address').html("Địa chỉ tối đa là 500 ký tự");
        $("input#rg_address").focus();
        return false;
    }
    $.ajax({
        url: 'function/update_info.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id_customer: id_customer,
            txtPhone: rgPhone,
            txtAdress: rgAddress,
            txtSex: rgSex,
            txtSocialAccount: rgSocialAccount,
            txtDOB: rgDate
        }
    }).done(function(ketqua) {

        if (ketqua == 400) {
            message = 'Quá trình cập nhật thông tin thất bại. Vui lòng thử lại';
            $('#message-update').html(message);
        } else {
            $("#button-update").hide();
            message = 'Bạn đã cập nhật thành công thông tin';
            $('#message-update').html(message);

            setTimeout(function() {
                window.location.href = 'user_info.php';
            }, 3000);
        }

    });
}

function login() {
    var user = $("input#email").val();
    var kq;
    var pass = $("input#password").val();
    if (user == "") {
        $('#messageLogin').html("Bạn chưa nhập tài khoản/ email");
        $("input#email").focus();
        return false;
    }

    if (user.indexOf("@") != -1) {
        if (!isEmail(user)) {
            $('#messageLogin').html("Vui lòng nhập đúng định dạng email");
            $("input#email").focus();
            return false;
        }
    }

    if (pass == "") {
        $('#messageLogin').html("Vui lòng nhập mật khẩu");
        $("input#password").focus();
        return false;
    }
    $.ajax({
        url: 'function/login.php',
        type: 'POST',
        async: false,
        cache: false,
        dataType: 'html',
        data: {
            txtEmail: $("input#email").val(),
            txtPassword: $("input#password").val()
        }
    }).done(function(ketqua) {
       
        kq = ketqua;
    });
    
    if (kq == 2) {
        message = "Thông tin đăng nhập chưa chính xác";
        $('#messageLogin').html(message);
        return false;
    } else {
        window.location.href = 'index.php';
    }
    return false;
}

function signUp() {
    var rgFullName = $("input#rg_full_name").val();
    var rgAccoutn = $("input#rg_account").val();
    var rgEmail = $("input#rg_email").val();
    var rgEmailConfirm = $("input#rg_email_again").val();
    var rgPass = $("input#rg_pass").val();
    var rgPassConfirm = $("input#rg_pass_again").val();
    $('#message-sign-up').html("")
    $('#message-error-fullname').html("")
    $('#message-error-account').html("")
    $('#message-error-email').html("")
    $('#message-error-re-email').html("")
    $('#message-error-pass').html("")
    $('#message-error-re-pass').html("")

    if (rgFullName.length > 50) {
        $('#message-error-fullname').html("Họ tên có độ dài tối đa là 50 ký tự");
        $("input#rg_full_name").focus();
        return false;
    }
    if (rgFullName == "") {
        $('#message-error-fullname').html("Vui lòng nhập họ tên");
        $("input#rg_full_name").focus();
        return false;
    }
    if (rgAccoutn.length > 50) {
        $('#message-error-account').html("Tài khoản tối đa là 50 ký tự");
        $("input#rg_account").focus();
        return false;
    }
    if (rgAccoutn == "") {
        $('#message-error-account').html("Vui lòng nhập account");
        $("input#rg_account").focus();
        return false;
    }
    if (rgAccoutn.length > 100) {
        $('#message-error-email').html("Email tối đa là 100 ký tự");
        $("input#rg_email").focus();
        return false;
    }
    if (rgEmail == "" || !isEmail(rgEmail)) {
        $('#message-error-email').html("Bạn chưa nhập email hoặc email không đúng định dạng");
        $("input#rg_email").focus();
        return false;
    }
    if (rgEmailConfirm == "" || !isEmail(rgEmailConfirm)) {
        $('#message-error-re-email').html("Bạn chưa nhập email xác nhận hoặc email không đúng định dạng");
        $("input#rg_email_again").focus();
        return false;
    }
    if (rgEmailConfirm.localeCompare(rgEmail) != 0) {
        $('#message-error-re-email').html("Email chưa  trùng khớp");
        $("input#rg_email_again").focus();
        return false;
    }
    if (rgPass.length > 50) {
        $('#message-error-pass').html("Mật khẩu có độ dài tối đa là 50 ký tự");
        $("input#rg_pass").focus();
        return false;
    }
    if (rgPass == "") {
        $('#message-error-pass').html("Vui lòng nhập mật khẩu");
        $("input#rg_pass").focus();
        return false;
    }
    if (rgPassConfirm == "") {
        $('#message-error-re-pass').html("Vui lòng nhập xác nhận mật khẩu");
        $("input#rg_pass_again").focus();
        return false;
    }
    if (rgPassConfirm.localeCompare(rgPass) != 0) {
        $('#message-error-re-pass').html("Mật khẩu chưa  trùng khớp");
        $("input#rg_pass_again").focus();
        return false;
    }
    $.ajax({
        url: 'function/sign_up.php',
        type: 'POST',
        async: false,
        cache: false,
        dataType: 'html',
        data: {
            txtFullName: $("input#rg_full_name").val(),
            txtAccount: $("input#rg_account").val(),
            txtEmail: $("input#rg_email").val(),
            txtPass: $("input#rg_pass").val()
        }
    }).done(function(ketqua) {

        if (ketqua == 200) {
            $("#button-signup").hide();
            message = 'Chúc mừng bạn đã tạo thành công tài khoảng tại Vì tôi đẹp.';
            message += '<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';
            $('#message-sign-up').html(message);

        } else if (ketqua == 400) {
            message = 'Tài khoảng hoặc email đã tồn tại.';
            message += '<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';
            $('#message-sign-up').html(message);
        } else {
            message = 'Quá trình đăng ký xảy ra lỗi vui lòng thử lại';
            message += '<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';
            $('#message-sign-up').html(message);
        }
    });

}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function share_fb(url) {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-share-dialog', "width=626, height=436")
}

function share_twiter(url) {
    window.open('http://twitter.com/share?url=' + url, 'facebook-share-dialog', "width=626, height=436")
}

function getPassWord() {
    var kq;
    var passwordReset = $('#textResetEmmail').val();
    if (passwordReset == ""){
        $('#messageResetPass').html('Vui lòng nhập địa chỉ email');
        $('#textResetEmmail').focus();
        return false;
    }
    if ( !isEmail(passwordReset)){
        $('#messageResetPass').html('Vui lòng nhập đúng địa chỉ Email');
        $('#textResetEmmail').focus();
        return false;
    }
    $('#messageResetPass').html('Vui lòng đợi xử lý');
    $.ajax({
        url: 'function/reset_password.php',
        type: 'POST',
        dataType: 'html',
        async: false,
        cache: false,
        data: {
            textResetEmmail: $('#textResetEmmail').val()
        }
    }).done(function (ketqua) {
        kq=ketqua;  
    });
    
    if(kq==200)
    {
        $('#textResetEmmail').hide();
        $('#btn_reset_pass').hide();
        $('#messageResetPass').html('Quá trình tạo mật khẩu mới thành công. Vui lòng kiểm tra email của bạn. Chúng tôi đã tạo mới mật khẩu cho bạn');
        return false;
    } else {
        $('#messageResetPass').html('Vui lòng nhập đúng địa chỉ Email');
        $('#textResetEmmail').focus();
        return false;
    }
        
}
function close_signin(){
    $('#sign_in').modal('hide');
  
} 