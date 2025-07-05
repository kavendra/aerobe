@extends('layouts.app')

@section('content')
<div class="d-banner">
    <div class="container">
        <div class="textb">
            <h3>Download Aerobe PDF </h3>
            <h2>Resources</h2>
        </div>
        <div class="imgb"><img src="{{ asset('img/img-download-banner.png') }}"></div>
    </div>
</div>

<div class="mid-section">
    <div class="latest-post">
        <div class="container">
            <div class="title"><strong>{{ $total ?? 0 }}</strong> PDF Resources available to download </div><br>
            <div class="top-row" style="margin-bottom:10px;">
                <div class="left-tab">
                    <ul style="justify-content:left;">
                        <li style="width:auto;"><button type="button" class="btn academy-list active" data-target="viewall">All ({{ $total ?? 0 }})</button></li>
                        @foreach($categories as $category)
                            @if($category->downloads->count())
                                <li style="width:auto;"><button type="button" class="btn academy-list" data-category="{{ $category->id }}">{{ $category->label }} ({{ $category->downloads->count() }})</button></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div><br>

            <div class="shoplist" id="post-container">
                @foreach($downloads as $download)
                    @include('front.download.item', ['downloads' => [$download]])
                @endforeach
            </div>

            <div style="clar:both; width:100%;"></div>
            <div class="btn-row" style="width:100%; text-align:center">
                <button id="load-more" data-page="2" class="c-btn" data-load="1" @if($total < 10) style="display: none;" @endif>Load More</button>
            </div>
        </div>
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
                <button class="c-btn" type="submit" id="send-link">Send Link</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var sum = 0;
    $('.academy-count').each(function(){
       sum += parseFloat($(this).data('count'));  // Or this.innerHTML, this.innerText
    });

    $('#total-academy').html('All ('+sum+ ')');
    
    $('.academy-list').click(function() {
        $('.academy-list').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#load-more, .academy-list').click(function() {
        var button = $(this);
        let page = button.data('page') ?? 0;
        let activeCategory = $('.academy-list.active').data('category');
        $('#load-more').hide();
        $.ajax({
            url: '{{ route("download.index") }}',
            type: 'GET',
            data: { page: page, category_id:activeCategory },
            success: function(response) {
                if(response.total > 10){
                    $('#load-more').show();
                }
                if(!button.data('load')) {
                    $('#post-container').html(response.html);
                }else{
                    $('#post-container').append(response.html);
                    if (response.hasMorePages) {
                      button.data('page', response.nextPage).text('Load More');
                    } else {
                      $('#load-more').hide(); // No more pages
                    }
                }
            }
        });
    });
});
</script>
@endsection