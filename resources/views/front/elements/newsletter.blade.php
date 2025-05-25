<form id="newslettertop-form" action="{{ route('newsletter.subscribe') }}">
@csrf
<div class="booklet">
   <div class="container">
      <div class="col">
         <img src="{{ asset('img/home/folder.svg') }}" />
         <p>Download our booklet</p>
         <a href="#" class="c-btn">Download Now</a>
      </div>
      <div class="col2">
         <img src="{{ asset('img/home/email.svg') }}" />
         <input type="text" class="input" placeholder="Subscribe to our newsletter" id="newsletter-email" />
         <button class="c-btn" type="submit">Subscribe</button><br>
      </div>
   </div>
</div>
</form>