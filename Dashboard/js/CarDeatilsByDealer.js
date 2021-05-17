$(document).ready(function() {
	
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
			
    
});