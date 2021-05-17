$(document).ready(function() {
    $('#dataTables-example').DataTable({
		responsive: true
    });
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#qty').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#order_date').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
		var final_total_amt = $('#final_total_amt').text();
        var count = 1;
	$(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          
          html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
          
          
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
	// View shopkeeper_detail
	$(document).on('click', '.viewShopKDetail', function()
	{  
		var shopkeeper_id = $(this).attr("id");
		if(shopkeeper_id != '')  
		{  
			$.ajax({  
				url:"selectSShopkeeper.php",  
				method:"POST",  
				data:{shopkeeper_id:shopkeeper_id},  
				success:function(data){  
				$('#shopkeeper_detail').html(data);  
				$('#viewShopkeeperModal').modal('show');  
				}  
			});  
		}            
	});
	/*
	//add order for shopkeeper
	$(document).on('click', '.bookOrder', function(){  
		var shopk_id = $(this).attr("id");  
		$.ajax({  
			url:"addOrder.php",  
			method:"POST",  
			data:{shopk_id:shopk_id},  
			dataType:"json",  
			success:function(data)
			{
				$('#shopk_name').val(data.shopkeeper_name);
				$('#shop_name').val(data.shopkeeper_shopName);
				$('#shopk_addr').val(data.shopkeeper_address);
				$('#shopkId').val(data.shopkeeper_ID);  
				$('#addOrderModal').modal('show');	
				//alert(data);
			}  
		}); 
	});
	$('.removeBtn').on('click',function(){
		$(this).parents("tr").remove();
		
	});
	$('#qty').blur(function(){
		var qt=$('#qty').val();
		var pd_id = $(this).parents("tr").attr("id"); 
		if(pd_id!='')
		{
			$.ajax({
				url:"selectProductPrice.php",  
				method:"POST",  
				data:{productId:pd_id}, 
				success:function(data)
				{  
					var subTotal=data*qt;
					$('#price').val(subTotal);
				}  
			});
		}	
	});*/
});