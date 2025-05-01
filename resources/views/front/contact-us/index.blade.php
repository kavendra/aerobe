@extends('layouts.app')
@section('content')
<div class="top-banner contact-banner">
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
                <h3>Get in <span>Touch</span></h3>
                <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
                <form>
                    <input type="text" class="input" placeholder="Name*">
                    <input type="text" class="input" placeholder="Email">
                    <input type="text" class="input" placeholder="Phone Number*">
                    <textarea class="textarea" placeholder="Product info request"></textarea>
                    <button class="c-btn">Send To Us</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="address-column">
        <div class="container">
            <div class="inner-box">
            <div class="textb">
                @php($company_name = $prefix.'company_name')
                <h3>{{ $contactPage->$company_name }}</h3>
                <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
                
                <div class="address">
                    <h5>ADDRESS</h5>
                    @php($company_address = $prefix.'company_address')
                    <p>{!! $contactPage->$company_address !!}</p>
                </div>
            </div>
            <div class="map">
                <iframe title="Aerobe PVT LTD" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.7147552670667!2d77.24895817665201!3d28.54829227571093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3b1f6b1acf9%3A0xaf024fe40440e7!2sAerobe%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1742809436116!5m2!1sen!2sin" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </div>
    </div>
    @include('front.elements.location')
</div>
@endsection