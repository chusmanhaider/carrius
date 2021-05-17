$(document).ready(function(){
	
	function redirect()
	{
		location= "Manage Buyers.php";
	}


	
	$('#usernameCheck').hide();
	$('#emailCheck').hide();
	
	$(document).on('click', '.toggle-password', function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		
		var input = $("#password");
		input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
	});

	$(document).on('click','#addDealerModalBtn',function(){
		$('#firstName').val("");
		$('#lastName').val("");
		$('#email').val("");
		$('#phoneNumber').val("");
		$('#mainImage').val("");
		$('#carStatus').val("");
		$('#dealerships').val("");
		$('#dealershipGroup').val("");
		$('#dealershipLoc').val("");

		$('#salespeopleAgent').val("");
		$('#carStock').val("");
		//$(".tab-content").tabs('select', '#basicInfo','active');
	});

	// Email validation
	$('#email').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==46 || k==95 || k==64 ||k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
		//console.log(email.substring(1));
	});
	
	//myval();
	$('#email').blur(function(){
		//$('#createSalesmanBtn').attr('disabled',true);
		var email=$('#email').val();
		var emailReg = /^([a-zA-Z0-9_\.\-\+]{5,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
		//alert(email);
		if(email.length<13)
		{
			$('#emailCheck').show();
			$('#emailCheck').html('<span class="text-danger">Email is too short</span>');
			//$('#createCategoryBtn').attr('disabled',true);
		}
		if(!emailReg.test(email))
		{
			$('#emailCheck').show();
			$('#emailCheck').html('<span class="text-danger">Email format is incorrect.</span>');
			//$('#createCategoryBtn').attr('disabled',true);
		}
		else
		{
			$.ajax({
				url:"checkDealer.php",
				method:"POST",
				data:{email:email},
				success:function(data){
					if(data==0)
					{
						$('#emailCheck').hide();
						$('#createCategoryBtn').attr('disabled',false);
												
					}
					else
					{
						$('#emailCheck').show();
						$('#createCategoryBtn').attr('disabled',true);
						$('#emailCheck').html('<span class="text-danger">Email is already registered</span>');
					}
				}
			});
		}

	});
	$('#upemail').blur(function(){
		//$('#createSalesmanBtn').attr('disabled',true);
		var email=$('#email').val();
		var emailReg = /^([a-zA-Z0-9_\.\-\+]{5,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
		//alert(email);
		if(email.length<13)
		{
			$('#upemailCheck').show();
			$('#upemailCheck').html('<span class="text-danger">Email is too short</span>');
			//$('#createCategoryBtn').attr('disabled',true);
		}
		if(!emailReg.test(email))
		{
			$('#upemailCheck').show();
			$('#upemailCheck').html('<span class="text-danger">Email format is incorrect.</span>');
			//$('#createCategoryBtn').attr('disabled',true);
		}
		else
		{
			$.ajax({
				url:"checkDealer.php",
				method:"POST",
				data:{email:email},
				success:function(data){
					if(data==0)
					{
						$('#upemailCheck').hide();
						$('#Update').attr('disabled',false);
												
					}
					else
					{
						$('#upemailCheck').show();
						$('#Update').attr('disabled',true);
						$('#upemailCheck').html('<span class="text-danger">Email is already registered</span>');
					}
				}
			});
		}

	});
	//Username
	// Email validation
	$('#username').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==46 || k==95 || k==64 ||k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
		//console.log(email.substring(1));
	});

	$('#username').blur(function(){
		var username=$('#username').val();
		
		if(username.length<5 && username!='')
		{
			$('#usernameCheck').show();
			$('#usernameCheck').html('<span class="text-danger">Username is too short</span>');
			//$('#createCategoryBtn').attr('disabled',true);
		}
		else
		{
			$.ajax({
				url:"checkDealer.php",
				method:"POST",
				data:{username:username},
				success:function(data){
					if(data==0)
					{
						$('#usernameCheck').hide();
						$('#createCategoryBtn').attr('disabled',false);
												
					}
					else
					{
						$('#usernameCheck').show();
						$('#createCategoryBtn').attr('disabled',true);
						$('#usernameCheck').html('<span class="text-danger">Username is already registered</span>');
					}
				}
			});
		}

	});
	$('#password').blur(function(){
		var pass_len=$('#password').val().length;
		if(pass_len<6){
			$('#passwordCheck').show();
			//$('#createCategoryBtn').attr('disabled',true);
			$('#passwordCheck').html('<span class="text-danger">Password length should be minimum six</span>');
		}
		else
		{
			$('#passwordCheck').hide();
			//$('#createCategoryBtn').attr('disabled',false);
		}
	});
	$(document).on('click', '.removedBuyers', function()
	{  
		$.ajax({  
			url:"selectRemovedBuyers.php",  
			method:"POST",  
			success:function(data)
			{  
				$('#removeBuyer_detail').html(data);  
				$('#viewRemovedBuyerModal').modal('show');  
			}            
		}); 
	});
	//Disabled Day
	$(document).on('change','#fromDay',function(){
		var select_day=$(this).val();
		//console.log(select_day);
		//$( "#toDay option:contains(select_Day)" ).attr("disabled", true);
	});
	//Approve or reject dealer
	
	
	$(document).on('click', '.markApprove', function(){  
		var buyer_id = $(this).attr("id"); 
		
		   $.ajax({  
				url:"buyerApprove.php",  
				method:"POST",  
				data:{buyer_id:buyer_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'success',
						showCloseButton: true,
						title: 'Buyer Active',
						text:'Buyer marked as active',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	
	$(document).on('click', '.markReject', function(){  
		var buyer_id = $(this).attr("id"); 
		
		   $.ajax({  
				url:"buyerReject.php",  
				method:"POST",  
				data:{buyer_id:buyer_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Buyer Rejected',
						text:'Buyer marked as rejected. You cannot able to undo last action.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	$(document).on('click','.addReason',function () { 
		var buyer_id=$(this).attr("id");
		//alert(buyer_id);
		$('#get_buyer_id').val(buyer_id);
	});
	$(document).on('click', '.viewBuyerDetail', function()
	{  
		var buyer_id = $(this).attr("id");
		//alert(buyer_id);  
		if(buyer_id != '')  
		{  
			$.ajax({  
				url:"selectBuyer.php",  
				method:"POST",  
				data:{buyer_id:buyer_id},  
				success:function(data)
				{  
					$('#buyer_detail').html(data);  
					$('#viewBuyerModal').modal('show');  
				}  
			});  
		}            
	}); 
	
	$(document).on('click', '.updateBuyerDetail', function(){  
		var buyer_id = $(this).attr("id");
		//alert(buyer_id);

		   $.ajax({  
				url:"fetchBuyer.php",  
				method:"POST",  
				data:{buyer_id:buyer_id},  
				dataType:"json",  
				success:function(data)
				{ 

					//alert(data);
					$('#upfirstName').val(data.buyer_FName);
					$('#uplastName').val(data.buyer_LName);
					$('#upphoneNumber').val(data.buyer_CellNumber);
					$('#upbuyerStatus').val(data.buyer_Status);
					$('#upemail').val(data.buyer_Email);
					$('#upusername').val(data.buyer_Username);
					$('#upaddress').val(data.buyer_Address);
					$('#upcity').val(data.buyer_City);
					$('#upcountry').val(data.buyer_Country);
					$('#upcomment').val(data.buyer_Comments);
					$('#buyer_id').val(data.buyer_ID);

					$('#updateBuyerModal').modal('show');
				}  
		}); 
	});
		
		$('#submitBuyerForm').on('submit',function(){
		event.preventDefault();
		$.ajax({  
			 url:"updateBuyer.php",  
			 method:"POST",  
			 data:$('#submitBuyerForm').serialize(),  
			 beforeSend:function(){  
				  $('#updateDealer').val("Updating..");  
			 },  
			 success:function(data){  
				  $('#submitBuyerForm')[0].reset();  
				  $('#updateBuyerModal').modal('hide');  
				  $('#buyer_table').html(data);
				  Swal.fire({
							  position: 'center',
							  type: 'success',
							  showCloseButton: true,
							  title: 'Buyers Profile has been updated',
							  customClass: 'animated tada',
							  showConfirmButton: false,
							  timer: 3000
					});
				  setTimeout(function() { redirect(); }, 2000);
				}  
			});
		});

	
		$(document).on('click','.dealerCarDetail',function(){
			var dealer_id = $(this).attr("id");
			location= "DealerCars.php?url="+ dealer_id;
			//alert(location);
		});
	
	$(document).on('click', '.removeBuyerDetail', function(){  
		var id=$(this).parents("tr").attr("id");
		
		if(confirm('Are you sure to remove this record ?'))
		{
			$.ajax({
					   url: 'removeBuyer.php',
					   type: 'POST',
					   data: {id: id},
					   error: function() {
						  alert('Something is wrong');
					   },
					   success: function(data) {
							$("#"+id).remove();
							Swal.fire({
								  position: 'center',
								  type: 'warning',
								  showCloseButton: true,
								  title: 'Buyer Removed',
								  text:'Buyer removed permanently ...!!',
								  customClass: 'animated tada',
								  showConfirmButton: false,
								  timer: 3000
							});
							setTimeout(function() { redirect(); }, 2000);
					   }
					});
		}
	});	
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(1000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	$(".alert-danger").delay(500).show(10, function() {
		$(this).delay(1000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
});
