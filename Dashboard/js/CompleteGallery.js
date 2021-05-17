$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
    $('[data-toggle="tooltip"]').tooltip();
    
    //var url=<?php echo $_GET['url']; ?>;

    function redirect(){
        
        location= "CompleteGallery.php?";
    }
    $(document).on('click', '.viewImageClass', function()
	{  
		var image_id = $(this).attr("id");
		//alert(image_id);  
		if(image_id != '')  
		{  
			$.ajax({  
				url:"selectOneImage.php",  
				method:"POST",  
				data:{image_id:image_id},  
				success:function(data)
				{  
					$('#image_detail').html(data);  
					$('#viewOneImageModal').modal('show');  
				}  
			});  
		}            
	});
    $(document).on('click', '.markArchived', function(){  
		var car_image_id = $(this).attr("id"); 
		alert(car_image_id);
		   $.ajax({  
				url:"carArchived.php",  
				method:"POST",  
				data:{car_image_id:car_image_id},  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Image Archived',
						text:'Car image has been archived.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
});