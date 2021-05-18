$(document).ready(function(){
    $(document).on('click', '.markFav', function(){  
                //var dealer_id = $(this).attr("id"); 
                    var car_id = $(this).attr("name");
                    var tmpuser_id=$(this).attr("id");
                    //alert(tmpuser_id);
                    $.ajax({  
                        url:"carFav.php",  
                        method:"POST",  
                        data:{car_id:car_id,tmpuser_id:tmpuser_id},  
                        success:function(data){
                             
                                Swal.fire({
                                    position: 'center',
                                    type: 'success',
                                    showCloseButton: true,
                                    title: 'Car Favourite',
                                    text:'Car marked as favourite',
                                    customClass: 'animated tada',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            setTimeout(function() { redirect(); }, 3000);
                        }  
                    });
    }); 
    $(document).on('click', '.unMarkFav', function(){  
                    var car_u_id = $(this).attr("name");
                    var buyer_u_id=$(this).attr("id");
                    //alert(car_u_id);
                 
                    $.ajax({  
                            url:"carNotFav.php",  
                            method:"POST",  
                            data:{car_u_id:car_u_id,buyer_u_id:buyer_u_id},  
                            success:function(data){
                             
                                Swal.fire({
                                    position: 'center',
                                    type: 'success',
                                    showCloseButton: true,
                                    title: 'Car Not Favourite',
                                    text:'Car unmarked as favourite',
                                    customClass: 'animated tada',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            
                            setTimeout(function() { redirect(); }, 3000);
                            }  
                        }); 
                    
                        
    });
});