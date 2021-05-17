$(document).ready(function(){
				//$("#messages").hide();
				$('#dataTables-example').DataTable
				({
					responsive: true
				});
				$('[data-toggle="tooltip"]').tooltip();
				function redirect(){
				location= "Help.php";
				}
				$(document).on('click', '.viewHelp', function()
				{  
					var help_id = $(this).attr("id");  
					   if(help_id != '')  
					   {  
							$.ajax({  
								 url:"selectHelp.php",  
								 method:"POST",  
								 data:{help_id:help_id},  
								 success:function(data){  
									  $('#help_detail').html(data);  
									  $('#viewHelpModal').modal('show');  
								 }  
							});  
					   }            
				});
				$('#reason').on('change',function(){
					$('#detailHelp').keyup(function(){
						var detailLength=$(this).val().length;
						if(detailLength>=15 && detailLength<201 && $('#reason').val()!='')
						{
							$('#btnSubmit').attr('disabled',false);
						}
						else
						{
							$('#btnSubmit').attr('disabled',true);
						}
					});
				});
				$('#detailHelp').keyup(function(){
					var detailLength=$(this).val().length;
					$('#reason').on('change',function(){
						
						if(detailLength>=15 && detailLength<201 && $('#reason').val()!='')
						{
							$('#btnSubmit').attr('disabled',false);
						}
						else
						{
							$('#btnSubmit').attr('disabled',true);
						}
					});
				});
				
				 $(".alert").delay(800).show(10, function() {
							$(this).delay(1500).hide(10, function() {
								$(this).remove();
								redirect();
								
							});
				});
			});