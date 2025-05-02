@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="course">
    <div class="container">
      <div class="textb">
        <h4>Let's <strong>Begin</strong></h4>
        <h3>Let's Find The Right Course For you</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>Etiam dignissim, sem non convallis molestie.</p>
      </div>
      <div class="imgb">
        <img src="{{ asset('img/hero-academy.svg') }}" alt="" />
      </div>
    </div>
  </div>
  <div class="latest-post">
    <div class="container">
      <h2>Latest Post</h2>
      <div class="top-row">
        <div class="left-tab">
          <ul>
            <li><button type="button" class="btn active">All (71)</button></li>
            <li><button type="button" class="btn">News (25)</button></li>
            <li><button type="button" class="btn">Events (12)</button></li>
            <li><button type="button" class="btn">Publications (25)</button></li>
            <li><button type="button" class="btn">Product Updates (12)</button></li>
          </ul>
        </div>
        <div class="right-tab">
          <ul>
            <li class="active" id="gridBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><rect width="7" height="7" x="3" y="3" rx="1"></rect><rect width="7" height="7" x="14" y="3" rx="1"></rect><rect width="7" height="7" x="14" y="14" rx="1"></rect><rect width="7" height="7" x="3" y="14" rx="1"></rect></svg></li>
            <li id="listBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><line x1="8" x2="21" y1="6" y2="6"></line><line x1="8" x2="21" y1="12" y2="12"></line><line x1="8" x2="21" y1="18" y2="18"></line><line x1="3" x2="3.01" y1="6" y2="6"></line><line x1="3" x2="3.01" y1="12" y2="12"></line><line x1="3" x2="3.01" y1="18" y2="18"></line></svg></li>
          </ul>
        </div>
      </div>

      <div class="items-container grid-view">
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">Tecnology</span>
            <h3><a href="#"> THe Impact of technology on the Workplace: How Technology is changing</a></h3>
            <p>Explore how modern technology is revolutionizing workplace dynamics, communication methods, and productivity tools in the contemporary business environment.</p>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> Jason Francisco </span><img src="{{ asset('img/dot.jpg') }}" /> Feb 15, 2023</p>
            </div>
          </div>
        </div>
        
        </div>
        <div class="btn-row">
        <a href="#">View All Post</a>
        </div>
    </div>
  </div>

  <div class="upcoming-event">
    <div class="container">
      <div class="top-text">
        <h4>Available for you</h4>
        <h3>Upcoming Events</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>Etiam dignissim, sem non convallis molestie.</p>
      </div>
      <ul>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>HTML & CSS</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>Photographer</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>HTML & CSS</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>Photographer</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>HTML & CSS</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>Design Grafis</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>HTML & CSS</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li>
          <div class="imgb"><img src="{{ asset('img/placeholder.svg') }}" /><div class="img-tag">Best Course</div></div>
          <div class="textb">
            <div class="top-title">
              <h5>Design Grafis</h5>
              <a href="#">More Details</a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
      </ul>

      <div class="btn-row">
        <a href="#">See All</a>
        </div>
    </div>
  </div>
</div>
@endsection