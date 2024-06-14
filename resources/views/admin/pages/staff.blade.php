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
              <button type="button" class="btn larger-btn" data-bs-toggle="modal" data-bs-target="#addStaff">
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
                          <th>Joining</th>
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
                            <td>Assistant</td>
                            <td>8521489063</td>
                            <td>Styam852@gmail.com</td>
                            <td>24/25 Road Kolkata</td>
                            <td>16/04/2024</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu tabel_dropdown">
                                        <li>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editStaff">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#previewStaff">
                                                <i class="bi bi-eye"></i>
                                                Preview
                                            </button>
                                        </li>
                                        <li><a class="btn" href="javaScript:void(0)">
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </a></li>
                                    </ul>
                                </div>
                                                   
                            </td>
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
                          <th>Joining</th>
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
    <div class="modal fade" id="addStaff">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-header heading">
                    <h2>Add New Staff</h2>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="staff_name">Staff Name</label>
                        <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Enter Full Name">
                        </div>
                        <div class="col-6">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Addres">
                        </div>
                        <div class="col-6">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile No.">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                        </div>
                        <div class="col-6">
                        <label for="joining">Joining Date</label>
                        <input type="date" name="joining" id="joining" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-12">
                        <label for="image">Staff Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn larger-btn"><i class="bi bi-plus-lg"></i> Add New</button>
                </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Edit Staff Data Modal -->
    <div class="modal fade" id="editStaff">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-header heading">
                    <h2>Edit Staff Details</h2>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="staff_name">Staff Name</label>
                        <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Enter Full Name">
                        </div>
                        <div class="col-6">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Addres">
                        </div>
                        <div class="col-6">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile No.">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                        </div>
                        <div class="col-6">
                        <label for="joining">Joining Date</label>
                        <input type="date" name="joining" id="joining" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-12">
                        <label for="image">Staff Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn larger-btn"><i class="bi bi-pen"></i> Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Preview Staff Data Modal -->
    <div class="modal fade" id="previewStaff">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header heading">
            <h2>Preview Staff Details</h2>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn larger-btn">Add New</button>
          </div>
        </div>
      </div>
    </div>
</div>
@include('admin.footer')