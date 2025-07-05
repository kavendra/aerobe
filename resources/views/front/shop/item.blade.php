@foreach($shops as $shop)
<div class="item">
	<div class="imgb">
		
			@if ($shop->image && file_exists(public_path('assets/uploads/shop/' . $shop->image)))
		        <img class="shop-image-box" src="{{ asset('assets/uploads/shop/'.$shop->image) }}" />
		    @else
		        <img class="shop-image-box" src="{{ asset('img/img-dummy.jpg') }}" />
		    @endif
	
	</div>
	<div class="textb">
		@if($shop->tag)
		<span class="tag-text">{{ $shop->tag->label }}</span>
		@endif
		<h3 class="aligncenter">{{ $shop->title }}</h3>
		<p class="aligncenter">{{ $shop->short_description }}</p>
		<div class="btm-row"><a href="javascript:void(0)" class="c-btn pop-o" data-type="request-p">Request for quotes</a></div>
	</div>
</div>
@endforeach
<style>
    .shop-image-box {
    width: 267px;
    height: 167px;
    overflow: hidden;
    border: 1px solid #ccc; /* Optional: adds a border */
    display: inline-block;
}

.shop-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image fills the box without distortion */
}
</style>