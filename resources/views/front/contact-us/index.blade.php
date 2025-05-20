@extends('layouts.app')
@section('content')
<div class="top-banner contact-banner">
    <img src="{{ asset('img/hero-contact.jpg') }}" alt=""/>
    <h1>Contact Us</h1>
    <p>Be in touch</p>
</div>

<div class="mid-section">
    <div class="contact-info">
        <div class="container">
            <div class="address">
                <ul>
                    <li>
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></div>
                        <div class="textb">
                            <p>Call Us Today</p>
                            @php($call_us_today = $prefix.'call_us_today')
                            <a href="tel:+91846579988">+{{ $contactPage->$call_us_today }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="icon"><svg fill="#3b82f6" height="174px" width="174px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-96.72 -96.72 486.53 486.53" xml:space="preserve" stroke="#3b82f6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M86.954,0H36.823c-8.425,0-15.279,6.853-15.279,15.277V277.81c0,8.424,6.854,15.277,15.279,15.277h50.131 c8.367,0,15.179-6.761,15.272-15.105V15.104C102.133,6.761,95.321,0,86.954,0z"></path> <path d="M257.364,15.104H113.545v262.878h143.819c7.818,0,14.18-6.361,14.18-14.18V29.285 C271.544,21.466,265.183,15.104,257.364,15.104z M134.561,31.104h96.033v53.552h-96.033V31.104z M151.134,231.324h-14.572 c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5 C158.634,227.96,155.27,231.324,151.134,231.324z M151.134,199.192h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5 h14.572c4.136,0,7.5,3.364,7.5,7.5C158.634,195.828,155.27,199.192,151.134,199.192z M151.134,167.061h-14.572 c-4.136,0-7.5-3.364-7.5-7.5s3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5S155.27,167.061,151.134,167.061z M151.134,134.929h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5 C158.634,131.564,155.27,134.929,151.134,134.929z M191.864,231.324h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5 h14.572c4.136,0,7.5,3.364,7.5,7.5C199.364,227.96,196,231.324,191.864,231.324z M191.864,199.192h-14.572 c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5 C199.364,195.828,196,199.192,191.864,199.192z M191.864,167.061h-14.572c-4.136,0-7.5-3.364-7.5-7.5s3.364-7.5,7.5-7.5h14.572 c4.136,0,7.5,3.364,7.5,7.5S196,167.061,191.864,167.061z M191.864,134.929h-14.572c-4.136,0-7.5-3.364-7.5-7.5 c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5C199.364,131.564,196,134.929,191.864,134.929z M232.595,231.324 h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5 C240.095,227.96,236.73,231.324,232.595,231.324z M232.595,199.192h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5 h14.572c4.136,0,7.5,3.364,7.5,7.5C240.095,195.828,236.73,199.192,232.595,199.192z M232.595,167.061h-14.572 c-4.136,0-7.5-3.364-7.5-7.5s3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5S236.73,167.061,232.595,167.061z M232.595,134.929h-14.572c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5h14.572c4.136,0,7.5,3.364,7.5,7.5 C240.095,131.564,236.73,134.929,232.595,134.929z"></path> </g> </g></svg></div>
                        <div class="textb">
                            <p>Call Us Today</p>
                            @php($call_us_today_landline = $prefix.'call_us_today_landline')
                            <a href="tel:+91846579988">+{{ $contactPage->$call_us_today_landline }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg></div>
                        <div class="textb">
                            <p>Email, Chat with Us</p>
                            @php($chat_with_us_email = $prefix.'chat_with_us_email')
                            <a href="mailto:{{ $contactPage->$chat_with_us_email }}">{{ $contactPage->$chat_with_us_email }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
                        <div class="textb">
                            <p>Tech Support</p>
                            @php($tech_support_email = $prefix.'tech_support_email')
                            <a href="mailto:{{ $contactPage->$tech_support_email }}">{{ $contactPage->$tech_support_email }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg></div>
                        <div class="textb">
                            <p>For Enquiry</p>
                            @php($enquiry_email = $prefix.'enquiry_email')
                            <a href="mailto:{{ $contactPage->$enquiry_email }}">{{ $contactPage->$enquiry_email }}</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="get-in-touch-c" style="display: block;">
                @if(session('success'))
                <div style="color: green;">
                  {{ session('success') }}
                </div>
                @endif
                <h3>Get in <span>Touch</span></h3>
                <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
                <form method="post" action="{{ route('contact-us.store') }}">
                @csrf
                    <input type="text" name="name" class="input" placeholder="Name*" required>
                    <input type="email" name="email" class="input" placeholder="Email" required>
                    <input type="text" name="phone" class="input" placeholder="Phone Number*" required>
                    <textarea class="textarea" name="message" placeholder="Product info request" required></textarea>
                    <button class="c-btn" type="submit">Send To Us</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="address-column">
        <div class="container">
            <div class="inner-box">
            <div class="textb">
                @php($company_name = $prefix.'company_name')
                @php($lat = $prefix.'latitude')
                @php($long = $prefix.'longitude')
                <h3>{{ $contactPage->$company_name }}</h3>
                <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
                
                <div class="address">
                    <h5>ADDRESS</h5>
                    @php($company_address = $prefix.'company_address')
                    <p>{!! $contactPage->$company_address !!}</p>
                </div>
            </div>
            <div class="map">
                <?php
                $company = $contactPage->$company_name;
                $latitude = $contactPage->$lat ?? "28.54829227571093";
                $longitude = $contactPage->$long ?? "77.24895817665201";

                // URL encode the company name for use in a URL
                $encoded_company_name = urlencode($company);
                $encoded_company_address = urlencode($contactPage->$company_address);

                if($prefix == 'in_') {
                    $map_src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.7147552670667!2d77.24895817665201!3d28.54829227571093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3b1f6b1acf9%3A0xaf024fe40440e7!2sAerobe%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1742809436116!5m2!1sen!2sin";
                }else{
                    $map_src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q={{$encoded_company_address}}&zoom=10&maptype=roadmap";
                }
                ?>
                <!-- Output the iframe -->
                <iframe title="<?= htmlspecialchars($company) ?>"
                        src="<?= htmlspecialchars($map_src) ?>"
                        width="600"
                        height="450"
                        style="border:0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        </div>
    </div>
    @include('front.elements.location', ['cls'=>'bg-white'])
</div>
@endsection