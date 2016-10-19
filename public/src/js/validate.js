function getCatId(id){
    //alert(id);
      $("#confirmCategory").modal();
      $("#delete_button_value").click(function(){
        var delbuttonval = $("#delete_button_value").val();
        if(delbuttonval = "true"){
          $("#"+id).submit();
        }
      });
      return false;
    }



/*$('#category_delete').click(function(){
	$("#confirmCategory").modal();
	$('#category_delete').submit(function(e){
	     e.preventDefault(e);
	     $('#delete_button_value').click(function(){
	     	var getvalue = $('#delete_button_value').val();
	     	if(getvalue = "true"){
	     		$('#category_delete').unbind('submit').submit();
	     	}
	     });
    });	
});*/