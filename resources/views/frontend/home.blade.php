@include('head')
    <!-- header Section Start -->
    @include('frontend.header')
    <!-- header Section End -->

    <!-- Banner Section Start -->
    <section class="bannerSec">
        <div class="container">
            <div class="bnr_content">
                <h1>Wel Come to Our Paradise</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Voluptatibus itaque non, aspernatur delectus excepturi libero odit? 
                    Recusandae alias facilis architecto!
                </p>
                <a href="#" class="larger-btn">Visit Us</a>
            </div>
            
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Booking Form Section Start -->
    <section class="bookingSec">
        <div class="container">
            <div class="row_wrap">
                <form>
                    <div class="col_items">
                        <label for="Location">Choose Location</label>
                        <select class="form-select shadow-none" id="Location">
                            <option selected>Select Location</option>
                            <option value="delhi">Delhi</option>
                            <option value="kolkata">Kolkata</option>
                            <option value="mumbai">Mumbai</option>
                        </select>
                    </div>
                    <div class="col_items">
                        <label for="CheckIn">Check In</label>
                        <input type="date" class="form-control shadow-none" id="CheckIn">
                    </div>
                    <div class="col_items">
                        <label for="CheckOut">Check Out</label>
                        <input type="date" class="form-control shadow-none" id="CheckOut">
                    </div>
                    <div class="col_items">
                        <input type="submit" class="form-control shadow-none larger-btn" value="Check Availability">
                    </div>
                    
                </form>
                
                
            </div>
        </div>
    </section>
    <!-- Booking Form Section End -->

    <!-- Rooms Section Luxury Start -->
    <section class="roomSec">
        <div class="container">
            <div class="center_heading">
                <h2>Our Rooms</h2>
                <h3>Our Luxury Rooms</h3>
            </div>
            <div class="owl-carousel owl-theme rooms-slider">
            @if ($luxuryRooms ->isNotEmpty())
                @foreach ($luxuryRooms as $luxuryRoom)
                <div class="item">
                    <div class="thumb_img">
                    @if ($luxuryRoom->hotel_image)
                        <img src="{{asset('admin/uploads/rooms/'.$luxuryRoom->hotel_image)}}" alt="room-1">
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
                        <h5>{{$luxuryRoom->hotel_name}}</h5>
                        <p>{{$luxuryRoom->room_excerpt}} - <span>₹ {{$luxuryRoom->room_price}}</span></p>
                        <a href="#" class="larger-btn">Book Now</a>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </section>
    <!-- Rooms Section Luxury End -->



    <!-- Footer Section Start -->
    @include('frontend.footer')
    <!-- Footer Section End -->
@include('foot')


    