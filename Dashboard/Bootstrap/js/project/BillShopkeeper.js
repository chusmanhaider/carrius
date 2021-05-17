$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	var url = window.location.href;
	var shopkId = url.substring(url.lastIndexOf('=') + 1);
	$.ajax({
		url:"fetchBill.php",  
			method:"POST",  
			data:{shopkId:shopkId},  
			dataType:"json",  
			success:function(data)
			{  
				$('#shopkName').val(data.shopkeeper_name);
				$('#shopName').val(data.shopkeeper_shopName);
				$('#shopAddr').val(data.shopkeeper_address);			
			}  
	});
	$('#qty').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$(document).on('click', '.viewOrder', function()
	{  
			var order_id = $(this).attr("id");
			var shopKId=$(this).parents("tr").attr("id");
			if(order_id != '' && shopKId != '')  
			{  
				$.ajax({  
					url:"selectSSOrder.php",  
					method:"POST",  
					data:{order_id:order_id,shopk_Id:shopKId},  
					success:function(data)
					{  
						$('#order_detail').html(data);  
						$('#viewOrderModal').modal('show');  
					}  
				});  
			} 
	});
	
});