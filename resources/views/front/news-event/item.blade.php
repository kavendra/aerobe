@foreach($newsAndEvents as $newsAndEvent)
	<div class="item">
		<div class="imgb">
			<a href="{{ route('news-event.show', $newsAndEvent) }}" target="_blank">
				@if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->image)))
	                <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->image) }}" />
	            @else
	                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
	            @endif
        	</a>
		</div>
		<div class="textb">
			@if($newsAndEvent->tag)
            <span class="tag-text">{{ $newsAndEvent->tag->label ?? '' }}</span>
            @endif
			<h3><a href="{{ route('news-event.show', $newsAndEvent) }}" target="_blank">{{ $newsAndEvent->title ?? '' }}</a></h3>
			<p>{{ $newsAndEvent->short_description ?? '' }}</p>
			<!--<div class="review">-->
			<!--	<a href="{{ route('news-event.show', $newsAndEvent) }}" target="_blank">Read More</a>-->
			<!--</div>-->
			<div class="user-info">
				<p>{{ $newsAndEvent->event_date }}</p>
			</div>
		</div>
	</div>
@endforeach
@if($newsAndEvents->lastPage() > 1)
<div class="pagination">
	<ul>
	    @for ($i = 1; $i <= $newsAndEvents->lastPage(); $i++)
	        <li class="page-item {{ $newsAndEvents->currentPage() == $i ? 'active' : '' }}">
	            <a class="page-link" href="{{ $newsAndEvents->url($i) }}">{{ $i }}</a>
	        </li>
	    @endfor
	</ul>
</div>
@endif