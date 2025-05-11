@foreach($shops as $shop)
<div class="item">
	<div class="imgb">
		@if ($shop->image && file_exists(public_path('assets/uploads/shop/' . $shop->image)))
	        <img src="{{ asset('assets/uploads/shop/'.$shop->image) }}" />
	    @else
	        <img src="{{ asset('img/img-dummy.jpg') }}" />
	    @endif
	</div>
	<div class="textb">
		@if($shop->tag)
		<span class="tag-text">{{ $shop->tag->label }}</span>
		@endif
		<h3><a href="#">{{ $shop->title }}</a></h3>
		<p>{{ $shop->short_description }}</p>
		<div class="btm-row"><a href="#" class="c-btn">Request for quotes</a></div>
	</div>
</div>
@endforeach