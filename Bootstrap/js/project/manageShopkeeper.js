$(document).ready(function(){
				 $('#dataTables-example').DataTable({
                        responsive: true
                });
				$('#availMail').hide();
				$('[data-toggle="tooltip"]').tooltip();
				$('#nameCheck').hide();
				function redirect(){
				location= "Manage ShopKeepers.php";
				}
				$('#avail').hide();
				$('#lengthcheck').hide();
				$('#sNameCheck').hide();
				$('#availUMail').hide();
				$('#shopkeeperName').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#updateShopkeeperName').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#shopName').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#updateShopName').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#shopAddress').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#updateShopKAddress').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#shopKeeperContact').keypress(function(e){
					var k = e.which;
					//var ok = k >= 65 && k <= 90 || k==45 || k==32 || k >= 48 && k <= 57;
					var ok = k >= 48 && k <= 57;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#updateShopKCell').keypress(function(e){
				var k = e.which;
				var ok = k >= 48 && k <= 57;
				if (!ok)
				{
					e.preventDefault();
				}
				});
				$('#shopkeeperUsername').keypress(function(e){
				var k = e.which;
				var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57;
				if (!ok)
				{
					e.preventDefault();
				}
				});
				$('#updateShopKUsername').keypress(function(e){
				var k = e.which;
				var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57;
				if (!ok)
				{
					e.preventDefault();
				}
				});
				$('#shopKeeperEmail').keypress(function(e){
				var k = e.which;
				var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==46 || k==95 || k==64 ||k >= 48 && k <= 57;
				if (!ok)
				{
					e.preventDefault();
				}
				});
				$('#updateShopKEmail').keypress(function(e){
				var k = e.which;
				var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==46 || k==95 || k==64 ||k >= 48 && k <= 57;
				if (!ok)
				{
					e.preventDefault();
				}
				});
				$('#shopKeeperEmail').blur(function(){
					$('#createShopkeeperBtn').attr('disabled',true);
					var email=$('#shopKeeperEmail').val();
					var emailReg = /^([a-zA-Z0-9_\.\-\+]{6,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
					//alert(email);
					if(!emailReg.test(email))
					{
						$('#availMail').show();
						$('#availMail').html('<span class="text-danger">Email format is incorrect.</span>');
						$('#createShopkeeperBtn').attr('disabled',true);
					}
					else
					{
						$('#availMail').hide();
						$('#createShopkeeperBtn').attr('disabled',false);
					}
				});
				$('#updateShopKEmail').blur(function(){
					$('#Update').attr('disabled',true);
					var email=$('#updateShopKEmail').val();
					var emailReg = /^([a-zA-Z0-9_\.\-\+]{6,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
					//alert(email);
					if(!emailReg.test(email))
					{
						$('#availUMail').show();
						$('#availUMail').html('<span class="text-danger">Email format is incorrect.</span>');
						$('#Update').attr('disabled',true);
					}
					else
					{
						$('#availUMail').hide();
						$('#Update').attr('disabled',false);
					}
				});
				$('#shopkeeperUsername').keyup(function(){
					var shopUser=$(this).val();
					var shopUsernameLength=$(this).val().length;
					$.ajax({
						url:"checkUserShopkeeper.php",
						method:"POST",
						data:{username:shopUser},
						success:function(data){
							if(shopUsernameLength>=5 && shopUsernameLength<21)
							{
								if(data==0)
								{
									$('#avail').show();
									$('#avail').html('<span class="text-success">Username is available</span>');
									$('#createShopkeeperBtn').attr('disabled',false);
									$('#lengthcheck').hide();
								}
								else
								{
									$('#avail').show();
									$('#lengthcheck').hide();
									$('#avail').html('<span class="text-danger">Username is not available</span>');
									$('#createShopkeeperBtn').attr('disabled',true);
								}
							}
							else
							{
									$('#createShopkeeperBtn').attr('disabled',true);
									$('#avail').hide();
									$('#lengthcheck').show();
							}
						
						}
						});
					
				});
				$(document).on('click', '.viewShopKDetail', function()
				{  
					var shopkeeper_id = $(this).attr("id");
					   if(shopkeeper_id != '')  
					   {  
							$.ajax({  
								 url:"selectShopkeeper.php",  
								 method:"POST",  
								 data:{shopkeeper_id:shopkeeper_id},  
								 success:function(data){  
									  $('#shopkeeper_detail').html(data);  
									  $('#viewShopkeeperModal').modal('show');  
								 }  
							});  
					   }            
				});
				$(document).on('click', '.updateShopKDetail', function(){  
				var shopkeeper_id = $(this).attr("id");  
				   $.ajax({  
						url:"fetchShopkeeper.php",  
						method:"POST",  
						data:{shopkeeper_id:shopkeeper_id},  
						dataType:"json",  
						success:function(data){  
							 $('#updateShopkeeperName').val(data.shopkeeper_name);
							 $('#updateShopName').val(data.shopkeeper_shopName);
							 $('#updateShopKAddress').val(data.shopkeeper_address);
							 $('#updateShopKCell').val(data.shopkeeper_contactNo);
							 $('#updateShopKEmail').val(data.shopkeeper_email);
							 $('#updateShopKUsername').val(data.shopkeeper_username);
							 $('#updateShopKPassword').val(data.shopkeeper_password);
							 $('#updateShopKStatus').val(data.shopkeeper_status);
							 $('#shopkeeper_id').val(data.shopkeeper_ID);   
							 $('#updateShopKModal').modal('show');
								
						}  
				   }); 
				});
				//Submit update form
				$('#update_shop_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
                     url:"insertShopkeeper.php",  
                     method:"POST",  
                     data:$('#update_shop_form').serialize(),  
                     beforeSend:function(){  
                          $('#Update').val("Updating..");  
                     },  
                     success:function(data){  
                          $('#update_shop_form')[0].reset();  
                          $('#updateShopKModal').modal('hide');  
                          $('#shopK_table').html(data);
						  Swal.fire({
									  position: 'center',
									  type: 'success',
									  showCloseButton: true,
									  title: 'Shopkeeper has been updated',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 3000
							});
						  setTimeout(function() { redirect(); }, 2000);
						}  
					});
				});
				// Remove ShopKeeper		
				$(document).on('click', '.removeShopKDetail', function(){  
				var id=$(this).parents("tr").attr("id");
				$.ajax({
					url: 'checkUserShopkeeper.php',
					type: 'POST',
					data: {id: id},
					success: function(data) {
						if(data==0)
						{
							Swal.fire({
									  position: 'center',
									  type: 'warning',
									  title: 'Warning',
									  text:'There is remaining payment by shopkeeper. So, he cannot be deleted',
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
							if(confirm('Are you sure to remove this shopkeeper ?'))
							{
								$.ajax({
								   url: 'removeShopkeeper.php',
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
											  title: 'Shopkeeper remove !!',
											  text:'ShopKeeper removed permanently ...!!',
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
			$('#shopAddCheck').hide();
			$('#cellLenCheck').hide();
			$('#cellCheck').hide();
			$('#userCheck').hide();
			/*$('#shopkeeperName').keyup(function(){
				var strSN=$('#shopkeeperName').val();
				var resultStrNS=strSN.replace(/\s+/g, '');
				var lenNS=strSN.length;
				if(lenNS>2)
				{
					$('#nameCheck').hide();
					$('#shopName').keyup(function(){
						var strS=$('#shopName').val();
						var resultSStr=strS.replace(/\s+/g, '');
						var lenS=strS.length;
						if(lenS>5)
						{
							$('#sNameCheck').hide();
							$('#shopAddress').keyup(function(){
								var strSA=$('#shopAddress').val();
								var resultStrSA=strSA.replace(/\s+/g, '');
								var lenSA=strSA.length;
								if(lenSA>10)
								{
									$('#shopAddCheck').hide();
									$('#shopKeeperContact').blur(function(){
										var cell=$('#shopKeeperContact').val();
										var cellLen=cell.length;
										if(cellLen==11)
										{
											$('#cellLenCheck').hide();
											$.ajax({
												url:"checkUserShopkeeper.php",
												method:"POST",
												data:{shopKName:strSN,shopName:strS,shopAddr:strSA,contactNo:cell},
												success:function(data)
												{
													//alert(data);
													if(data==0)
														$('#btnNext').attr('disabled',false);
													else
														$('#btnNext').attr('disabled',true);
												}
											});
										}
										else
										{
											$('#btnNext').attr('disabled',true);
											$('#cellLenCheck').show();
											$('#userCheck').hide();
											$('#cellLenCheck').html('<span class="text-danger">Contact no length is too short</span>')
										}
									});
								}
								else
								{
									$('#btnNext').attr('disabled',true);
									$('#shopAddCheck').show();
									$('#userCheck').hide();
									$('#shopAddCheck').html('<span class="text-danger">Address is too short</span>')
								}
							});
						}
						else
						{
							$('#btnNext').attr('disabled',true);
							$('#sNameCheck').show();
							$('#userCheck').hide();
							$('#sNameCheck').html('<span class="text-danger">Shop name is too short</span>')
						}
					});
				}
				else
				{
					$('#btnNext').attr('disabled',true);
					$('#nameCheck').show();
					$('#userCheck').hide();
					$('#nameCheck').html('<span class="text-danger">Name is too short</span>')
				}
			});
			//*/
			$(".alert-success").delay(500).show(10, function() {
				$(this).delay(3000).hide(10, function() {
					$(this).remove();
						redirect();
				});
			});
			$(document).on('click', '.removedShopkeepers', function()
			{  
				$.ajax({  
					url:"selectShopkeeperRemoved.php",  
					method:"POST",  
					success:function(data)
					{  
						$('#removeShopK_detail').html(data);  
						$('#viewremoveShopkeeperModal').modal('show');  
					}            
				});
			});
		});