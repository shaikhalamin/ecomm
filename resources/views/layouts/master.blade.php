<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/app.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="{{ URL::to('src/js/validate.js')}}"></script>
  <script type="text/javascript" src="{{ URL::to('src/js/productvalidate.js')}}"></script>

@yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">
	@yield('content')
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('src/js/checkout.js')}}"></script>
<script type="text/javascript">
var searchres = {!!$products!!};
for (var j = 0; j < searchres.length; j++){
  var folderPath = '/uploads/products/images/';
  $(".thumbnail").removeClass("hidden");
  $(".imageShow").attr('src',folderPath+''+searchres[j].image);
  $("#title").html(searchres[j].title);
  $(".description").html(searchres[j].description);
  $(".price").html('$ '+ searchres[j].price);
  var id = searchres[j].id;
  var cartUrl = '/add-to-cart/';

  $("#addTocart").on("click",function(){
    $("#addTocart").attr('href','');
    $("#addTocart").attr('href',cartUrl+''+id);

  });
}

</script>

<script type="text/javascript">
	$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("200");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("200");
            $(this).toggleClass('open');       
        }
    );
});

</script>
</body>
</html>