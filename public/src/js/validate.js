$('.seach-form').click(function(){
	 $("#myModal").modal();


	 $('#delete_conform').click(function(){
	 	alert('ok');

	 });
	 //$('#myModal').appendTo("body").modal('show');

	//$('#myModal').on('shown.bs.modal', function (e) {
    	//alert('Modal is successfully shown!');
	//});

});

$('#category_delete').click(function(){
	$("#myModal").modal();
	$('#category_delete').submit(function(e){
      //alert('submit intercepted');
     e.preventDefault(e);
     $('#delete_button_value').click(function(){
     	var checkconform = $('#delete_button_value').val();
     	if(checkconform = "true"){
     		$('#category_delete').unbind('submit').submit();
     	}

     });


     });
	//$("#myModal").modal();

});