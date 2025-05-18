@extends('layouts.app')
@section('content')
<div class="top-banner news">
	<div class="textb2">
	<h2>News & Events</h2>
	<p>Who we are and what we do...</p>
</div>
</div>

<div class="mid-section">	
	<div class="latest-post news-events2">
		<div class="container">
			<div class="title">
				<h3>News And Event Detail</h3>
				<span>Ideas for better days</span>
			</div>
			<div class="column">
				<div class="rightcol">
					<div class="items-container list-view" id="news-container">
						<div class="item">
							<div class="imgb">
								@if ($newsEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsEvent->author_image)))
					                <img src="{{ asset('assets/uploads/news-events/'.$newsEvent->author_image) }}" />
					            @else
					                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
					            @endif
							</div>
							<div class="textb">
								@if($newsEvent->tag)
					            <span class="tag-text">{{ $newsEvent->tag->label ?? '' }}</span>
					            @endif
								<h3>{{ $newsEvent->title ?? '' }}</h3>
								<p>{{ $newsEvent->short_description ?? '' }}</p>

								<div class="user-info">
									<p>{{ $newsEvent->event_date }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function () {
    $('.news-slider').owlCarousel({
        items: 4,
        dots: false,
        dotsEach: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        pagination: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
                loop: true,
            },
            600: {
                items: 3,
                dots: true,
                loop: true,
            },
            1000: {
                items: 4
            }
        }
    })
});
</script>
@endsection