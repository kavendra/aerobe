<!-- Footer -->
<div class="footer" >
   <div class="container">
      <div class="col">
         <div class="logo">
            <a href="{{ url('/') }}">
               @if ($websettingInfo->site_logo && file_exists(public_path('assets/uploads/websettings/' . $websettingInfo->site_logo)))
                  <img src="{{ asset('assets/uploads/websettings/' . $websettingInfo->site_logo) }}" alt="Aerobe Logo" />
                @else
                    <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                @endif
            </a>
         </div>
         <p>© 2025 Aerobe.<br/>  All rights reserved.</p>
      </div>
      <div class="col">
         <h5>Products & Resources</h5>
         <ul>
            @foreach($productsResourceMenus as $productsResourceMenu)
            <li>
              <a href="{{ $productsResourceMenu->link }}">{{ $productsResourceMenu->label }}</a>
            </li>
            @endforeach
         </ul>
      </div>
      <div class="col">
         <h5>Connect with us</h5>
         <ul>
            @foreach($connectWithUsMenus as $connectWithUsMenu)
            <li>
              <a href="{{ $connectWithUsMenu->link }}">{{ $connectWithUsMenu->label }}</a>
            </li>
            @endforeach
         </ul>
      </div>
      <div class="col">
         <h5>Legal Information
         </h5>
         <ul>
            @foreach($legalInformationMenus as $LegalInformationMenu)
            <li>
              <a href="{{ $LegalInformationMenu->link }}">{{ $LegalInformationMenu->label }}</a>
            </li>
            @endforeach
         </ul>
      </div>
      <div class="col">
         <h5>Our Newsletter</h5>
         <div class="newsletter-f">
            <p>Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div id="response-message"></div>
            <form id="newsletter-form" style="margin-top: 0" action="{{ route('newsletter.subscribe') }}">
              @csrf
               <input type="text" placeholder="Email Address" name="email" id="join-email" class="input" />
               <button class="c-btn">Join</button>
            </form>
         </div>
         <div class="social">
            <ul>
               @if($websettingInfo->facebook_url)
               <li><a href="{{ $websettingInfo->facebook_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
               @endif
               @if($websettingInfo->instagram1_url)
               <li><a href="{{ $websettingInfo->instagram1_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg></a></li>
               @endif
               @if($websettingInfo->twitter_url)
               <li><a href="{{ $websettingInfo->twitter_url }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 72 72" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M42.5,31.2L66,6h-6L39.8,27.6L24,6H4l24.6,33.6L4,66h6l21.3-22.8L48,66h20L42.5,31.2z M12.9,10h8l38.1,52h-8L12.9,10z"></path></svg></a></li>
               @endif
               @if($websettingInfo->linkedin_url)
               <li><a href="{{ $websettingInfo->linkedin_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
               @endif
               @if($websettingInfo->youtube_url)
               <li><a href="{{ $websettingInfo->youtube_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg></a></li>
               @endif
            </ul>
         </div>
      </div>
   </div>
</div>