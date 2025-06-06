<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('pageTitle', 'Aerobe Consultants Private Limited')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('metaTitle', 'Luxemcar Consultants Private Limited')">
    <meta name="description" content="@yield('metaDescription', 'Luxemcar Consultants Private Limited')"/>
    <meta name="keywords" content="@yield('metaKeywords', 'Luxemcar Consultants Private Limited')/">
    <link rel="shortcut icon" href="{{ URL::asset('assets/uploads/websettings').'/'.$websettingInfo->site_favicon }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body>

    @include('layouts.header')

    @yield('content')
    
    @include('layouts.footer')
    
  <script>
    $(document).ready(function () {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            $('#send-us').addClass('disabled');
            $.ajax({
                url: '{{ route('contact-us.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#send-us').removeClass('disabled');
                    $('#success-msg').text(response.message).fadeIn();
                    $('.clear-form').val('');
                    setTimeout(function() {
                        $('#success-msg').fadeOut();
                    }, 3000); // 3 seconds
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    alert(Object.values(errors).join("\n"));
                }
            });
        });

        $('.term-content .rightcol .tab-nav li').click(function () {
            var target = $(this).data('target');
            var top = $(target).offset().top;

            // Scroll to the target section
            $('html, body').animate({
              scrollTop: top
            }, 500);

            // Add 'active' class to clicked tab, remove from others
            $('.term-content .rightcol .tab-nav li').removeClass('active');
            $(this).addClass('active');
        });
    });
  </script>

<script>
    $(document).ready(function () {
        $('.testimonials-slide').owlCarousel({
    items: 3,
    loop: false,
    autoplay: true,
    autoplayTimeout: 5000,
    dots: false,
    nav: true, // Enable navigation arrows
    navText: [
        '<span class="custom-prev"><i class="fa fa-chevron-left"></i> Previous</span>',
        '<span class="custom-next">Next <i class="fa fa-chevron-right"></i></span>'
    ],
    responsive: {
        0: {
            items: 1,
            dots: false,
            loop: true
        },
        600: {
            items: 3,
            dots: false,
            loop: true
        },
        1000: {
            items: 3
        }
    }
});
});
</script>
</body>
</html>