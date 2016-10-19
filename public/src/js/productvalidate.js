
function getProdctId(id){   
  $("#productDeleteModal").modal();
  $("#delete_product_value").click(function(){
    var delbuttonval = $("#delete_button_value").val();
    if(delbuttonval = "ok"){
      $("#"+id).submit();
    }
  });
	return false;
}
