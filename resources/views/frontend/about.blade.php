@include('head')
    <!-- header Section Start -->
    @include('frontend.header')
    <!-- header Section End -->

    <!-- Inner Banner Section Start -->
    <section class="inrbannerSec" style="background-image: url(./assets/img/room-banner.png);">
        <div class="container">
            <div class="bnr_content">
                <h1>About Us</h1>
                <ul class="breadcrum">
                    <li><a href="{{Route ('home')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Inner Banner Section End -->

    <!-- Footer Section Start -->
    @include('frontend.footer')
    <!-- Footer Section End -->
@include('foot')