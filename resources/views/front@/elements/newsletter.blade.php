<form id="newslettertop-form">
@csrf
<div class="booklet">
   <div class="col">
      <img src="{{ asset('img/home/folder.svg') }}" />
      <p>Download our booklet</p>
      <a href="#" class="c-btn">Download Now</a>
   </div>
   <div class="col2">
      <img src="{{ asset('img/home/email.svg') }}" />
      <input type="text" class="input" placeholder="Subscribe to our newsletter" />
      <button class="c-btn">Subscribe</button>
   </div>
</div>
</form>