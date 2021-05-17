$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    function redirect(){
        location= "Manage Buyers.php";
    }
    $("#changePassword").unbind('submit').bind('submit', function() {

var form = $(this);

$(".text-danger").remove();

var currentPassword = $("#oldPassword").val();
var newPassword = $("#rePassword").val();
var confirmPassword = $("#reNewPassword").val();

if(currentPassword == "" || newPassword == "" || confirmPassword == "") {
if(currentPassword == "") {
    $("#oldPassword").after('<p class="text-danger">Current Password field is required</p>');
    $("#oldPassword").closest('.form-group').addClass('has-error');
} else {
    $("#oldPassword").closest('.form-group').removeClass('has-error');
    $(".text-danger").remove();
}

if(newPassword == "") {
    $("#rePassword").after('<p class="text-danger">New Password field is required</p>');
    $("#rePassword").closest('.form-group').addClass('has-error');
} else {
    $("#rePassword").closest('.form-group').removeClass('has-error');
    $(".text-danger").remove();
}

if(confirmPassword == "") {
    $("#reNewPassword").after('<p class="text-danger">Confirm Password field is required</p>');
    $("#reNewPassword").closest('.form-group').addClass('has-error');
} else {
    $("#reNewPassword").closest('.form-group').removeClass('has-error');
    $(".text-danger").remove();
}
} else {
$(".form-group").removeClass('has-error');
$(".text-danger").remove();

$.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    data: form.serialize(),
    dataType: 'json',
    success:function(response) {
        console.log(response);
        if(response.success == true) {
            $('.changePasswordMessages').html('<div class="alert alert-success">'+
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
  '</div>');
            $('#passChangePanel').css('border','1px solid green');
            // remove the mesages
  $(".alert-success").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                    $(this).remove();
                    redirect();
                });
            }); // /.alert	    
        } else {

            $('.changePasswordMessages').html('<div class="alert alert-warning">'+
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
    '<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
  '</div>');
            $('#passChangePanel').css('border','1px solid red');
            // remove the mesages
  $(".alert-warning").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                    $(this).remove();
                    redirect();
                });
            }); // /.alert	          	
        }
    } // /success function
}); // /ajax function

} // /else


return false;
});
    
    });