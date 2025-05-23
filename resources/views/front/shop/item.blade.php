@foreach($shops as $shop)
<div class="item">
	<div class="imgb">
		<a href="{{ route('shop.show', $shop) }}" target="_blank">
			@if ($shop->image && file_exists(public_path('assets/uploads/shop/' . $shop->image)))
		        <img src="{{ asset('assets/uploads/shop/'.$shop->image) }}" />
		    @else
		        <img src="{{ asset('img/img-dummy.jpg') }}" />
		    @endif
		</a>
	</div>
	<div class="textb">
		@if($shop->tag)
		<span class="tag-text">{{ $shop->tag->label }}</span>
		@endif
		<h3><a href="{{ route('shop.show', $shop) }}" target="_blank">{{ $shop->title }}</a></h3>
		<p>{{ $shop->short_description }}</p>
		<div class="btm-row"><a href="javascript:void(0)" class="c-btn pop-o" data-type="request-p">Request for quotes</a></div>
	</div>
</div>
@endforeach