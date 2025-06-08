<div class="new-tab">
	<div class="top-nav2">
		<ul>
			<li data-type="#tab01" class="active">NEWS</li>
			<li data-type="#tab02">Downloads</li>
			<li data-type="#tab03">VIDeos</li>
		</ul>
	</div>
	<div class="tab-content-n active" id="tab01">
		<div class="slider-sec">
			@foreach($ourPortfolio->newsAndEvents as $newsAndEvent)
			<div class="col">
				@if ($newsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->image)))
	                <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->image) }}" />
	            @else
	                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
	            @endif
				<div class="textb">
					<h4>{{ \Illuminate\Support\Str::limit($newsAndEvent->title, 40) }}</h4>
					<p>{{ \Illuminate\Support\Str::limit($newsAndEvent->short_description, 100) }}</p>
					<a href="{{ route('news-event.show', $newsAndEvent->slug) }}" target="_blank">Read More</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="tab-content-n" id="tab02">
		<div class="pdf-section">
			<ul>
				@foreach($ourPortfolio->downloads as $download)
				<li class="pop-o2" data-type="request-p" data-downloadid="{{ $download->id }}"><img src="{{ asset('img/icon-pdf.jpg') }}"><h3>{{ $download->label }}</h3></li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="tab-content-n" id="tab03">
		<div class="pdf-section video-sec">
			<ul>
				@foreach($ourPortfolio->videos as $video)
					<li><iframe class="elementor-video" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay;"  width="640" height="360" src="{{ $video->url }}" id="widget6" ></iframe><h3>{{ $video->label }}</h3></li>
				@endforeach
			</ul>
		</div>
	</div>

	<div class="request-quotes request-p">
		<form id="send-attachment-form" style="margin-top: 0" action="{{ route('our-portfolio.send-attachment') }}">
        @csrf
        <input type="hidden" id="downloadid">
		<div class="innerb">
			<div id="donwload-response"></div>
			<div class="close-btn">
				<img src="{{ asset('img/close-btn.svg') }}" />
			</div>
			<div class="col-f">
				<label>Email Address</label>
				<input type="text" class="input" placeholder="example@company.com" id="attachment-email">
			</div>
			<div class="col-f">
				<button class="c-btn" type="submit">Send Link</button>
			</div>
		</div>
		</form>
	</div>
</div>