            $(document).ready(function() {
				$('#dataTables-example').DataTable({
                        responsive: true
                });
				$('[data-toggle="tooltip"]').tooltip();
			$(document).on('click', '.viewBill', function()
			{  
					var shopkeeper_id = $(this).attr("id");
					if(shopkeeper_id != '')  
					{  
						$.ajax({  
							url:"selectBill.php",  
							method:"POST",  
							data:{shopkeeper_id:shopkeeper_id},  
							success:function(data)
							{  
								$('#bill_detail').html(data);  
								$('#viewBillModal').modal('show');  
							}  
						});  
					}            
			});
			$(document).on('click','.paymentDetail',function(){
				var shopkeeper_id = $(this).attr("id");
				location= "AdPaymentDetail.php?url="+ shopkeeper_id;
			});
			$(document).on('click', '.removedPayment', function()
			{  
				 
					$.ajax({  
						url:"selectRemovedPayment.php",  
						method:"POST",  
						success:function(data)
						{  
							$('#removePayment_detail').html(data);  
							$('#removeShopKPaymentModal').modal('show');  
						}            
			});
			});
		});