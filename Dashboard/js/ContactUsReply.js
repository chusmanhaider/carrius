$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
    $('[data-toggle="tooltip"]').tooltip();
    function redirect(){
        location= "ContactReply.php";
    }
        
    $(document).on('click', '.viewContact', function()
    {  
        var contact_id = $(this).attr("id"); 
        //alert(contact_id);
        if(contact_id != '')  
        {  
            $.ajax({  
                url:"selectContactReply.php",  
                method:"POST",  
                data:{contact_id:contact_id},  
                success:function(data){  
                    $('#contact_detail_reply').html(data);  
                    $('#viewContactModal').modal('show');  
                }  
            });  
        }            
    }); 
    $(document).on('click', '.markIgnore', function(){  
		var contact_id = $(this).attr("id"); 
		//alert(contact_id);
		   $.ajax({  
				url:"contactus-action.php",  
				method:"POST",  
				data:{contact_id :contact_id },  
				success:function(data){  
					Swal.fire({
						position: 'center',
						type: 'warning',
						showCloseButton: true,
						title: 'Contact Us Ignored',
						text:'Contact request ignored. You cannot able to undo last action.',
						customClass: 'animated tada',
						showConfirmButton: false,
						timer: 3000
					});
				setTimeout(function() { redirect(); }, 3000);
				}  
		   }); 
	});
    $(document).on('click', '.removeContact', function(){  
		var id=$(this).parents("tr").attr("id");
		//alert(id);
		if(confirm('Are you sure to remove this record ?'))
		{
			$.ajax({
						url: 'removeContactR.php',
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
								title: 'Contact Request Deleted',
								text:'Contact Request permanently ...!!',
								customClass: 'animated tada',
								showConfirmButton: false,
								timer: 3000
							});
							setTimeout(function() { redirect(); }, 2000);
						}
			});
		}
	});
    $(document).on('click', '.removedContacts', function()
	{  
		$.ajax({  
				url:"selectRemovedContact.php",  
				method:"POST",  
				success:function(data)
				{  
					$('#reproduct_detail').html(data);  
					$('#viewremoveContactModal').modal('show');  
				}            
	    });
	});
    $(document).on('click', '.replyContact', function(){  
		var contact_id = $(this).attr("id");
        //alert(contact_id);
			$.ajax({
			url:"fetchContactDetail.php",  
			method:"POST",  
			data:{contact_id:contact_id},  
			dataType:"json",  
			success:function(data)
			{  
				$('#fullName').text(data.contact_name);
				$('#email').text(data.contact_email);
				$('#dealership').text(data.contact_dealership);
				$('#topic').text(data.contact_topic);
				$('#message').text(data.contact_message);
				$('#contact_id').val(data.contact_ID);
            }
    	});
	});
	$('#replyTo').on('submit',function(){
		event.preventDefault();
		$.ajax({  
            url:"replyContact.php",  
            method:"POST",  
            data:$('#replyTo').serialize(),  
            beforeSend:function(){  
                $('#Reply').val("Updating..");  
            },  
            success:function(data)
			{  
                $('#replyTo')[0].reset();  
                $('#replyContactModal').modal('hide');  
              	$('#news_table').html(data);
				Swal.fire({
					position: 'center',
					type: 'success',
					showCloseButton: true,
					title: 'Replied Successfully',
					customClass: 'animated tada',
					showConfirmButton: false,
					timer: 3000
				});
				setTimeout(function() { redirect(); }, 1000);
			}  
		});
	});
});