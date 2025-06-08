@extends('layouts.app')

@section('content')
<div class="mid-section">
  <div class="container">
    <div class="pdf-continer">
        <div class="title-top">
        <h2>Download</h2>
        </div>
        <div class="pdf-section">
          <ul>
            @foreach($downloads as $download)
            <li class="pop-o2" data-type="request-p" data-downloadid="{{ $download->id }}"><img src="{{ asset('img/icon-pdf.jpg') }}"><h3>{{ $download->label }}</h3></li>
            @endforeach
          </ul>
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
  </div>
</div>
@endsection
