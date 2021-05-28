$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
	function redirect(){
		location= "Cars.php";
	}
	$(document).on('click','.complete_gallery',function(){
		var car_id = $(this).attr("id");
		location= "CompleteGallery.php?url="+ car_id;
		//alert(location);
	});
	//Add 
	$('#carFuelTypeOther').hide();
	$('#carFuelTypeOther').removeAttr("required");
	$('#UpdateDealership').attr('disabled',true);
	$(document).on('change','#carFuelType',function(){
		var val=$(this).val();
		if(val=="Other")
		{
			$('#carFuelTypeOther').show();
			$('#carFuelTypeOther').attr("required");
			$('#carFuelType').removeAttr("required");
		}
			
		else
		{
			$('#carFuelTypeOther').hide();
			$('#carFuelType').attr("required");
			$('#carFuelTypeOther').removeAttr("required");
		}
		
		
	});
	//Update
	$('#upCarFuelTypeOther').hide();
	$('#upCarFuelTypeOther').removeAttr("required");
	$(document).on('change','#upCarFuelType',function(){
		var val=$(this).val();
		if(val=="Other")
		{
			$('#upCarFuelTypeOther').show();
			$('#upCarFuelTypeOther').attr("required");
			$('#upCarFuelType').removeAttr("required");
		}
			
		else
		{
			$('#upCarFuelTypeOther').hide();
			$('#upCarFuelType').attr("required");
			$('#upCarFuelTypeOther').removeAttr("required");
		}
		
		
	});

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
	$(document).on('click', '.view_car', function()
	{  
		var car_id = $(this).attr("id");  
		if(car_id != '')  
		{  
			$.ajax({  
				url:"selectCar.php",  
				method:"POST",  
				data:{car_id:car_id},  
				success:function(data)
				{  
					$('#car_detail').html(data);  
					$('#viewCarModal').modal('show');  
				}  
			});  
		}            
	});
	// View
	$(document).on('click', '.view_car_gallery', function()
	{  
		var car_id = $(this).attr("id");
		//alert(car_id);  
		if(car_id != '')  
		{  
			$.ajax({  
				url:"selectCarGallery.php",  
				method:"POST",  
				data:{car_id:car_id},  
				success:function(data)
				{  
					$('#car_images_gallery').html(data);  
					$('#viewCarImageModal').modal('show');  
				}  
			});  
		}            
	});
	$('#updateCarDealerNew').on('change',function () {  
		var get_id = $(this).children('option:selected').attr("name");
		//console.log(get_id);
		$.ajax({
			url:"fetchCarDealer.php",  
			method:"POST",  
			data:{get_id:get_id},  
			dataType:"json",  
			success:function(data)
			{
				$('#selectedDealerLocation').val(data.dealer_Location);
			}
			
		});
	});
	$('#adminPassword').keyup(function(){
		var pass=$(this).val();
		var get_admin_id=$(this).attr("name");
		//console.log(get_admin_id);
		$.ajax({
			url:"fetchCarDealer.php",  
			method:"POST",  
			data:{pass:pass,get_admin_id:get_admin_id},   
			success:function(data)
			{
				if(data==0)
				{
					$('#showError').show();
					$('#UpdateDealership').attr('disabled',true);
					$('#showError').html("<span style='color:red'>Your Password is incorrect.</span>");
				}
				else if(data==1)
				{
					$('#showError').hide();
					$('#UpdateDealership').attr('disabled',false);
				}
			}
		});
	});
	//Update dealership
	$(document).on('click','.updateDealership',function(){
		var car_id = $(this).attr("name");
		var dealer_id = $(this).attr("id");
		$.ajax({
			url:"fetchCarDealer.php",  
			method:"POST",  
			data:{car_id:car_id,dealer_id:dealer_id},  
			dataType:"json",  
			success:function(data)
			{
						
				//console.log(selectedCarDealerNewId);
						//Part two
				var dealership=data.dealer_Dealership;
				var loc=data.dealer_Location;
				$('#updateCarDealerNew').val(dealership);
				$('#selectedDealerLocation').val(loc);
				//alert(data.dealer_ID);
				$('#car_id').val(data.car_ID);
				//$('#selectedCarDealerNewId').val(selectedCarDealerNewId);
				//alert(data[1].dealer_ID);
				$('#currentDealerId').val(data.dealer_ID);
			},
					
		});
	});
	$('#updateCarDealerNew').on('change',function () {  
		var selectedCarDealerNewId = $(this).children('option:selected').attr("name");
		//alert(selectedCarDealerNewId);
		$('#newDealerId').val(selectedCarDealerNewId);
	});
	$('#update_dealer_form').on('submit',function(){
		event.preventDefault();
		$.ajax({  
            url:"updateCarDealer.php",  
            method:"POST",  
            data:$('#update_dealer_form').serialize(),  
            beforeSend:function(){  
                $('#UpdateDealership').val("Updating..");  
            },  
            success:function(data)
			{  
                $('#update_dealer_form')[0].reset();  
                $('#updateDealerModal').modal('hide');  
              	Swal.fire({
					position: 'center',
					type: 'success',
					showCloseButton: true,
					title: 'Dealership has been updated',
					customClass: 'animated tada',
					showConfirmButton: false,
					timer: 3000
				});
				setTimeout(function() { redirect(); }, 4000);
			}  
		});
	});
	$(".alert-warning").delay(500).show(10, function() {
		$(this).delay(2000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(2000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	//Update
	$(document).on('click', '.update_car', function(){  
		var car_id = $(this).attr("id");
			$.ajax({
			url:"fetchCar.php",  
			method:"POST",  
			data:{car_id:car_id},  
			dataType:"json",  
			success:function(data)
			{  
				$('#updateCarName').val(data[0].car_Name);
				$('#updateYear').val(data[0].car_Year);
				$('#updateCarBrand').val(data[0].CarBrandId);
				$('#updateCarCondition').val(data[0].car_Condition);
				$('#updateCarMileage').val(data[0].car_Mileage);
				
				var selected_dealer=data[0].dealer_Dealership;
				$('#updateCarDLoc').val(selected_dealer);
				
				$('#updateCarPrice').val(data[0].car_Price);
				var isElect=data[0].car_isElectric;
				var newUsed=data[0].car_NewUsed;
				if(newUsed=="Used")
				{
					$('#updateUsedRadio').attr('checked', true);

				}
				else if(newUsed="New")
				{
					$('#updateNewRadio').attr('checked', true);
				}
				if(isElect=="No")
				{
					$('#update_isElect_RTwo').attr('checked', true);
				}
				else if(isElect=="Yes")
				{
					$('#update_isElect_ROne').attr('checked', true);
				}
				$('#updateCarStatus').val(data[0].car_Status);
				//$('#updateDealerId').val(data[4].dealer_ID);
								//console(data.vehOver_BType);
				//alert(data[3].dealer_ID);
				// Vehicle Overview
				$('#upBodyType').val(data[1].vehOver_BType);
				$('#upCarColor').val(data[1].vehOver_Color);
				$('#upCarDoors').val(data[1].vehOver_NumDoor);
				$('#upCarSeats').val(data[1].vehOver_NumSeats);
				$('#upCarOwner').val(data[1].vehOver_NumOwner);
				
				//console.log(data[1].vehOver_NumGear);
				$('#upCarDrivetrain').val(data[1].vehOver_DTrain);
				$('#upCarEngineType').val(data[1].vehOver_EType);
				
				var fueltype=data[1].vehOver_fuelType;
				if(fueltype=="CNG" || fueltype=="Diesel" || fueltype=="Hybrid" || fueltype=="Patrol")
				{
					$('#upCarFuelType').val(fueltype);
					$('#upCarFuelTypeOther').hide();
				}
				else
				{
					$('#upCarFuelType').val("Other");
					$('#upCarFuelTypeOther').val(fueltype);
					$('#upCarFuelTypeOther').show();
				}
				//alert(fueltype);
				$('#upcarGear').val(data[1].vehOver_NumGear);
				$('#upCarCOEmission').val(data[1].vehOver_Emission);
				var tank_capacity=data[1].vehOver_TCapacity;
				if(tank_capacity==0 || tank_capacity==-1)
				{
					$('#upTankCapacity').val("n/a");
				}
				else
				{
					$('#upTankCapacity').val(data[1].vehOver_TCapacity);
				}
				
				$('#uphorsepower').val(data[1].vehOver_HPower);
				

				// Key Features  
				$('#upBluetooth').val(data[2].kF_BTooth);
				$('#upBackCamera').val(data[2].kF_BCamera);
				$('#upAlloyRims').val(data[2].kF_ARims);
				$('#upSunMoonRoof').val(data[2].kF_SMroof);
				$('#upleatheretteSeats').val(data[2].kF_LSeats);
				$('#uphFrontSeats').val(data[2].kF_HFSeats);
				$('#uplaneDepartureWarning').val(data[2].kF_LDWarning);
				$('#upKeylessEntry').val(data[2].kF_KEntry);
				
				
				
				$('#car_Id').val(data[0].car_ID);
				$('#car_overview_Id').val(data[1].vehOver_ID);
				$('#car_feature_Id').val(data[2].kF_ID);    
				$('#updateCarModal').modal('show');		
					
			}  
		}); 
	});
	$('#update_form').on('submit',function(){
		event.preventDefault();
		$.ajax({  
            url:"updateCar.php",  
            method:"POST",  
            data:$('#update_form').serialize(),  
            beforeSend:function(){  
                $('#Update').val("Updating..");  
            },  
            success:function(data)
			{  
                $('#update_form')[0].reset();  
                $('#updateCarModal').modal('hide');  
              	$('#product_table').html(data);
				Swal.fire({
					position: 'center',
					type: 'success',
					showCloseButton: true,
					title: 'Car has been updated',
					customClass: 'animated tada',
					showConfirmButton: false,
					timer: 3000
				});
				setTimeout(function() { redirect(); }, 1000);
			}  
		});
	});
	// Remove			
	$(document).on('click', '.remove_car', function(){  
		var id=$(this).parents("tr").attr("id");
		//alert(id);
		$.ajax({
			url: 'checkCar.php',
			type: 'POST',
			data: {cid: id},
			success: function(data) 
			{
				if(confirm('Are you sure to remove this record ?'))
				{
					$.ajax({
						url: 'removeCar.php',
						type: 'POST',
						data: {rid: id},
						error: function() {
						 alert('Something is wrong');
						},
						success: function(data)
						{
							$("#"+id).remove();
							Swal.fire({
								position: 'center',
								type: 'warning',
								showCloseButton: true,
								title: 'Car Deleted',
								text:'Car deleted permanently ...!!',
								customClass: 'animated tada',
								showConfirmButton: false,
								timer: 3000
							});
							setTimeout(function() { redirect(); }, 2000);
						}
					});
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
		if(len<2)
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
	//Mark----
	$(document).on('click', '.markApprove', function(){  
		var car_id = $(this).attr("id"); 
		
		   $.ajax({  
				url:"carApprove.php",  
				method:"POST",  
				data:{car_id:car_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'success',
						showCloseButton: true,
						title: 'Car Available',
						text:'Car marked as available',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	
	$(document).on('click', '.markReject', function(){  
		var car_id = $(this).attr("id"); 
		//alert(dealer_id);
		   $.ajax({  
				url:"carReject.php",  
				method:"POST",  
				data:{car_id:car_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Car Rejected',
						text:'Car marked as rejected. You cannot able to undo last action.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	$(document).on('click', '.markReject', function(){  
		var car_id = $(this).attr("id"); 
		//alert(dealer_id);
		   $.ajax({  
				url:"carReject.php",  
				method:"POST",  
				data:{car_id:car_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Car Rejected',
						text:'Car marked as rejected. You cannot able to undo last action.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
	/*
	$(document).on('change', '.carDealer', function(){  
		var dealer_id = $(this).children("option:selected").attr("id");
		alert(dealer_id);  
		$.ajax({
			//alert(dealer_id);
			url:"fetchDealer.php",  
			method:"POST",  
			data:{dealer_id:dealer_id},  
			dataType:"json",  
			success:function(data)
			{
				//console.log(data.dealer_ID);
			} 
		});
	});
	*/
	$(".alert-warning").delay(500).show(10, function() {
		$(this).delay(2000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(2000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
});