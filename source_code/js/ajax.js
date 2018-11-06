function login()
{
        var user = $("input#email").val();  
        
        var pass = $("input#password").val();  
            if(user=="")
            {
                $('#messageLogin').html("Bạn chưa nhập tài khoản/ email");
                $("input#email").focus();  
                return false;  
            }
        
            if(user.indexOf("@") != -1){
                if(!isEmail(user))
                {
                    $('#messageLogin').html("Vui lòng nhập đúng định dạng email");
                    $("input#email").focus();  
                    return false;  
                }
            }
               
        if(pass=="")
        {
            $('#messageLogin').html("Vui lòng nhập mật khẩu");
            $("input#password").focus();  
            return false;  
        }
        $.ajax({
            url: 'function/login.php',
            type: 'POST',
            dataType: 'html',
            data: {
                txtEmail: $("input#email").val(),
                txtPassword: $("input#password").val()
            }
        }).done(function(ketqua) {
            console.log(ketqua)
            if(ketqua==2){
                message="Thông tin đăng nhập chưa chính xác";
                $('#messageLogin').html(message);
            }
            else{
                window.location.href='index.php';
            }
        });
}

function signUp(){
        var rgFullName=$("input#rg_full_name").val();
        var rgAccoutn=$("input#rg_account").val();
        var rgEmail=$("input#rg_email").val();
        var rgEmailConfirm=$("input#rg_email_again").val();
        var rgPass=$("input#rg_pass").val();
        var rgPassConfirm=$("input#rg_pass_again").val();
        $('#message-sign-up').html("")
        $('#message-error-fullname').html("")
        $('#message-error-account').html("")
        $('#message-error-email').html("")
        $('#message-error-re-email').html("")
        $('#message-error-pass').html("")
        $('#message-error-re-pass').html("")

        if(rgFullName.length > 50){
            $('#message-error-fullname').html("Họ tên có độ dài tối đa là 50 ký tự");
            $("input#rg_full_name").focus();  
            return false;  
        }
        if(rgFullName=="")
        {
            $('#message-error-fullname').html("Vui lòng nhập họ tên");
            $("input#rg_full_name").focus();  
            return false;  
        }
        if(rgAccoutn.length > 50){
            $('#message-error-account').html("Tài khoản tối đa là 50 ký tự");
            $("input#rg_account").focus();  
            return false;  
        }
        if(rgAccoutn=="")
        {
            $('#message-error-account').html("Vui lòng nhập account");
            $("input#rg_account").focus();  
            return false;  
        }
        if(rgAccoutn.length > 100){
            $('#message-error-email').html("Email tối đa là 100 ký tự");
            $("input#rg_email").focus();  
            return false;  
        }
        if(rgEmail=="" || !isEmail(rgEmail))
        {
            $('#message-error-email').html("Bạn chưa nhập email hoặc email không đúng định dạng");
            $("input#rg_email").focus();  
            return false;  
        }
        if(rgEmailConfirm==""  || !isEmail(rgEmailConfirm))
        {
            $('#message-error-re-email').html("Bạn chưa nhập email xác nhận hoặc email không đúng định dạng");
            $("input#rg_email_again").focus();  
            return false;  
        }
        if(rgEmailConfirm.localeCompare(rgEmail)!=0)
        {
            $('#message-error-re-email').html("Email chưa  trùng khớp");
            $("input#rg_email_again").focus();  
            return false;  
        }
        if(rgPass.length > 50){
            $('#message-error-pass').html("Mật khẩu có độ dài tối đa là 50 ký tự");
            $("input#rg_pass").focus();  
            return false;  
        }
        if(rgPass=="")
        {
            $('#message-error-pass').html("Vui lòng nhập mật khẩu");
            $("input#rg_pass").focus();  
            return false;  
        }
        if(rgPassConfirm=="")
        {
            $('#message-error-re-pass').html("Vui lòng nhập xác nhận mật khẩu");
            $("input#rg_pass_again").focus();  
            return false;  
        }
        if(rgPassConfirm.localeCompare(rgPass)!=0)
        {
            $('#message-error-re-pass').html("Mật khẩu chưa  trùng khớp");
            $("input#rg_pass_again").focus();  
            return false;  
        }
        $.ajax({
            url:'function/sign_up.php',
            type:'POST',
            dataType:'html',
            data:{
                txtFullName : $("input#rg_full_name").val(),
                txtAccount : $("input#rg_account").val(),
                txtEmail : $("input#rg_email").val(),
                txtPass : $("input#rg_pass").val()
            }
        }).done(function(ketqua) {
            if(ketqua==200){
                $("#button-signup").hide();
                message='Chúc mừng bạn đã tạo thành công tài khoảng tại Vì tôi đẹp.'; 
                message+='<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';               
                $('#message-sign-up').html(message); 

            }
            else if(ketqua==400){
                message='Tài khoảng hoặc email đã tồn tại.'; 
                message+='<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';               
                $('#message-sign-up').html(message);   
            }
            else{
                message='Quá trình đăng ký xảy ra lỗi vui lòng thử lại'; 
                message+='<a data-toggle="modal" data-target="#sign_up"  ><p class="text-info text-underline">Đăng nhập ngay nhé.</p></a>';               
                $('#message-sign-up').html(message);   
            }
        });

}



function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

