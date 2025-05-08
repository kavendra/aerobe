@extends('layouts.app')
@section('content')
<div class="top-banner news">
	<div class="textb2">
	<h2>News & Events</h2>
	<p>Who we are and what we do...</p>
</div>
</div>

<div class="mid-section">

	<div class="news-events">
		<div class="container">
			<div class="title">
				<h3>News And Events</h3>
				<span>Ideas for better days</span>
			</div>
			<div class="news-slider">
				@foreach($newsAndEvents as $newsAndEvent)
				<div class="col">
					@if($newsAndEvent->tag)
                    <div class="tag">
						<span class="tag-text">{{ $newsAndEvent->tag->label ?? '' }}</span>
					</div>
                    @endif
					<h3>{{ $newsAndEvent->title ?? '' }}</h3>
					<div class="view">
						<span><img src="{{ asset('assets/images/icon-view.jpg') }}" alt="" /> 9,156</span>
						<img src="{{ asset('assets/images/dot2.jpg') }}" alt="" />
						<span><img src="{{ asset('assets/images/icon-watch.jpg') }}" alt="" /> 6.45 min</span>
					</div>
					<div class="date">{{ $newsAndEvent->event_date }}</div>
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
							@foreach($categories as $category)
							<li><input type="checkbox" id="" name="" value="" class="checkbox"> {{ $category->label }} <span> ({{ $category->newsAndEvents->count() }})</span></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="rightcol">
					<div class="items-container list-view">
						@foreach($newsAndEvents as $newsAndEvent)
						<div class="item">
							<div class="imgb">
								@if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image)))
	                                <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->author_image) }}" />
	                            @else
	                                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
	                            @endif
								<div class="img-tag">Latest</div></div>
							<div class="textb">
								@if($newsAndEvent->tag)
		                        <span class="tag-text">{{ $newsAndEvent->tag->label ?? '' }}</span>
		                        @endif
								<h3><a href="#">{{ $newsAndEvent->title ?? '' }}</a></h3>
								<p>{{ $newsAndEvent->short_description ?? '' }}</p>
								<div class="review">
									<p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
									<a  href="#">Read More</a>
								</div>
								<div class="user-info">
									<div class="icon">
										@if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image)))
			                                 <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->author_image) }}" />
			                            @else
			                                 <img src="{{ asset('assets/images/no-image.png') }}" />
			                            @endif
									</div>
									<p><span> {{ $newsAndEvent->author_name ?? '' }} </span><img src="{{ asset('img/dot.jpg') }}" /> {{ $newsAndEvent->event_date }}</p>
								</div>
							</div>
						</div>
						@endforeach
					  </div>
					  <div class="pagination">
						<ul>
							<li class="active">1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
						</ul>
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