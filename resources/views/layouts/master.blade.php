<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/app.css') }}">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	@yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">
	@include('partials.alert')
	@yield('content')
</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('src/js/checkout.js')}}"></script>
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

	jQuery(document).ready(function($) {

                  // Fixa navbar ao ultrapassa-lo
                  var navbar = $('#navbar-main'),
                    distance = navbar.offset().top,
                    $window = $(window);

                  $window.scroll(function() {
                    if ($window.scrollTop() >= distance) {
                      navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
                      $("body").css("padding-top", "70px");
                    } else {
                      navbar.removeClass('navbar-fixed-top');
                      $("body").css("padding-top", "0px");
                    }
                  });
                });
</script>
</body>
</html>