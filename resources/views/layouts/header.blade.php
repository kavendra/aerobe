<div class="header-wrap">
  <div class="header-top">
    <div class="container">
      <div class="top-nav">
        <ul>
          @foreach($topMenus as $topMenu)
          <li><a href="{{ $topMenu->link }}">{{ $topMenu->label ?? '' }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="social">
        <ul>
           @if($websettingInfo->facebook_url)
           <li>
            <a href="{{ $websettingInfo->facebook_url }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
           @endif
           @if($websettingInfo->instagram_url)
           <li><a href="{{ $websettingInfo->instagram_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg></a></li>
           @endif
           @if($websettingInfo->twitter_url)
          <li><a href="{{ $websettingInfo->twitter_url }}"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48"><path fill="#52cccc" d="M6.75,38.25V9.75c1.172-1.172,1.828-1.828,3-3h28.5c1.172,1.172,1.828,1.828,3,3v28.5  c-1.172,1.172-1.828,1.828-3,3H9.75C8.578,40.078,7.922,39.422,6.75,38.25z" opacity=".15"></path><path fill="#52cccc" d="M42.5,16V9.232L38.768,5.5H32l-1,1H17l-1-1H9.232L5.5,9.232V16l1,1v14l-1,1v6.768L9.232,42.5H16l1-1 h14l1,1h6.768l3.732-3.732V32l-1-1V17L42.5,16z M7,38.146V9.854L9.854,7h28.293L41,9.854v28.293L38.146,41H9.854L7,38.146z"></path><path fill="#52cccc" d="M11.241,10h-0.5V8h0.5V10z M12.48,8h-0.5v2h0.5V8z M13.719,8h-0.5v2h0.5V8z M14.958,8 h-0.5v2h0.5V8z M16.197,8h-0.5v2h0.5V8z M17.436,8h-0.5v2h0.5V8z M18.675,8h-0.5v2h0.5V8z M19.914,8h-0.5v2h0.5V8z M21.152,8h-0.5v2 h0.5V8z M22.392,8h-0.5v2h0.5V8z M23.631,8h-0.5v2h0.5V8z M24.869,8h-0.5v2h0.5V8z M26.108,8h-0.5v2h0.5V8z M27.348,8h-0.5v2h0.5V8z M28.586,8h-0.5v2h0.5V8z M29.825,8h-0.5v2h0.5V8z M31.064,8h-0.5v2h0.5V8z M32.303,8h-0.5v2h0.5V8z M33.542,8h-0.5v2h0.5V8z M34.781,8h-0.5v2h0.5V8z M36.02,8h-0.5v2h0.5V8z M37.259,8h-0.5v2h0.5V8z M40.104,8.25L39.75,7.896L37.896,9.75l0.354,0.354 L40.104,8.25z M40,10.741h-2v0.5h2V10.741z M40,11.98h-2v0.5h2V11.98z M40,13.219h-2v0.5h2V13.219z M40,14.458h-2v0.5h2V14.458z M40,15.697h-2v0.5h2V15.697z M40,16.936h-2v0.5h2V16.936z M40,18.175h-2v0.5h2V18.175z M40,19.414h-2v0.5h2V19.414z M40,20.652h-2 v0.5h2V20.652z M40,21.892h-2v0.5h2V21.892z M40,23.131h-2v0.5h2V23.131z M40,24.369h-2v0.5h2V24.369z M40,25.608h-2v0.5h2V25.608z M40,26.848h-2v0.5h2V26.848z M40,28.086h-2v0.5h2V28.086z M40,29.325h-2v0.5h2V29.325z M40,30.564h-2v0.5h2V30.564z M40,31.803h-2  v0.5h2V31.803z M40,33.042h-2v0.5h2V33.042z M40,34.281h-2v0.5h2V34.281z M40,35.52h-2v0.5h2V35.52z M40,36.759h-2v0.5h2V36.759z M40.104,39.75l-1.854-1.854l-0.354,0.354l1.854,1.854L40.104,39.75z M37.259,38h-0.5v2h0.5V38z M36.02,38h-0.5v2h0.5V38z M34.781,38h-0.5v2h0.5V38z M33.542,38h-0.5v2h0.5V38z M32.303,38h-0.5v2h0.5V38z M31.064,38h-0.5v2h0.5V38z M29.825,38h-0.5v2h0.5 V38z M28.586,38h-0.5v2h0.5V38z M27.348,38h-0.5v2h0.5V38z M26.108,38h-0.5v2h0.5V38z M24.869,38h-0.5v2h0.5V38z M23.631,38h-0.5v2  h0.5V38z M22.392,38h-0.5v2h0.5V38z M21.152,38h-0.5v2h0.5V38z M19.914,38h-0.5v2h0.5V38z M18.675,38h-0.5v2h0.5V38z M17.436,38 h-0.5v2h0.5V38z M16.197,38h-0.5v2h0.5V38z M14.958,38h-0.5v2h0.5V38z M13.719,38h-0.5v2h0.5V38z M12.48,38h-0.5v2h0.5V38z M11.241,38h-0.5v2h0.5V38z M10.104,38.25L9.75,37.896L7.896,39.75l0.354,0.354L10.104,38.25z M10,36.759H8v0.5h2V36.759z M10,35.52 H8v0.5h2V35.52z M10,34.281H8v0.5h2V34.281z M10,33.042H8v0.5h2V33.042z M10,31.803H8v0.5h2V31.803z M10,30.564H8v0.5h2V30.564z M10,29.325H8v0.5h2V29.325z M10,28.086H8v0.5h2V28.086z M10,26.848H8v0.5h2V26.848z M10,25.608H8v0.5h2V25.608z M10,24.369H8v0.5h2  V24.369z M10,23.131H8v0.5h2V23.131z M10,21.892H8v0.5h2V21.892z M10,20.652H8v0.5h2V20.652z M10,19.414H8v0.5h2V19.414z M10,18.175 H8v0.5h2V18.175z M10,16.936H8v0.5h2V16.936z M10,15.697H8v0.5h2V15.697z M10,14.458H8v0.5h2V14.458z M10,13.219H8v0.5h2V13.219z M10,11.98H8v0.5h2V11.98z M10,10.741H8v0.5h2V10.741z M10.104,9.75L8.25,7.896L7.896,8.25l1.854,1.854L10.104,9.75z" opacity=".8"></path><path fill="#52cccc" d="M25.97,22.416L31.447,16H29.35l-4.326,5.056L21.492,16h-6.16l6.306,9.013L15.658,32  h2.133l4.802-5.626L26.526,32h6.142L25.97,22.416z M18.314,17.581h2.379l9.01,12.838h-2.395L18.314,17.581z" opacity=".8"></path><rect width="26" height="26" x="11" y="11" fill="none" stroke="#52cccc" stroke-miterlimit="10" stroke-width=".25"></rect></svg></a></li>
          @endif
          @if($websettingInfo->linkedin_url)
          <li><a href="{{ $websettingInfo->linkedin_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
          @endif
          @if($websettingInfo->youtube_url)
          <li><a href="{{ $websettingInfo->youtube_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg></a></li>
          @endif
        </ul>
      </div>
      <div class="global">
        <div class="g-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg> <span>{{ $countryName }}</span> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

          <div class="global-menu">
            <ul>
              <li><a href="{{ url('set-country') }}?country=Global" @if($countryName === 'Global') style="background-color: #CFCFCF" @endif>Global</a></li>
              @foreach($countries as $country)
              <li><a href="{{ url('set-country') }}?country={{$country->label}}" @if($countryName === $country->label) style="background-color: #CFCFCF" @endif>{{ \Illuminate\Support\Str::ucfirst(Str::lower($country->label)) }}</a></li>
              @endforeach
            </ul>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="header-btm">
  <div class="container">

    <div class="header-left">
      <div class="logo">
        <a href="{{ url('/') }}">
           @if ($websettingInfo->site_logo && file_exists(public_path('assets/uploads/websettings/' . $websettingInfo->site_logo)))
              <img src="{{ asset('assets/uploads/websettings/' . $websettingInfo->site_logo) }}" title="Site Logo" />
            @else
                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
        </a>
      </div>

      <div class="menu-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
      </div>

      <div class="m-div">
        <div class="nav-menu">
          <ul>
             @foreach($mainMenus as $mainMenu)
             @if($mainMenu->id === 1)
             <li><a href="javascript:void(0)">{{ $mainMenu->label }}</a>
             <div class="dd-menu" id="dd-portofolio">
              <div class="left-menu">
                <ul>
                   @foreach($categories as $category)
                  <li class="{{ ($loop->first) ? 'active' : '' }}"><a href="javascript:void(0)" data-type="#{{ $category->label }}">{{ $category->label }}</a></li>
                  @endforeach
                </ul>
              </div>
               @foreach($categories as $category)
              <div class="right-content {{ ($loop->first) ? 'active' : '' }}" id="{{ $category->label }}">
             @php
               $portfolioCount = 0;
             @endphp
             <div class="col">
             <ul>
                @foreach($category->ourPortfolios as $portfolio)
                    @if($portfolioCount > 0 && $portfolioCount % 6 == 0)
                      </ul>
                    </div>
                    <div class="col">
                      <ul>
                    @endif
                    <li>
                      <a href="javascript:void(0)" data-cat="{{ $category->label }}" data-heading="{{ $portfolio->title }}" data-paragraph="{{ $portfolio->short_description }}" data-type="portfolio">
                        {{ $portfolio->title }}
                      </a>
                    </li>
                    <div class="img" style="display: none">
                       @if ($portfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $portfolio->image)))
                         <img src="{{ asset('assets/uploads/our-portfolios/' . $portfolio->image) }}" title="Site Logo" />
                       @else
                         <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120" data-holder-rendered="true" />
                       @endif
                    </div>

                    @php
                      $portfolioCount++;
                    @endphp
                @endforeach
                  </ul>
                </div>
                <div class="col">
                   <div id="{{$category->label}}-portfolio-img"></div>
                   <div class="textb">
                      <h3></h3>
                      <p></p>
                   </div>
                </div>
              </div>
              @endforeach
            </div>
            </li>
            @elseif($mainMenu->id === 2)
            <li><a href="javascript:;">{{ $mainMenu->label }}</a>
             <div class="dd-menu">
              <div class="left-menu">
                <ul>
                  @foreach($categories as $category)
                  <li class="{{ ($loop->first) ? 'active' : '' }}"><a href="javascript:void(0)" data-type="#sol-{{ $category->label }}">{{ $category->label }}</a></li>
                  @endforeach
                </ul>
              </div>
              @foreach($categories as $category)
              <div class="right-content solution-category {{ ($loop->first) ? 'active' : '' }}" id="sol-{{ $category->label }}">
                   @php
               $solutionCount = 0;
             @endphp
             <div class="col">
             <ul>
                @foreach($category->solutions as $solution)
                    @if($solutionCount > 0 && $solutionCount % 6 == 0)
                      </ul>
                    </div>
                    <div class="col">
                      <ul>
                    @endif
                    <li>
                      <a href="javascript:void(0)" data-cat="{{ $category->label }}" data-heading="{{ $solution->title }}" data-paragraph="{{ $solution->short_description }}" data-type="solution">
                        {{ $solution->title }}
                      </a>
                    </li>
                    <div class="sol-img" style="display: none">
                       @if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . $solution->image)))
                         <img src="{{ asset('assets/uploads/solutions/' . $solution->image) }}" title="Site Logo" />
                       @else
                         <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120" data-holder-rendered="true" />
                       @endif
                    </div>

                    @php
                      $solutionCount++;
                    @endphp
                @endforeach
                  </ul>
                </div>
                <div class="col">
                   <div id="{{$category->label}}-solution-img"></div>
                   <div class="textb">
                      <h3></h3>
                      <p></p>
                   </div>
                </div>
              </div>
              @endforeach
            </div>
            </li>
            @else
            <li><a href="{{ $mainMenu->link }}" >{{ $mainMenu->label }}</a></li>
            @endif
            @endforeach
          </ul>
        </div>
      

        <div class="header-right">
          <div class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer hover:text-primary transition-colors"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
            <div class="search-p">
              <h3>Search</h3>
              <input type="text" placeholder="Type to search...." class="input">
            </div>
          </div>

          <div class="connect-box">
            <div class="connect-with">Connect with us <i class="fa fa-angle-down" aria-hidden="true"></i></div>
            <div class="get-in-touch">
              <h3>Get in <span>Touch</span></h3>
              <p style="padding-bottom:2px; color: green;" id="success-msg"></p>
              <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
              <form id="contactForm">
              @csrf
                <input type="text" name="name" class="input" placeholder="Name*" required>
                <input type="text" name="email" class="input" placeholder="Email" required>
                <input type="text" name="phone" class="input" placeholder="Phone Number*" required>
                <textarea class="textarea" name="message" placeholder="Product info request" required></textarea>
                <button class="c-btn" type="submit" id="send-us">Send To Us</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>