@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <h1>{{ $ourPortfolio->title }}</h1>
      <div class="full-img">
        @if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image)))
          <img src="{{ asset('assets/uploads/our-portfolios/'.$ourPortfolio->image) }}" />
      @else
          <img src="{{ asset('img/img-dummy.jpg') }}" />
      @endif
      </div>
      {!! $ourPortfolio->long_description !!}

      @include('front.our-portfolio.download')
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.slider-sec').owlCarousel({
            items: 4,
            dots: false,
            dotsEach: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            pagination: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4
                }
            }
        })


    
   $(".new-tab .top-nav2 li").click(function() {
  $(".tab-content-n, .new-tab .top-nav2 li").removeClass("active");
  $(this).addClass("active");
     var target = $(this).attr("data-type");
     $(target).addClass("active");
   });

    $('.pop-o2').click(function () {
    var curdata = "."+$(this).attr("data-type");
    let downloadid = $(this).attr("data-downloadid");
    $('#downloadid').val(downloadid);
    $(curdata).addClass("active");
  });

  $('.request-quotes .innerb .close-btn').click(function () {
    $('#donwload-response').empty();
   $(".request-quotes").removeClass("active");
  });


    });
</script>
@endsection