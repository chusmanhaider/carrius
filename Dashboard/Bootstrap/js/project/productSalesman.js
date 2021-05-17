$(document).ready(function(){
	$('#dataTables-example').DataTable({
        responsive: true
    });
	$(document).on('click', '.removedProducts', function()
	{  
		$.ajax({  
				url:"selectRemovedProduct.php",  
				method:"POST",  
				success:function(data)
				{  
					$('#reproduct_detail').html(data);  
					$('#viewremoveProductModal').modal('show');  
				}            
		});
	});
	$('[data-toggle="tooltip"]').tooltip();
		$(document).on('click', '.viewProduct', function()
				{  
					var product_id = $(this).attr("id");  
					   if(product_id != '')  
					   {  
							$.ajax({  
								 url:"selectProduct.php",  
								 method:"POST",  
								 data:{product_id:product_id},  
								 success:function(data){  
									  $('#product_detail').html(data);  
									  $('#viewProductModal').modal('show');  
								 }  
							});  
					   }            
				});
		});