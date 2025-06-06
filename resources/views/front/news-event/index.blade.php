@extends('layouts.app')
@section('content')
<div class="top-banner news">
		 @if ($newsEventPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $newsEventPage->banner_image)))
            <img src="{{ asset('assets/uploads/cms-pages/'.$newsEventPage->banner_image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
<div class="textb2">
	<div class="container">
	<h2>{{ $newsEventPage->banner_title }}</h2>
	<p>{!! $newsEventPage->banner_desc !!}</p>
	</div>
</div>
</div>

<div class="mid-section">

	<div class="news-events">
		<div class="container">
			<div class="title">
				<h3>News And Events</h3>
				<!--<span>Ideas for better days</span>-->
			</div>
			<div class="news-slider">
				@foreach($featuredNewsAndEvents as $featuredNewsAndEvent)
				<div class="col">
					@if($featuredNewsAndEvent->tag)
                    <div class="tag">
						<span class="tag-text">{{ $featuredNewsAndEvent->tag->label ?? '' }}</span>
					</div>
                    @endif
					<h3>{{ $featuredNewsAndEvent->title ?? '' }}</h3>
					<!--<div class="view">-->
					<!--	<span><img src="{{ asset('assets/images/icon-view.jpg') }}" alt="" /> 9,156</span>-->
					<!--	<img src="{{ asset('assets/images/dot2.jpg') }}" alt="" />-->
					<!--	<span><img src="{{ asset('assets/images/icon-watch.jpg') }}" alt="" /> 6.45 min</span>-->
					<!--</div>-->
					<div class="date">{{ $featuredNewsAndEvent->event_date }}</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	
	<div class="latest-post news-events2">
		<div class="container">
			<div class="title">
				<h3>News And Events</h3>
				<span>Ideas for better days</span>
			</div>
			<div class="column">
				<div class="leftcol">
					<div class="post-count">
						<ul>
							@foreach($newsCategories as $newsCategory)
							<li><input type="checkbox" value="{{ $newsCategory->id }}" class="checkbox category-checkbox"> {{ $newsCategory->label }} <span> ({{ $newsCategory->newsAndEvents->count() }})</span></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="rightcol">
					<div class="items-container list-view" id="news-container" data-route="{{ route('news-event.index') }}">
						@include('front.news-event.item')
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