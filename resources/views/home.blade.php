@include('head')
    
    <!-- header Section Start -->
    @include('header')
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

    <!-- Rooms Section Start -->
    <section class="roomSec">
        <div class="container">
            <div class="center_heading">
                <h2>Our Rooms</h2>
                <h3>Our Premium Rooms</h3>
            </div>
            <div class="owl-carousel owl-theme rooms-slider">
                <div class="item">
                    <div class="thumb_img">
                        <img src="./assets/img/room-1.png" alt="room-1">
                    </div>
                    <div class="item_content mt-4">
                        <div class="review mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h4>Deluxe Room</h4>
                        <p>4 Day, 5 Nights start from <span>₹ 300</span></p>
                        <a href="#" class="larger-btn">Book Now</a>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb_img">
                        <img src="./assets/img/room-2.png" alt="room-2">
                    </div>
                    <div class="item_content mt-4">
                        <div class="review mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <h4>Regular Room</h4>
                        <p>5 Day, 2 Nights start from <span>₹ 200</span></p>
                        <a href="#" class="larger-btn">Book Now</a>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb_img">
                        <img src="./assets/img/room-3.png" alt="room-3">
                    </div>
                    <div class="item_content mt-4">
                        <div class="review mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h4>Couple Room</h4>
                        <p>7 Day, 5 Nights start from <span>₹ 1200</span></p>
                        <a href="#" class="larger-btn">Book Now</a>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb_img">
                        <img src="./assets/img/room-4.png" alt="room-4">
                    </div>
                    <div class="item_content mt-4">
                        <div class="review mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h4>Special Room</h4>
                        <p>7 Day, 5 Nights start from <span>₹ 1200</span></p>
                        <a href="#" class="larger-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Start -->
    @include('footer')
    <!-- Footer Section End -->

@include('foot')


    