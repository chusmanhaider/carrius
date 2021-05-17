$(document).ready(function(){
	
	function redirect()
	{
		location= "Manage Dealers.php";
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
	$(document).on('click', '.removedDealers', function()
	{  
		$.ajax({  
			url:"selectDealerRemoved.php",  
			method:"POST",  
			success:function(data)
			{  
				$('#removeDealership_detail').html(data);  
				$('#viewRemovedDealerModal').modal('show');  
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
		var dealer_id = $(this).attr("id"); 
		
		   $.ajax({  
				url:"dealerApprove.php",  
				method:"POST",  
				data:{dealer_id:dealer_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'success',
						showCloseButton: true,
						title: 'Dealer Active',
						text:'Dealer marked as active',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	
	$(document).on('click', '.markReject', function(){  
		var dealer_id = $(this).attr("id"); 
		
		   $.ajax({  
				url:"dealerReject.php",  
				method:"POST",  
				data:{dealer_id:dealer_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Dealer Rejected',
						text:'Dealer marked as rejected. You cannot able to undo last action.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	$(document).on('click', '.viewDealerDetail', function()
	{  
		var dealer_id = $(this).attr("id");
		//alert(dealer_id);  
		if(dealer_id != '')  
		{  
			$.ajax({  
				url:"selectDealer.php",  
				method:"POST",  
				data:{dealer_id:dealer_id},  
				success:function(data)
				{  
					$('#dealer_detail').html(data);  
					$('#viewDealerModal').modal('show');  
				}  
			});  
		}            
	}); 
	
	$(document).on('click', '.updateDealerDetail', function(){  
		var dealer_id = $(this).attr("id");
		//alert(dealer_id);  
		   $.ajax({  
				url:"fetchDealer.php",  
				method:"POST",  
				data:{dealer_id:dealer_id},  
				dataType:"json",  
				success:function(data)
				{ 

					$('#upfirstName').val(data.dealer_FName);
					$('#uplastName').val(data.dealer_LName);
					$('#upphoneNumber').val(data.dealer_CellNumber);
					$('#upcarStatus').val(data.dealer_Status);
					$('#updealershipGroup').val(data.dealer_Dealership);
					$('#updealershipLoc').val(data.dealer_Location);
					$('#updealerships').val(data.dealer_DealerNum);

					$('#upsalespeopleAgent').val(data.dealer_NumAgent);
					$('#upcarStock').val(data.dealer_NumCarStock);

					var dType=data.dealer_Type;
					if(dType=="Private Owner")
					{
						$('#upprivateRadio').attr('checked', true);
					}
					else if(dType=="Franchise Group")
					{
						$('#upfranchiseRadio').attr('checked', true);
					}
					


					$('#upemail').val(data.dealer_Email);
					$('#upusername').val(data.dealer_Username);

					$('#upfromDay').val(data.dealer_WorkFromDay);
					$('#uptoDay').val(data.dealer_WorkToDay);

					var time=data.dealer_WorkFromTime;
					//var timefrom=date("g:i A", strtotime(time));
					var str = "Time Now: " + time ;
					$("#fromTime").html(data.dealer_WorkFromTime);
					//$('#upfromTime').val(time);
					$('#uptoTime').val(data.dealer_WorkToTime);
					
					$('#upcomment').val(data.dealer_Comments);
					
					$('#dealer_id').val(data.dealer_ID);
					  
					$('#updateDealerModal').modal('show');
						
				}  
		}); 
	});
		
		$('#update_form').on('submit',function(){
		event.preventDefault();
		$.ajax({  
			 url:"updateDealer.php",  
			 method:"POST",  
			 data:$('#update_form').serialize(),  
			 beforeSend:function(){  
				  $('#updateDealer').val("Updating..");  
			 },  
			 success:function(data){  
				  $('#update_form')[0].reset();  
				  $('#updateDealerModal').modal('hide');  
				  $('#salesman_table').html(data);
				  Swal.fire({
							  position: 'center',
							  type: 'success',
							  showCloseButton: true,
							  title: 'Dealer Profile has been updated',
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
	
	$(document).on('click', '.removeDealerDetail', function(){  
		var id=$(this).parents("tr").attr("id");
		$.ajax({
			url: 'checkDealer.php',
			type: 'POST',
			data: {id: id},
			success: function(data) 
			{
				if(data!=0)
				{
					Swal.fire({
						position: 'center',
						type: 'warning',
						title: 'Warning',
						text:'Dealer has car stock',
						showCancelButton:true,
						cancelButtonColor: '#d33',
						showConfirmButton: false,
						closeOnCancel: true,
						allowOutsideClick:false,
						customClass: 'animated tada'
					});
				}
				else
				{
					if(confirm('Are you sure to remove this record ?'))
					{
						$.ajax({
								   url: 'removeDealership.php',
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
											  title: 'Dealer Removed',
											  text:'Dealer removed permanently ...!!',
											  customClass: 'animated tada',
											  showConfirmButton: false,
											  timer: 3000
										});
										setTimeout(function() { redirect(); }, 2000);
								   }
								});
					}
				}
			}
		});
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
