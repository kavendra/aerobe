<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('pageTitle', 'Luxemcar Consultants Private Limited')</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    @include('layouts.header')

    @yield('content')
    
    @include('layouts.footer')
    
  <script>
    $(document).ready(function () {
        $('#newsletter-form').on('submit', function (e) {
            e.preventDefault();
            let email = $('#email').val();
            let token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ route('newsletter.subscribe') }}',
                type: 'POST',
                data: {
                    _token: token,
                    email: email
                },
                success: function (response) {
                    $('#response-message').html('<p style="color: green;">' + response.success + '</p>');
                    $('#newsletter-form')[0].reset();
                },
                error: function (xhr) {
                    let error = xhr.responseJSON.errors.email[0];
                    $('#response-message').html('<p style="color: red;">' + error + '</p>');
                }
            });
        });
    });
  </script>
</body>
</html>