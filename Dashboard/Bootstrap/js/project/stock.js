$(document).ready(function() {
    $('#dataTables-example').DataTable({
		responsive: true
    });
	var exist_stock=parseInt($('#updateProductStock').val());
	if(isNaN(exist_stock))
	{
		$('#totalProductStock').val(exist_stock);
	}
	$('#telMaxStock').hide();		
	$('[data-toggle="tooltip"]').tooltip();
	$('#check').hide();
	$('#removeCheck').hide();
	$('#availCheck').hide();
	function redirect()
	{
		location= "Stock.php";
	}
	$('#newProductStock').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#removeProductStock').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#newProductStock').focus(function(){
		$('#telMaxStock').hide();
		$('#telMaxStock').html('<span class="text-danger">Maximum stock added upto 5-digits.</span>')
	});
				$('#newProductStock').keyup(function(){
					var length=$('#newProductStock').val().length;
					if(length>0)
					{
						$('#Update').attr('disabled',false);
					}
					else
					{
						$('#Update').attr('disabled',true);
					}
				});
				// View
				$(document).on('click', '.view_stock', function()
				{  
					var pro_stock_id = $(this).attr("id");  
					   if(pro_stock_id != '')  
					   {  
							$.ajax({  
								 url:"selectProStock.php",  
								 method:"POST",  
								 data:{stock_id:pro_stock_id},  
								 success:function(data){  
									  $('#stock_detail').html(data);  
									  $('#viewProductStockModal').modal('show');  
								 }  
							});  
					   }            
				});
				// Remove
				$(document).on('click', '.remove_stock', function()
				{  
					var pStock_id = $(this).attr("id"); 
					$.ajax({
						url: 'fetchStock.php',
						type: 'POST',
						dataType:"json",
						data: {s_id:pStock_id},
						success: function(data) 
						{
							var exist_stock=parseInt($('#availProStock').val());
							var remove_stock=parseInt($('#removeProductStock').val());
							total_stock=exist_stock-remove_stock;
							$('#availProStock').val(data.stock_Qty);
										
							$('#removeProductStock').val(total_stock);
							$('#stk_Id').val(data.ProductId);   
							$('#removeStockModal').modal('show');
						}
					});
				});
				$('#remove_form').on('submit',function(){
					event.preventDefault();
					$.ajax({  
						 url:"removeStock.php",  
						 method:"POST",  
						 data:$('#remove_form').serialize(),  
						 beforeSend:function(){  
							  $('#Remove').val("Removing..");  
						 },  
						 success:function(data){  
							  $('#remove_form')[0].reset();  
							  $('#removeStockModal').modal('hide');  
							  $('#stock_table').html(data);
							  Swal.fire({
									  position: 'center',
									  type: 'warning',
									  title: 'Warning',
									  text:'Stock has been removed...!!',
									  showCancelButton:true,
									  cancelButtonColor: '#d33',
									  showConfirmButton: false,
									  closeOnCancel: true,
									  allowOutsideClick:false,
									  customClass: 'animated tada'
								});
							  setTimeout(function() { redirect(); }, 4000);
	 
						 }  
					});
				});
				// Show detail of stock of product
				$(document).on('click', '.update_stock', function(){  
					var product_id = $(this).attr("id");
					   $.ajax({  
							url:"fetchStock.php",  
							method:"POST",  
							data:{prod_id:product_id},  
							dataType:"json",  
							success:function(data){
								if(data!=0)
								{
									Swal.fire({
											  position: 'center',
											  type: 'warning',
											  title: 'Warning',
											  text:'Make product available. Then, try again.',
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
									$.ajax({  
										url:"fetchStock.php",  
										method:"POST",  
										data:{stock_id:product_id},  
										dataType:"json",  
										success:function(data){
											$('#updateProductName').val(data.Product_Name);
											$('#updateProductCate').val(data.cate_name);
											$('#updateProductSize').val(data.Product_Size);
											var qty=data.stock_Qty;
											if(qty==-1)
											{
												qty=0;
												$('#updateProductStock').val(qty);
											}
											else
											{
												$('#updateProductStock').val(data.stock_Qty); 
											}
											 $('#stock_Id').val(data.Product_ID);   
											 $('#updateStockModal').modal('show');
										}
									});
								}
							}  
					}); 
				});
				// Update Operation
				$('#update_form').on('submit',function(){
					event.preventDefault();
					$.ajax({  
						 url:"insertStock.php",  
						 method:"POST",  
						 data:$('#update_form').serialize(),  
						 beforeSend:function(){  
							  $('#Update').val("Updating..");  
						 },  
						 success:function(data){  
							  $('#update_form')[0].reset();  
							  $('#updateStockModal').modal('hide');  
							  $('#stock_table').html(data);
							  Swal.fire({
										  position: 'center',
										  type: 'success',
										  showCloseButton: true,
										  title: 'Stock has been added',
										  customClass: 'animated tada',
										  showConfirmButton: false,
										  timer: 3000
								});
							  setTimeout(function() { redirect(); }, 4000);
	 
						 }  
					});
				});
				//Sum of two fields
				$('#newProductStock').keyup(function(){
					var total_stock=0;
					var val=$('#newProductStock').val();
					var exist_stock=parseInt($('#updateProductStock').val());
					if(val<1)
					{
						$('#Update').attr('disabled',true);
						$('#check').show();
						$('#totalProductStock').val(exist_stock);
						$('#check').html('<span class="text-danger">Invalid format.</span>')
					}
					else
					{
						var exist_stock=parseInt($('#updateProductStock').val());
						var new_stock=parseInt($('#newProductStock').val());
						total_stock=exist_stock+new_stock;
						if(!isNaN(total_stock))
						{
							$('#totalProductStock').val(total_stock);
						}
						$('#Update').attr('disabled',false);
						$('#check').hide();
					}
	});
	$('.update_stock').on('click',function(){
		$('#totalProductStock').val(a);
		$('#check').hide();
	});
	// Remove products 
	$('#removeProductStock').keyup(function(){
					var total_stock=0;
					var val=$('#removeProductStock').val();
					if(val<1)
					{
						$('#Remove').attr('disabled',true);
						$('#check').show();
						$('#check').html('<span class="text-danger">Invalid format.</span>')
					}
					else
					{
						var exist_stock=parseInt($('#availProStock').val());
						var remove_stock=parseInt($('#removeProductStock').val());
						if(exist_stock>=remove_stock)
						{
							total_stock=exist_stock-remove_stock;
							if(!isNaN(total_stock))
							{
								$('#totalProStock').val(total_stock);
							}
							$('#Remove').attr('disabled',false);
							$('#removeCheck').hide();
						}
						else
						{
							$('#totalProStock').val("");
							$('#Remove').attr('disabled',true);
							$('#removeCheck').show();
							$('#removeCheck').html('<span class="text-danger">Removing products are more than existing</span>');
						}
					}
	});
});