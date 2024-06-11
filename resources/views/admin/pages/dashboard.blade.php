@include('admin.header')
@section('title')
    Dashboard
@endsection

<div class="mainCont_wrapper">
    <!-- sidebar area Start -->
    @include('admin.sidebar')
    <!-- sidebar area End-->
    <!-- main body area Start -->
    <div class="main_body">
        <!-- header area Start -->
        @include('admin.head')
        <!-- header area End -->
        <!-- overview area Start -->
        <div class="overview_area">
          <div class="heading"><h1>Overview</h1></div>
            <div class="row my-3">
              <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card_wrap bg-primary">
                  <div class="icon_wrap">
                    <i class="bi bi-house"></i>
                  </div>
                  <div class="content_wrap">
                    <h3>Total Rooms</h3>
                    <h4>100</h4>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card_wrap bg-success">
                  <div class="icon_wrap">
                    <i class="bi bi-currency-rupee"></i>
                  </div>
                  <div class="content_wrap">
                    <h3>Total Earning</h3>
                    <h4>100</h4>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card_wrap bg-warning">
                  <div class="icon_wrap">
                    <i class="bi bi-bookmark"></i>
                  </div>
                  <div class="content_wrap">
                    <h3>Total Bookings</h3>
                    <h4>100</h4>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card_wrap bg-danger">
                  <div class="icon_wrap">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="content_wrap">
                    <h3>Total Staff</h3>
                    <h4>100</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-3">
              <div class="col-lg-6">
                <div id="curverChart"></div>
              </div>
              <div class="col-lg-6">
                <div id="calendar"></div>

              </div>
            </div>
            <div class="row my-3">
              <div class="col-lg-12">
                <div class="top_wrapper">
                  <div class="heading"><h2>Booking</h2></div>
                  <div class="larger-btn"><a href="./booking.html"><i class="bi bi-eye"></i> View All</a></div>
                </div>
                <div class="box table-responsive">
                  <table class="customerList table-striped-columns display" style="width:100%">
                      <thead class="custom-bg">
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Room Type</th>
                            <th>ID Proof</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>1</td>
                            <td>Styam Singh</td>
                            <td>8521489063</td>
                            <td>Single</td>
                            <td>Aadhar Card</td>
                            <td>13/04/2024</td>
                            <td>16/04/2024</td>
                            <td>Proccessing</td>
                          </tr>
                      </tbody>
                      <tfoot class="custom-bg">
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Phone No.</th>
                          <th>Room Type</th>
                          <th>ID Proof</th>
                          <th>Check In</th>
                          <th>Check Out</th>
                          <th>Status</th>
                        </tr>
                      </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="row my-3">
              <div class="col-lg-8">
                <div class="top_wrapper">
                  <div class="heading"><h2>Guest Review</h2></div>
                  <div class="larger-btn"><a href="javaScript:void(0)"><i class="bi bi-eye"></i> View All</a></div>
                </div>
                <div class="list_items_wrapper">
                  <ul>
                    <li>
                      <div class="guest_details_wrap">
                        <div class="guest_img">
                          <img src="./assets/img/guest-1.jpg" alt="guest">
                        </div>
                        <div class="guest_details">
                          <h3>Styam Singh</h3>
                          <span>Businessman</span>
                        </div>
                      </div>
                      <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                      </div>
                    </li>
                    <li>
                      <div class="guest_details_wrap">
                        <div class="guest_img">
                          <img src="./assets/img/guest-2.jpg" alt="guest">
                        </div>
                        <div class="guest_details">
                          <h3>Sneha Singh</h3>
                          <span>Entrepreneur</span>
                        </div>
                      </div>
                      <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
        <!-- overview area End -->
    </div>
    <!-- main body area End -->
</div>
@include('admin.footer')