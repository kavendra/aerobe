@if(isset($downloads))
   @foreach($downloads as $download)
    <div class="item" style="text-align:center;">
    	<div class="imgb">
    		<a href="javascript:void(0);" class="pop-o2" data-type="request-p" data-downloadid="{{ $download->id }}">
              <img src="https://vslaravel.online/img/icon-pdf.jpg">
            </a>
    	</div>
    	<div class="textb">
    		<h3 class="aligncenter">{{ $download->label }}</h3>
    	</div>
    </div>
@endforeach
@endif