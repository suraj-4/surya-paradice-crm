@include('head')
    <!-- header Section Start -->
    @include('frontend.header')
    <!-- header Section End -->

    <!-- Inner Banner Section Start -->
    <section class="inrbannerSec" style="background-image: url(./assets/img/room-banner.jpg);">
        <div class="container">
            <div class="bnr_content">
                <h1>Our Rooms</h1>
                <ul class="breadcrum">
                    <li><a href="{{Route ('home')}}">Home</a></li>
                    <li>Rooms</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Inner Banner Section End -->
     <!-- Rooms Section Start -->
    <section class="roomSec">
        <div class="container">
            <div class="row">
                @if ($rooms ->isNotEmpty())
                @foreach ($rooms as $room)
                <div class="col-md-4 col-sm-12">
                    <div class="item">
                        <div class="thumb_img">
                        @if ($room->hotel_image)
                        <img src="{{asset('admin/uploads/rooms/'.$room->hotel_image)}}" alt="room-1">
                        @else
                            <img src="../admin/assets/img/placeholder-img.png" alt="No-Image-found">                        @endif
                        </div>
                        <div class="item_content mt-4">
                            <div class="review mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <h5>{{$room->hotel_name}}</h5>
                            <p>{{$room->room_excerpt}} - <span>₹ {{$room->room_price}}</span></p>
                            <a href="#" class="larger-btn">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
          


    <!-- Footer Section Start -->
    @include('frontend.footer')
    <!-- Footer Section End -->
@include('foot')