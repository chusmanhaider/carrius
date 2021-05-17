$(document).ready(function(){
	$('#dataTables-example').DataTable({
		responsive: true
    });
	function redirect()
	{
		location= "Manage Salesmen.php";
	}
	$('[data-toggle="tooltip"]').tooltip();
	$('#avail').hide();
	$('#nameLen').hide();
	$('#lengthUsername').hide();
	$('#availCell').hide();
	$('#lengthCell').hide();
	$('#availMail').hide();
	$('#nameTell').hide();
	$('#nameUpLen').hide();
	$('#addrLen').hide();
	$('#addrUpLen').hide();
	$('#cellUpLen').hide();
	$('#mailUpAvail').hide();
	$('#userCheck').hide();
	
	$(document).on('click', '.removedSalesman', function()
	{  
		$.ajax({  
			url:"selectSalesmanRemoved.php",  
			method:"POST",  
			success:function(data)
			{  
				$('#removeSalesman_detail').html(data);  
				$('#viewremoveSalesmanModal').modal('show');  
			}            
		}); 
	});
	
	//Name validate	
	$('#salesmanName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#salesmanName').blur(function(){
		
		var str=$('#salesmanName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		if(len>=3)
		{
			$('#nameLen').hide();
		}
		else
		{
			$('#nameLen').show();
			$('#btnNext').attr('disabled',true);
			$('#nameLen').html('<span class="text-danger">Name length is too short</span>');
		}
	});
	//Address validate
	$('#salesmanAddress').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#salesmanAddress').keyup(function(){
		
		var str=$('#salesmanAddress').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		if(len>=10)
		{
			$('#addrLen').hide();
		}
		else
		{
			$('#addrLen').show();
			$('#btnNext').attr('disabled',true);
			$('#addrLen').html('<span class="text-danger">Address length is too short</span>');
		}
	});
	//Contact no validation
	$('#salesmanContact').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	function checkUserCell()
	{
		$('#salesmanContact').keyup(function(){
		var cellNo=$('#salesmanContact').val();
		var cellLen=$('#salesmanContact').val().length;
		$.ajax({
				url:"checkUserSalesman.php",
				method:"POST",
				data:{cell:cellNo,cellNo:cellNo},
				success:function(data){
					if(data==0)
					{
						if(cellLen==11)
						{
							$('#availCell').hide();
							$('#btnNext').attr('disabled',false);
							return true;
						}
						else if(cellLen<11)
						{
							$('#btnNext').attr('disabled',true);
							return false;
						}
					}
					else
					{
						$('#availCell').show();
						$('#btnNext').attr('disabled',true);
						$('#availCell').html('<span class="text-danger">Cell number is already using by other person.</span>');
						return false;
					}
				}
			});
		});
	}
	
	
	//username validation (prevent to enter all special characters)
	$('#salesmanUsername').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	//-------------------------------- Check ----------------------------------------
	$('#salesmanName').blur(function(){
		var str=$('#salesmanName').val();
		var nameLen=$('#salesmanName').val().length;
		//var resultStr=str.replace(/\s+/g, '');
		$('#salesmanAddress').blur(function(){
			var strAdd=$('#salesmanAddress').val();
			var addLen=$('#salesmanAddress').val().length;
			$('#salesmanContact').keyup(function(){
				var contactNo=$('#salesmanContact').val();
				var cellLen=$('#salesmanContact').val().length;
				$.ajax({
				url:"checkUserSalesman.php",
				method:"POST",
				data:{sname:str,address:strAdd,cellNo:contactNo},
				success:function(data){
					if(data==0)
					{
						if (nameLen>=3 && addLen>=10 && cellLen==11)
						{
							if(checkUserCell()==true)
							{
								$('#userCheck').hide();
								$('#btnNext').attr('disabled',false);
							}
							else if(checkUserCell()==false)
							{
								$('#userCheck').hide();
								$('#btnNext').attr('disabled',true);
							}
						}
						else
						{
							if(nameLen<3)
							{
								$('#btnNext').attr('disabled',true);
								//$('#nameLen').html('<span class="text-danger">User already exist</span>');
							}
							else if(addLen<10)
							{
								$('#btnNext').attr('disabled',true);
							}
							else if (cellLen<11)
							{
								$('#btnNext').attr('disabled',true);
							}
						}
					}
					else
					{
						$('#userCheck').show();
						$('#lengthCell').hide();
						$('#availCell').show();
						$('#availCell').html('<span class="text-danger">This cell no is already using by someone other.</span>');
						$('#btnNext').attr('disabled',true);
						$('#userCheck').html('<span class="text-danger">User already exist</span>');
					}
				}
			});
			});
		});
	});
	// Username check if exist
	// Email validation
	$('#salesmanEmail').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==46 || k==95 || k==64 ||k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#salesmanEmail').blur(function(){
		$('#createSalesmanBtn').attr('disabled',true);
		var email=$('#salesmanEmail').val();
		var emailReg = /^([a-zA-Z0-9_\.\-\+]{6,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
		//alert(email);
		if(!emailReg.test(email))
		{
			$('#availMail').show();
			$('#availMail').html('<span class="text-danger">Email format is incorrect.</span>');
			$('#createSalesmanBtn').attr('disabled',true);
		}
		else
		{
			$.ajax({
				url:"checkUserSalesman.php",
				method:"POST",
				data:{mail:email,email:email},
				success:function(data){
					if(data==0)
					{
						
												
					}
					else
					{
						$('#availMail').show();
						$('#createSalesmanBtn').attr('disabled',true);
						$('#availMail').html('<span class="text-danger">Email is already using by anyone.</span>');
					}
				}
			});
		}

	});
	// new data
	$('#salesmanUsername').keyup(function(){
		var uname=$(this).val();
		var unameLen=$(this).val().length;
		if(unameLen>=5 && unameLen<=20)
		{
			$('#lengthUsername').hide();
			$.ajax({
				url:"checkUserSalesman.php",
				method:"POST",
				data:{username:uname},
				success:function(data){
					if(data==0)
					{
						$('#avail').show();
						$('#createSalesmanBtn').attr('disabled',false);
						$('#avail').html('<span class="text-success">Username is available</span>');
					}
					else
					{
						$('#avail').show();
						$('#createSalesmanBtn').attr('disabled',true);
						$('#avail').html('<span class="text-danger">Username is not available</span>');
					}
				}
			});
		}
		else
		{
			$('#avail').hide();
			$('#lengthUsername').show();
			$('#createSalesmanBtn').attr('disabled',true);
			$('#lengthUsername').html('<span class="text-danger">Username length is too short.</span>');
		}
	});
	//------------------------------- Validations for update operations -------------------
	//Name validate	(Update)
	$('#updateSalesmanName').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#updateSalesmanName').keyup(function(){
		
		var str=$('#updateSalesmanName').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		if(len>=3)
		{
			$('#nameUpLen').hide();
		}
		else
		{
			$('#nameUpLen').show();
			$('#nameUpLen').html('<span class="text-danger">Name length is too short</span>');
		}
	});
	//Address validate
	$('#updateSalesmanAddress').keypress(function(e){
		var k = e.which;
        var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
		if (!ok)
		{
            e.preventDefault();
        }
	});
	$('#updateSalesmanAddress').keyup(function(){
		$('#btnUpNext').attr('disabled', true);
		var str=$('#updateSalesmanAddress').val();
		var resultStr=str.replace(/\s+/g, '');
		var len=resultStr.length;
		if(len>=10)
		{
			$('#addrUpLen').hide();
			$('#btnUpNext').attr('disabled', false);
		}
		else
		{
			$('#addrUpLen').show();
			$('#btnUpNext').attr('disabled', true);
			$('#addrUpLen').html('<span class="text-danger">Address length is too short</span>');
		}
	});
	//Contact no validation (update)
	$('#updateSalesmanCell').keypress(function(e){
		var k = e.which;
        var ok = k >= 48 && k <= 57;
		if (!ok)
		{
            e.preventDefault();
        }
	}); 
	// Email validation
	$('#updateSalesmanEmail').blur(function(){
		var email=$('#updateSalesmanEmail').val();
		var emailReg = /^([a-zA-Z0-9_\.\-\+]{6,30})+\@(([a-zA-Z0-9\-]{2,8})+\.)+([a-zA-Z0-9]{2,4})+$/;
	//var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!emailReg.test(email))
		{
			$('#mailUpAvail').show();
			$('#mailUpAvail').html('<span class="text-danger">Email format is incorrect.</span>');
		}
		else
		{
			$('#mailUpAvail').hide();
		}

	});
	//On click add btn clear all fields
	$('#addProductModalBtn').on('click',function(){
		$('#salesmanName').val("");
		$('#salesmanAddress').val("");
		$('#salesmanContact').val("");
		$('#nameLen').hide();
		$('#nameTell').hide();
		$('#addrLen').hide();
		$('#availCell').hide();
		$('#lengthCell').hide();
		$('#userCheck').hide();
		$('#btnNext').attr('disabled', true);
	});
	//View
				$(document).on('click', '.viewSaleDetail', function()
				{  
					var salesman_id = $(this).attr("id");  
					   if(salesman_id != '')  
					   {  
							$.ajax({  
								 url:"selectSalesman.php",  
								 method:"POST",  
								 data:{salesman_id:salesman_id},  
								 success:function(data){  
									  $('#salesman_detail').html(data);  
									  $('#viewSaleModal').modal('show');  
								 }  
							});  
					   }            
				}); 
				
				$(document).on('click', '.updateSaleDetail', function(){  
				var salesman_id = $(this).attr("id");  
				   $.ajax({  
						url:"fetchSalesman.php",  
						method:"POST",  
						data:{salesman_id:salesman_id},  
						dataType:"json",  
						success:function(data){  
							 $('#updateSalesmanName').val(data.salesman_name);
							 $('#updateSalesmanAddress').val(data.salesman_address);
							 $('#updateSalesmanCell').val(data.salesman_contactNo);
							 $('#updateSalesmanUsername').val(data.salesman_username);
							 $('#updateSalesmanEmail').val(data.salesman_email);
							 $('#updateSalesmanPassword').val(data.salesman_password);
							 $('#updateSalesmanStatus').val(data.salesman_status);
							 $('#salesman_id').val(data.salesman_ID);   
							 $('#updateSalesmanModal').modal('show');
								
						}  
				   }); 
				});
				
				$('#update_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
                     url:"insertSalesman.php",  
                     method:"POST",  
                     data:$('#update_form').serialize(),  
                     beforeSend:function(){  
                          $('#updateSalesman').val("Updating..");  
                     },  
                     success:function(data){  
                          $('#update_form')[0].reset();  
                          $('#updateSalesmanModal').modal('hide');  
                          $('#salesman_table').html(data);
						  Swal.fire({
									  position: 'center',
									  type: 'success',
									  showCloseButton: true,
									  title: 'Salesman has been updated',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 3000
							});
						  setTimeout(function() { redirect(); }, 2000);
						}  
					});
				});
			
			// Remove Salesman 
			$(document).on('click', '.removeSaleDetail', function(){  
				var id=$(this).parents("tr").attr("id");
				
			     if(confirm('Are you sure to remove this salesman ?'))
					{
						$.ajax({
						   url: 'removeSalesman.php',
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
									  title: 'Salesman removed',
									  text:'Salesman removed permanently ...!!',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 3000
								});
								setTimeout(function() { redirect(); }, 2000);
						   }
						});
					}
				});
	
	$('#updateSalesmanCell').keyup(function(){
		$('#btnUpNext').attr('disabled',true);
		var upCellNo=$('#updateSalesmanCell').val();
		var upCellLen=$('#updateSalesmanCell').val().length;
		//$('#btnUpNext').attr('disabled', false);
			$.ajax({
				url:"checkUserSalesman.php",
				method:"POST",
				data:{upCellNo:upCellNo},
				success:function(data){
					if(data==0)
					{
						if(upCellLen==11)
						{
							$('#cellUpLen').hide();
							$('#btnUpNext').attr('disabled', false);
						}
						else
							$('#btnUpNext').attr('disabled', true);
					}
					else
					{
						$('#cellUpLen').show();
						$('#cellUpLen').html('<span class="text-danger">Number is already using by someone other.</span>');
						$('#btnUpNext').attr('disabled', true);
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