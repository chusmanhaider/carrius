$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
	$('[data-toggle="tooltip"]').tooltip();
    function redirect(){
		location= "Teams.php";
	}
    $(document).on('click','.admin_dept_detail',function(){
		var dealer_id = $(this).attr("id");
		location= "admin_dept.php?url="+ dealer_id;
		//alert(location);
	});
    $(document).on('click','.finance_dept_detail',function(){
		var dealer_id = $(this).attr("id");
		location= "finance_dept.php?url="+ dealer_id;
		//alert(location);
	});
    $(document).on('click','.sales_dept_detail',function(){
		var dealer_id = $(this).attr("id");
		location= "sales_dept.php?url="+ dealer_id;
		//alert(location);
	});
    /*--------------- Administration Department--------------*/
    $(document).on('click','#addNewMemberBtn',function(){
        $('#memberName').val('');
        $('#designation').val('');
        $('#memberSinceD').val('');
		$('#status').val('');
    });
	
});