$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		$('#dataTables-example').DataTable
			({
                responsive: true
            });
			 function redirect(){
				location= "Help Request.php";
				}
			// View Help
			$(document).on('click', '.viewHelp', function()
				{  
					var help_id = $(this).attr("id");  
					   if(help_id != '')  
					   {  
							$.ajax({  
								 url:"selectHelp.php",  
								 method:"POST",  
								 data:{help_id:help_id},  
								 success:function(data){  
									  $('#help_detail').html(data);  
									  $('#viewHelpModal').modal('show');  
								 }  
							});  
					   }            
				});
			$('#replyLength').hide();
			$('#reply').keyup(function(){
				var replyMsg=$('#reply').val();
				var replyMsgLength=$('#reply').val().length;
				if(replyMsgLength>=10 && replyMsgLength<=120)
				{
					$('#replyHelpBtn').attr('disabled',false);
					$('#replyLength').hide();
				}
				else
				{
					$('#replyLength').show();
					$('#replyHelpBtn').attr('disabled',true);
					$('#replyLength').html('<span class="text-danger">Reply message length &gt 10</span>');
				}
			});
			// Reply on Help
			$(document).on('click', '.replyHelp', function(){  
				var help_id = $(this).attr("id");  
				   $.ajax({  
						url:"replyHelp.php",  
						method:"POST",  
						data:{help_id:help_id},  
						dataType:"json",  
						success:function(data){
							$('#reqDate').val(data.help_date);
							$('#upName').val(data.shopkeeper_name);
							$('#upShopName').val(data.shopkeeper_shopName);
							$('#upShopAddr').val(data.shopkeeper_address);
							var reasonCheck=data.help_Reason;
							if(reasonCheck==0)
							{
								$('#helpReason').val("Order Delay");
							}
							if(reasonCheck==1)
							{
								$('#helpReason').val("Product Damage");
							}
							if(reasonCheck==2)
							{
								$('#helpReason').val("Extra Charges");
							}
							else if(reasonCheck==3)
							{
								$('#helpReason').val("Others");
							}
							
							$('#upDetail').val(data.help_Detail);
							$('#help_id').val(data.help_ID);   
							$('#replyHelpModal').modal('show');
							//alert(data.help_Reason);
						}  
				   }); 
				});
			$('#reply_help_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
                     url:"insertHelp.php",  
                     method:"POST",  
                     data:$('#reply_help_form').serialize(),  
                     beforeSend:function(){  
                          $('#replyHelpBtn').val("Replying..");  
                     },  
                     success:function(data){  
                          $('#reply_help_form')[0].reset();  
                          $('#replyHelpModal').modal('hide');  
                          $('#helpListTable').html(data);
						  Swal.fire({
									  position: 'center',
									  type: 'success',
									  showCloseButton: true,
									  title: 'Replied',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 900
							});
						  setTimeout(function() { redirect(); }, 500);
 
                     }  
                });
			});
		});	