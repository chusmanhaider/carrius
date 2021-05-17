$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
				function redirect(){
					location= "Profile-shop.php";
				}
				$('#password').val("");
				var shopK_Id=<?php echo $result['shopkeeper_ID']; ?>;
				$("#changeUsernameForm").unbind('submit').bind('submit', function() {
				var form = $(this);
				
				var shop = $("#shopName").val();
				var shopkname = $("#shopkeeprName").val();
				var shopaddrs = $("#shopAddress").val();
				var cell = $("#cellNo").val();
				var mail = $("#email").val();
				var user = $("#username").val();

			if(shop == "" || shopkname=="" || shopaddrs=="" || cell=="" || user=="") 
			{
				if(shop == "") {
					$("#shopName").after('<p class="text-danger">Shop name field is required</p>');
					$("#shopName").closest('.form-group').addClass('has-error');
				} else {
					$("#shopName").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
				if(shopkname == "") {
					$("#shopkeeprName").after('<p class="text-danger">Shopkeeper name field is required</p>');
					$("#shopkeeprName").closest('.form-group').addClass('has-error');
				} 
				else {
					$("#shopkeeprName").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
				if(shopaddrs == "") {
					$("#shopAddress").after('<p class="text-danger">Shop address field is required</p>');
					$("#shopAddress").closest('.form-group').addClass('has-error');
				} 
				else {
					$("#shopAddress").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
				if(cell == "") {
					$("#cellNo").after('<p class="text-danger">Cell phone field is required</p>');
					$("#cellNo").closest('.form-group').addClass('has-error');
				} 
				else {
					$("#cellNo").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
				if(mail == "") {
					$("#email").after('<p class="text-danger">Email field is required</p>');
					$("#email").closest('.form-group').addClass('has-error');
				} 
				else {
					$("#email").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
				if(user == "") {
					$("#username").after('<p class="text-danger">Username field is required</p>');
					$("#username").closest('.form-group').addClass('has-error');
				} 
				else {
					$("#username").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
			} 
			else {

			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');

			$("#changeUsernameBtn").button('loading');

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
				
					$("#changeUsernameBtn").button('reset');
					// remove text-error 
					$(".text-danger").remove();
					// remove from-group error
					$(".form-group").removeClass('has-error').removeClass('has-success');
						console.log(response);
					if(response.success == true)  {												
																
						// shows a successful message after operation
						$('.changeUsenrameMessages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');
						// remove the mesages
	          $(".alert-success").delay(300).show(10, function() {
							$(this).delay(1500).hide(10, function() {
								$(this).remove();
								//redirect();
								$(".")
							});
						}); // /.alert	          					
						
					} else {
						// shows a successful message after operation
						$('.changeUsenrameMessages').html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
	          '</div>');
						// remove the mesages
	          $(".alert-warning").delay(300).show(10, function() {
							$(this).delay(1500).hide(10, function() {
								$(this).remove();
								redirect();
							});
						}); // /.alert	          					
					}
				} // /success 
			}); // /ajax
		}
			
		return false;
	});
				});	