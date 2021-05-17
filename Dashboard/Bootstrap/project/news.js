$(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
			$('[data-toggle="tooltip"]').tooltip();
			$('#errorTitle').hide();
			$('#upErrorTitle').hide();
			function redirect(){
				location= "News.php";
				}
				$(document).on('click', '.viewNews', function()
				{  
					var news_id = $(this).attr("id");  
					   if(news_id != '')  
					   {  
							$.ajax({  
								 url:"selectNews.php",  
								 method:"POST",  
								 data:{news_id:news_id},  
								 success:function(data){  
									  $('#news_detail').html(data);  
									  $('#viewNewsModal').modal('show');  
								 }  
							});  
					   }            
				}); 
				
				$(document).on('click', '.updateNews', function(){  
				var news_id = $(this).attr("id");  
				   $.ajax({  
						url:"fetchNews.php",  
						method:"POST",  
						data:{news_id:news_id},  
						dataType:"json",  
						success:function(data){  
							 $('#updatenewstitle').val(data.newsTitle);
							 $('#updatenewsdesc').val(data.newsDescription);
							 $('#updateNewsType').val(data.newsType);
							 $('#updateNewsPrio').val(data.newsPri);
							 $('#updateDateForNews').val(data.newsDate);
							 $('#updatePostedDate').val(data.currentDate);
							 $('#news_id').val(data.newsID);   
							 $('#updateNewsModal').modal('show');	
						}  
				   }); 
				});
				
				$('#update_form').on('submit',function(){
				event.preventDefault();
				$.ajax({  
                     url:"insertNews.php",  
                     method:"POST",  
                     data:$('#update_form').serialize(),  
                     beforeSend:function(){  
                          $('#updateNewsBtn').val("Updating..");  
                     },  
                     success:function(data){  
                          $('#update_form')[0].reset();  
                          $('#updateNewsModal').modal('hide');  
                          $('#news_table').html(data);
						  Swal.fire({
									  position: 'center',
									  type: 'success',
									  showCloseButton: true,
									  title: 'News has been updated',
									  customClass: 'animated tada',
									  showConfirmButton: false,
									  timer: 3000
							});
						  setTimeout(function() { redirect(); }, 2000);
						}  
					});
				});
				
				
				$('#newstitle').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				
				$('#newstitle').keyup(function(){
					var title=$(this).val();
					var titleLength=$(this).val().length;
					
					if(title == "") 
					{
						$("#errorTitle").html('<span class="text-danger">News title field is required</span>');
						$('#errorTitle').show();
						$('#createNewsBtn').attr('disabled',true);
					}	
					else 
					{
						//$("#errorTitle").html('<p class="text-danger">News title field is required</p>');
						$('#errorTitle').hide();
						$('#createNewsBtn').attr('disabled',false);
					}	

				});
				$('#newsDescription').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$('#updatenewstitle').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				
				$('#updatenewstitle').keyup(function(){
					var title=$(this).val();
					var titleLength=$(this).val().length;
					
					if(title == "") 
					{
						$("#upErrorTitle").html('<span class="text-danger">News title field is required</span>');
						$('#upErrorTitle').show();
						$('#updateNewsBtn').attr('disabled',true);
					}	
					else 
					{
						//$("#errorTitle").html('<p class="text-danger">News title field is required</p>');
						$('#upErrorTitle').hide();
						$('#updateNewsBtn').attr('disabled',false);
					}	

				});
				$('#updatenewsdesc').keypress(function(e){
					var k = e.which;
					var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k==45 || k==32 || k >= 48 && k <= 57 || k==44;
					if (!ok)
					{
						e.preventDefault();
					}
				});
				$(document).on('click', '.removeNews', function(){  
				var id = $(this).parents("tr").attr("id"); 
					if(confirm('Are you sure to remove this record ?'))
					{
						$.ajax({
							url: 'removeNews.php',
							type: 'POST',
							data: {id: id},
							error: function() 
							{
								alert('Something is wrong');
							},
							success: function(data) 
							{
								$("#"+id).remove();
								Swal.fire({
									position: 'center',
									type: 'warning',
									showCloseButton: true,
									title: 'News deleted',
									text:'News has been deleted permanently',
									customClass: 'animated tada',
									showConfirmButton: false,
									timer: 3000
								});
								setTimeout(function() { redirect(); }, 2000);
							}
						});
					}
				});
				
		});