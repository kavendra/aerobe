<div class="inner-box">
    <div class="textb">
        @php($pre = $country->prefix)
        @php($company_name = $pre.'company_name')
        @php($lat = $pre.'latitude')
        @php($long = $pre.'longitude')
        <h3>{{ $contactPage->$company_name }}</h3>
        <!--<p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>-->
        
        <div class="address">
            <h5>ADDRESS</h5>
            @php($company_address = $pre.'company_address')
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
        $encoded_company_address = urlencode(strip_tags($contactPage->$company_address));
        # dd(strip_tags($contactPage->$company_address));
        if($pre == 'in_') {
            $map_src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.7147552670667!2d77.24895817665201!3d28.54829227571093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3b1f6b1acf9%3A0xaf024fe40440e7!2sAerobe%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1742809436116!5m2!1sen!2sin";
        }else{
            $map_src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q={{$encoded_company_address}}&zoom=8&maptype=roadmap";
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