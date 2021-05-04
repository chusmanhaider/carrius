$(document).ready(function() {
					  
	$('.news_table').show();
	
	$('#cateWise').on('change',function(){
		$('#prodc').val("");
		$('#brand').attr('disabled',false);
		$('#prodc').attr('disabled',true);
		$('.news_table').show();
		$('#show_product').hide();
	});
	
	$('#proWise').on('change',function(){
		$('#brand').val("");
		$('#brand').attr('disabled',true);
		$('#prodc').attr('disabled',false);
		$('.news_table').show();
		$('#show_product').hide();
	});
	
	$('#brand').change(function(){  
		var brand_id = $(this).val(); 
		if(brand_id!='')
		{
			$('.news_table').hide();
			$('#show_product').show();
			$.ajax({  
				url:"Pages/load_data_index.php",  
				method:"POST",  
				data:{brand_id:brand_id},  
				success:function(data)
				{  
					$('#show_product').html(data);
				}  
			});  
		}
		else
		{
			$('.news_table').show();
			$('#show_product').hide();
		}
	});
	
	$('#prodc').change(function(){  
		var prod_id = $(this).val(); 
		if(prod_id!='')
		{
			$('.news_table').hide();
			$('#show_product').show();
			$.ajax({  
				url:"Pages/load_data_prod.php",  
				method:"POST",  
				data:{prod_id:prod_id},  
				success:function(data)
				{  
					$('#show_product').html(data);
				}  
			});  
		}
		else
		{
			$('.news_table').show();
			$('#show_product').hide();
		}
	});
				
	$('.viewProduct').on('click',function(){
		var product_id = $(this).attr("id");
		if(product_id != '')  
		{  
			$.ajax({  
				url:"pages/selectProShop.php",  
				method:"POST",  
				data:{pd_id:product_id},  
				success:function(data)
				{  
					$('#product_detail').html(data);  
					$('#viewProModal').modal('show');  
				}  
			});  
		}
	});
});