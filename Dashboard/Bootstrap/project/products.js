$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
	function redirect(){
		location= "Cars.php";
	}
	$('[data-toggle="tooltip"]').tooltip();
	$('#lengthNameCheck').hide();
	$('#availName').hide();
	$('#pStock').hide();
	$('#productCheck').hide();
	$('#availCate').hide();
	$('#availSize').hide();
	$('#availUpName').hide();
	$('#lengthUpNameCheck').hide();
	$('#upProductCheck').hide();
	$('#priceCheck').hide();
	$('#prDiCheck').hide();
	$('#upPrDiCheck').hide();
	$('#upPriceCheck').hide();
	// KeyPress Validations (add)
	$('#productName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k==38;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#productPrice').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#productDiscount').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#productStock').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	// keypress (update)
	$('#updateProductName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k==38;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#updateProductPrice').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#updateProductDiscount').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#productStock').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	//price & discout check (add)
	$('#productPrice').keyup(function(){
		var price=$('#productPrice').val();
		if(price!=0 || price>=10)
		{
			$('#productDiscount').keyup(function(){
				var discount=$('#productDiscount').val();
				if(discount!="")
				{
					if(price==discount)
					{
						$('#prDiCheck').show();
						$('#prDiCheck').html('<span class="text-danger">Price & discount are equal.</span>');
						$('#createProductBtn').attr('disabled',true);
					}
					else if(price>discount)
					{
						$('#prDiCheck').hide();
						$('#createProductBtn').attr('disabled',false);
					}
					else if(price<discount)
					{
						$('#prDiCheck').show();
						$('#prDiCheck').html('<span class="text-danger">Price is low than discount.</span>');
						$('#createProductBtn').attr('disabled',true);
					}
				}
			});
		}
		else
		{	$('#prDiCheck').hide();
			$('#priceCheck').show();
			$('#priceCheck').html('<span class="text-danger">Price is too low.</span>');
			$('#createProductBtn').attr('disabled',true);
		}
	});
	//price & discout check (update)
	$('#updateProductPrice').keyup(function(){
		$('#updateProductDiscount').val("");
		$('#Update').attr('disabled',true);
		var upPrice=$('#updateProductPrice').val();
		if(upPrice!=0 || upPrice>=10)
		{
			$('#updateProductDiscount').keyup(function(){
				var upDiscount=$('#updateProductDiscount').val();
				if(upDiscount!="")
				{
					if(upPrice==upDiscount)
					{
						$('#upPrDiCheck').show();
						$('#upPrDiCheck').html('<span class="text-danger">Price & discount are equal.</span>');
						$('#Update').attr('disabled',true);
					}
					else if(upPrice>upDiscount)
					{
						$('#upPrDiCheck').hide();
						$('#Update').attr('disabled',false);
					}
					else if(upPrice<upDiscount)
					{
						$('#upPrDiCheck').show();
						$('#upPrDiCheck').html('<span class="text-danger">Price is low than discount.</span>');
						$('#Update').attr('disabled',true);
					}
				}
			});
		}
		else
		{	$('#upPrDiCheck').hide();
			$('#upPriceCheck').show();
			$('#upPriceCheck').html('<span class="text-danger">Price is too low.</span>');
			$('#Update').attr('disabled',true);
		}
	});
	// Stock add or not
	$('#productStatus').on('change',function(){
		var pstat=$(this).val();
		if(pstat==0 || pstat==2)
		{
			$('#pStock').hide();
		}
		else
		{
			$('#pStock').show();
		}
	});
	$('#addProductModalBtn').click(function(){
		$('#btnNext').attr('disabled',true);
		$('#productName').val("");
		$('#productCategory').val("");
		$('#productSize').val("");
		$('#productCategory').attr('disabled',true);
		$('#productSize').attr('disabled',true);
		$('#productCheck').hide();
	});
	// View
	$(document).on('click', '.viewProduct', function()
	{  
		var product_id = $(this).attr("id");  
		if(product_id != '')  
		{  
			$.ajax({  
				url:"selectProduct.php",  
				method:"POST",  
				data:{product_id:product_id},  
				success:function(data)
				{  
					$('#product_detail').html(data);  
					$('#viewProductModal').modal('show');  
				}  
			});  
		}            
	});
	//Update
	$(document).on('click', '.updateProduct', function(){  
		var product_id = $(this).attr("id");  
		$.ajax({  
			url:"fetchproduct.php",  
			method:"POST",  
			data:{product_id:product_id},  
			dataType:"json",  
			success:function(data)
			{  
				//$('#updateProductImage').attr('src', ''+data.Product_Image);
				$('#updateProductName').val(data.Product_Name);
				$('#updateProductSize').val(data.Product_Size);
				$('#updateProductCategory').val(data.CategoryId);
				$('#updateProductPrice').val(data.Product_Price);
				$('#updateProductDiscount').val(data.Product_Dicount);
				$('#updateProductDesc').val(data.Product_Desc);
				$('#updateProductStatus').val(data.Product_Status);
				$('#product_id').val(data.Product_ID);   
				$('#updateProductModal').modal('show');				
			}  
		}); 
	});
	$('#update_form').on('submit',function(){
		event.preventDefault();
		$.ajax({  
            url:"insertProduct.php",  
            method:"POST",  
            data:$('#update_form').serialize(),  
            beforeSend:function(){  
                $('#Update').val("Updating..");  
            },  
            success:function(data)
			{  
                $('#update_form')[0].reset();  
                $('#updateProductModal').modal('hide');  
              //$('#product_table').html(data);
				Swal.fire({
					position: 'center',
					type: 'success',
					showCloseButton: true,
					title: 'Product has been updated',
					customClass: 'animated tada',
					showConfirmButton: false,
					timer: 3000
				});
				setTimeout(function() { redirect(); }, 1000);
			}  
		});
	});
	// Remove			
	$(document).on('click', '.removeProduct', function(){  
		var id=$(this).parents("tr").attr("id");
		$.ajax({
			url: 'checkProduct.php',
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
						text:'Product stock exist.',
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
								   url: 'removeProduct.php',
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
											  title: 'Product Deleted',
											  text:'Product deleted permanently ...!!',
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
	// Input validation for add product
	$('#productName').blur(function(){
		var str=$('#productName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		//debugger;
		//alert(str);
		if(len<3)
		{
			$('#lengthNameCheck').show();
			$('#productCategory').attr('disabled',true);
			$('#productSize').attr('disabled',true);
			$('#lengthNameCheck').html('<span class="text-danger">Length is too short</span>');	
		}
		else
		{
			$('#lengthNameCheck').hide();
			$('#productCategory').attr('disabled',false);
			$('#productCategory').on('change',function(){
				var cateVal=$('#productCategory').val();
				$('#productSize').attr('disabled',false);
				$('#productSize').on('change',function(){
					var sizeVal=$('#productSize').val();
					$.ajax({
						url:"checkProduct.php",
						method:"POST",
						data:{product_name:str,product_cate:cateVal,product_size:sizeVal},
						success:function(data)
						{
							if(data==1)
							{
								$('#btnNext').attr('disabled',true);
								$('#productCheck').show();
								$('#productCheck').html('<span class="text-danger">This product already exist</span>');
							}
							else if(data==0)
							{
								$('#btnNext').attr('disabled',false);
								$('#productCheck').show();
								$('#productCheck').html('<span class="text-success">No such product exists</span>');
							}
						}
					});
				});
			});
		}
	});
	// After click no invalid action can be taken
	$('#btnNext').on('click',function(){
		var str=$('#productName').val();
		var resultStr=str.replace(/\s+/g, '');
		var leng=resultStr.length;
		var cateValue=$('#productCategory').val();
		var sizeValue=$('#productSize').val();
		if(leng=='' || cateValue=='' || sizeValue=='')
		{
			if(leng=='')
			{
				$('#availName').show();
				$('#availName').html('<span class="text-danger">Product name is empty.</span>');
				$('#lengthNameCheck').hide();
				$('#productCheck').hide();
			}
			else if(cateValue=='')
			{
				$('#availCate').show();
				$('#availCate').html('<span class="text-danger">Product category is not selected.</span>');
				$('#lengthNameCheck').hide();
				$('#productCheck').hide();
			}
			else if(sizeValue=='')
			{
				$('#availSize').show();
				$('#availSize').html('<span class="text-danger">Product size is not selected.</span>');
				$('#lengthNameCheck').hide();
				$('#productCheck').hide();
			}
		}
	});
	
	// Update Input validation
	// 1.1 name changes
	$('#updateProductName').keyup(function(){
		$('#btnUpNext').attr('disabled', true);
		var str=$('#updateProductName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		$('#updateProductCategory').val("");
		$('#updateProductSize').val("");
		$('#updateProductCategory').change(function(){
			var cate=$('#updateProductCategory').val();
			$('#updateProductSize').change(function(){
				var size=$('#updateProductSize').val();
				if(len<3)
				{
					$('#lengthUpNameCheck').show();
					$('#lengthUpNameCheck').html('<span class="text-danger">Length is too short</span>');	
				}
				else
				{
					$('#lengthUpNameCheck').hide();
					$.ajax({
						url:"checkProduct.php",
						method:"POST",
						data:{up_product_name:str,up_product_cate:cate,up_product_size:size},
						success:function(data)
						{
							if(data!=0)
							{
								$('#btnUpNext').attr('disabled', true);
								$('#upProductCheck').show();
								$('#upProductCheck').html('<span class="text-danger">Product already exist.</span>');
							}
							else
							{
								$('#btnUpNext').attr('disabled', false);
								$('#upProductCheck').show();
								$('#upProductCheck').html('<span class="text-success">Product already not exist.</span>');
							}
						}
					});
				}
			});
		});
	});
	//1.2 category changes
	/*$('#updateProductCategory').change(function(){
		$('#btnUpNext').attr('disabled', true);
		var str=$('#updateProductName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		var cate=$('#updateProductCategory').val();
		var size=$('#updateProductSize').val();
		
		$('#lengthUpNameCheck').hide();
		$.ajax({
			url:"checkProduct.php",
			method:"POST",
			data:{up_product_name:resultStr,up_product_cate:cate,up_product_size:size},
			success:function(data)
			{
				if(data!=0)
				{
					$('#btnUpNext').attr('disabled', true);
					$('#upProductCheck').show();
					/*$('#updateProductName').css('border','1px solid #a94442');
					$('#updateProductCategory').css('border','1px solid #a94442');
					$('#updateProductSize').css('border','1px solid #a94442');
					$('#upProductCheck').html('<span class="text-danger">Product already exist.</span>');
				}
				else
				{
					$('#btnUpNext').attr('disabled', false);
					$('#upProductCheck').show();
					/*$('#updateProductName').css('border','1px solid green');
					$('#updateProductCategory').css('border','1px solid green');
					$('#updateProductSize').css('border','1px solid green');
					$('#upProductCheck').html('<span class="text-success">Product already not exist.</span>');
				}
			}
		});
	});
	//1.3
	$('#updateProductSize').change(function(){
		$('#btnUpNext').attr('disabled', true);
		var str=$('#updateProductName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		var cate=$('#updateProductCategory').val();
		var size=$('#updateProductSize').val();
		
		$('#lengthUpNameCheck').hide();
		$.ajax({
			url:"checkProduct.php",
			method:"POST",
			data:{up_product_name:resultStr,up_product_cate:cate,up_product_size:size},
			success:function(data)
			{
				if(data!=0)
				{
					$('#btnUpNext').attr('disabled', true);
					$('#upProductCheck').show();
					/*$('#updateProductName').css('border','1px solid #a94442');
					$('#updateProductCategory').css('border','1px solid #a94442');
					$('#updateProductSize').css('border','1px solid #a94442');
					$('#upProductCheck').html('<span class="text-danger">Product already exist.</span>');
				}
				else
				{
					$('#btnUpNext').attr('disabled', false);
					$('#upProductCheck').show();
					/*$('#updateProductName').css('border','1px solid green');
					$('#updateProductCategory').css('border','1px solid green');
					$('#updateProductSize').css('border','1px solid green');
					$('#upProductCheck').html('<span class="text-success">Product already not exist.</span>');
				}
			}
		});
	});*/
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(3000).hide(10, function() {
			$(this).remove();
			redirect();
		});
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
});