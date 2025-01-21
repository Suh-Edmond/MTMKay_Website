<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MTMKay IT Training & Technology Solutions') </title>

    @include('meta::manager', [
           'title'         => 'MTMKay Technology Training and IT Consulting Services, Microsoft Azure, Cisco Networking CCNA, CompTia + Security',
           'description'   => "MTMKay offers a unique blend of services tailored to the needs of our community. We provide IT consulting and managed services to help local businesses improve their technology infrastructure. We also specialize in cybersecurity, offering essential protections to keep companies secure and compliant in an increasingly digital world.One of MTMKay's core pillars is training and certification. We offer globally recognized IT certification courses—such as Microsoft Azure, Cisco CCNA, and CompTIA Security+",
           'geo_region'    => 'Alaska Street Buea Road, Kumba, Southwest Region, Cameroon',
           'keywords'      => 'IT Training and Certification, Technology, Microsoft Azure, Cloud, Cisco Networking, CCNA, CompTIA Security+, Security, Consulting, Database Administrator, Risk Management, Security Operations,Data Management, Azure Services, oNetworking Basics and Security Fundamentals,CyberSecurity,
           Infrastructure Design, Cloud Migration,Security Monitoring,Digital transformation.',
           'type'          => 'website',
           'image'         => asset('img/company/mtmkay_logo.png'),
           'site_name'     => 'MTMKay IT Training Center'

       ])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

</head>
<body>
@include('components.header')
<div class="min-h-screen">
    <main>
        {{ $slot }}
    </main>
</div>

@include('components.footer')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    var map = L.map('map').setView([4.628342802301623, 9.453579782474664], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 15,
        attribution: '&copy; <a href="https://www.mtmkay.com">MTMKay</a>'
    }).addTo(map);


    var marker = L.marker([4.628342802301623, 9.453579782474664]).addTo(map);

    marker.bindPopup(` <div>
                <p style="font-weight: bold">MTMKay IT Training & Technologies</p>
                <p style="font-weight: bold">Opposite Alaska Street Buea Road Kumba, Cameroon</p>
                <p> <span style="font-weight: bold">4.0 </span> <span style="color: gold">★★★☆</span> (70 reviews)</p>
                <a href="https://www.google.com/maps/dir/?api=1&destination=kumba,Cameroon" target="_blank">Directions</a>
            </div>`).openPopup();
</script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="js/counter.js"></script>
<script src="js/enrollment.js"></script>

</body>
</html>
