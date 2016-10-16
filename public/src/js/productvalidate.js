$("#confirmProduct").submit(function(event) {
	$("#productDeleteModal").modal();
    event.preventDefault();
    $('#delete_product_value').click(function(){
		var getval = $('#delete_product_value').val();
	    if(getval = "ok"){
	    	//alert(getval);
	    $('#confirmProduct').unbind('submit').submit();	
	    }
    });
});