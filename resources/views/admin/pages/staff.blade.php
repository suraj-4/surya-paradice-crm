@include('admin.header')
@section('title')
    Staff
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
            <div class="top_wrapper">
              <div class="heading"><h1>All Staff Details</h1></div>
              <!-- <div class="larger-btn"><a href="javaScript:void(0)"><i class="bi bi-plus-lg"></i> Add new</a></div> -->
              <button type="button" class="btn larger-btn" data-bs-toggle="modal" data-bs-target="#addStaffDataModal">
                <i class="bi bi-plus-lg"></i> Add new
              </button>
            </div>
            <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive customerLists">
                  <table class="table-striped-columns display customerList" style="width:100%">
                      <thead class="custom-bg">
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Joining Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>
                                <div class="table_img">
                                    <img src="./assets/img/Surya-Avatar.png" alt="Surya-Avatar">
                                </div>
                            </td>
                            <td>Styam Singh</td>
                            <td>8521489063</td>
                            <td>Styam852@gmail.com</td>
                            <td>16/04/2024</td>
                          </tr>
                          
                          
                      </tbody>
                      <tfoot class="custom-bg">
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Joining Date</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <!-- overview area End -->
    </div>
    <!-- main body area End -->

    <!-- Add Staff Data Modal -->
    <div class="modal fade" id="addStaffDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header heading">
            <h2>Add New Details</h2>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <input type="text" class="form-control shadow-none" placeholder="Enter full name">
                </div>
                <div class="col-6">
                  <input type="text" class="form-control shadow-none" placeholder="Enter phone No.">
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <input type="email" class="form-control shadow-none" placeholder="Enter email Addres">
                </div>
                <div class="col-6">
                  <input type="file" class="form-control shadow-none" placeholder="Upload id proof">
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <input type="text" class="form-control shadow-none" placeholder="Check in">
                </div>
                <div class="col-6">
                  <input type="text" class="form-control shadow-none" placeholder="Check out">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn larger-btn">Add New</button>
          </div>
        </div>
      </div>
    </div>
</div>
@include('admin.footer')