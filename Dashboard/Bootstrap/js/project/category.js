$(document).ready(function() {
	
	$('#dataTables-example').DataTable({
        responsive: true
    });
	
	$('[data-toggle="tooltip"]').tooltip();
				
	function redirect()
	{
		location= "Car Brands.php";
	}
	
	$('#categoryName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	
	$('#updateCategoryName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	
	$('#addCategoryModalBtn').on('click',function(){
		$('#categoryName').val("");
		$('#categoryStatus').attr('disabled',true);
		$('#createCategoryBtn').attr('disabled',true);
		$('#avail').hide();
		$('#lengthcheck').hide();	
	});
	
	$('.update_cate').on('click',function(){
		$('#availUpdate').hide();
		$('#lengthcheckUpdate').hide();
		$('#Update').attr('disabled',true);
	});
	
	// Input Validation for Add operation
	$('#avail').hide();
	$('#lengthcheck').hide();
	$('#categoryName').keyup(function(){
		var str=$('#categoryName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		$.ajax({
			url:"checkCategory.php",
			method:"POST",
			data:{category_name:str},
			success:function(data)
			{
				if(data==0)
				{
					if(len>=3 && len<=30)
					{
						$('#avail').show();
						$('#categoryStatus').attr('disabled',false);
						$('#avail').html('<span class="text-success">Category name is available</span>');
						$('#lengthcheck').hide();
						$('#categoryStatus').change(function(){
						var valStat=$('#categoryStatus').val();
							if(valStat!='')
							{
								$('#createCategoryBtn').attr('disabled',false);
							}
							else
							{
								$('#createCategoryBtn').attr('disabled',true);
							}
						});	
					}
					else
					{
						$('#avail').hide();
						$('#lengthcheck').show();
						$('#createCategoryBtn').attr('disabled',true);
						$('#categoryStatus').attr('disabled',true);
					}
				}
				else
				{
					$('#categoryStatus').attr('disabled',true);
					$('#avail').show();
					$('#lengthcheck').hide();
					$('#avail').html('<span class="text-danger">Category name is already taken</span>');
					$('#createCategoryBtn').attr('disabled',true);
				}
			}
		});		
	});
			// Input Validation for update operation
			$('#availUpdate').hide();
				$('#lengthcheckUpdate').hide();
				$('#updateCategoryName').keyup(function(){
					var str=$('#updateCategoryName').val();
					var resultStr=str.replace(/\s+/g, '');
					var len=resultStr.length;
					$.ajax({
						url:"checkCategory.php",
						method:"POST",
						data:{up_category_name:str},
						success:function(data){
							if(len>=3 && len<31)
							{
								if(data==0)
								{
									$('#availUpdate').show();
									$('#availUpdate').html('<span class="text-success">Category name is available</span>');
									$('#Update').attr('disabled',false);
									$('#lengthcheckUpdate').hide();
									$('#Update').on("click",function(){
										 setTimeout(function() { redirect(); }, 5000);
									});
								}
								else
								{
									$('#availUpdate').show();
									$('#lengthcheckUpdate').hide();
									$('#availUpdate').html('<span class="text-danger">Category name is already taken</span>');
									$('#Update').attr('disabled',true);
								}
							}
							else
							{
									$('#Update').attr('disabled',true);
									$('#availUpdate').hide();
									$('#lengthcheckUpdate').show();
							}
						}
						});
					
				});
				
				
				$('#updateCategoryStatus').change(function (){
					$('#Update').attr('disabled',false);
				});
			
			// Update Category
			$(document).on('click', '.update_cate', function(){  
				var category_id = $(this).attr("id");  
				   $.ajax({  
						url:"fetchCategory.php",  
						method:"POST",  
						data:{category_id:category_id},  
						dataType:"json",  
						success:function(data){
							 $('#updateCategoryName').val(data.cate_name);
							 $('#updateCategoryStatus').val(data.cate_status);
							 $('#category_id').val(data.cate_ID);   
							 $('#updateCategoryModal').modal('show');
								
						}  
				}); 
			});
				
			$('#update_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
                     url:"insertCate.php",  
                     method:"POST",  
                     data:$('#update_form').serialize(),  
                     beforeSend:function(){  
                          $('#Update').val("Updating..");  
                     },  
                     success:function(data){  
                          $('#update_form')[0].reset();  
                          $('#updateCategoryModal').modal('hide');  
                          $('#category_table').html(data);
						  Swal.fire({
									  position: 'center',
									  type: 'success',
									  showCloseButton: true,
									  title: 'Category has been updated',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 3000
							});
						  setTimeout(function() { redirect(); }, 4000);
 
                     }  
                });
			});
			// remove category
			$(document).on('click', '.remove_cate', function(){  
				var id=$(this).parents("tr").attr("id");
				$.ajax({
					url: 'checkCategory.php',
					type: 'POST',
					data: {id: id},
					success: function(data) {
						if(data!=0)
						{
							Swal.fire({
									  position: 'center',
									  type: 'warning',
									  title: 'Warning',
									  text:'Category is using. So, it cannot be deleted',
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
							if(confirm('Are you sure to remove this category ?'))
							{
								$.ajax({
								   url: 'removeCategory.php',
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
											  title: 'Category deleted',
											  text:'Category deleted permanently ...!!',
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
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(1000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	$(".alert-danger").delay(500).show(10, function() {
		$(this).delay(1000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
});