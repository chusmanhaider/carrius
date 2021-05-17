$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
	function redirect(){
		location= "My Car.php";
	}
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
	//Update
	$(document).on('click', '.update_car', function(){  
		var car_id = $(this).attr("id");  
		//alert(car_id);
		$.ajax({

			url:"fetchCar.php",  
			method:"POST",  
			data:{car_id:car_id},  	
			dataType:"json",  
			success:function(data)
			{  
				//alert(data[2].kF_ID);
				//alert(data[0].car_Name);
				//$('#updateProductImage').attr('src', ''+data.Product_Image);
				
				$('#updateCarName').val(data[0].car_Name);
				$('#updateYear').val(data[0].car_Year);
				$('#updateCarBrand').val(data[0].CarBrandId);
				$('#updateCarCondition').val(data[0].car_Condition);
				$('#updateCarMileage').val(data[0].car_Mileage);
				//$('#updateCarDealer').val(data[0].car_Dealer);
				//$('#updateCarLoc').val(data[0].car_Location);
				$('#updateCarPrice').val(data[0].car_Price);
				//$('#upMainImage').val(data[0].car_Image);
				//alert(data[0].car_Image);
				//alert(data[0].car_AutoStatus);
				
				$('#updateCarStatus').val(data[0].car_Status);
				//$('#updateCarStatus').val(data[0].car_Status);
				
				var isElect=data[0].car_isElectric;
				var newUsed=data[0].car_NewUsed;
				//alert(newUsed);
				if(newUsed=="Used")
				{
					//alert(newUsed);
					$('#updateUsedRadio').attr('checked', true);

				}
				else if(newUsed="New")
				{
					//alert(newUsed);
					$('#updateNewRadio').attr('checked', true);
					//$("input:radio[id='newRadio']").prop("checked",true);
				}
				if(isElect=="No")
				{
					$('#update_isElect_RTwo').attr('checked', true);
				}
				else if(isElect=="Yes")
				{
					$('#update_isElect_ROne').attr('checked', true);
				}
				
				//alert(data[0].car_Status);
				//console(data.vehOver_BType);
				// Vehicle Overview
				$('#upBodyType').val(data[1].vehOver_BType);
				$('#upCarColor').val(data[1].vehOver_Color);
				$('#upCarDoors').val(data[1].vehOver_NumDoor);
				$('#upCarSeats').val(data[1].vehOver_NumSeats);
				$('#upCarOwner').val(data[1].vehOver_NumOwner);
				$('#upCarDrivetrain').val(data[1].vehOver_DTrain);
				$('#upCarEngineType').val(data[1].vehOver_EType);

				var fueltype=data[1].vehOver_fuelType;
				//console.log(fueltype);
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
				//$('#dealer_Id').val(data[0].dealer_ID);
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
              //$('#product_table').html(data);
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
						data: {cid: id},
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
							setTimeout(function() { redirect(); }, 3000);
						}
					});
				}
			}
		});
	});
	
	
	
	//Relocate to image gallery
	$(document).on('click','.complete_image_gallery',function(){
		var car_id = $(this).attr("id");
		location= "CompleteImageGallery.php?url="+ car_id;
		//alert(location);
	});
	$(".alert-success").delay(500).show(10, function() {
		$(this).delay(3000).hide(10, function() {
			$(this).remove();
			redirect();
		});
	});
	$(document).on('click', '.removedCar', function()
	{  
		 	var id=$(this).attr("id");
			//alert(id);
			$.ajax({  
				url:"selectRemovedCar.php",
				type: 'POST',
				data: {Id: id},  
				success:function(data)
				{  
					$('#recar_detail').html(data);  
					$('#viewremoveCarModal').modal('show');  
				}            
	});
	});
});