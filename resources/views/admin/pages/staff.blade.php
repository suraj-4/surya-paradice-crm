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
              <button type="button" class="btn larger-btn" data-bs-toggle="modal" data-bs-target="#addStaff">
                <i class="bi bi-plus-lg"></i> Add new
              </button>
            </div>
            <div class="row">
            @if (Session::has('Success'))
            <div class="col-lg-12 mt-4">
                <div class="alert alert-success">
                    {{Session::get('Success')}}
                </div>
            </div>
            @endif
            <div class="col-lg-12">
                <div class="table-responsive customerLists">
                  <table class="table-striped-columns display customerList" style="width:100%">
                      <thead class="custom-bg">
                        <tr>
                          <!-- <th>Id</th> -->
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
                        @if ($staff ->isNotEmpty())
                          @foreach ($staff as $staff)
                          <tr>
                            <!-- <td>{{$staff->staff_id}}</td> -->
                            <td>
                              <div class="table_img">
                                @if ($staff->image != "")
                                  <img src="{{ asset('admin/uploads/staff/'.$staff->image)}}" alt="Surya-Avatar">
                                @endif
                              </div>
                            </td>
                            <td>{{$staff->staff_name}}</td>
                            <td>{{$staff->staff_designation}}</td>
                            <td>{{$staff->staff_email}}</td>
                            <td>{{$staff->staff_mobile}}</td>
                            <td>{{$staff->staff_address}}</td>
                            <td>{{$staff->staff_joining_date}}</td>
                            <td>
                              <div class="dropdown">
                                  <button class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                      <i class="bi bi-three-dots-vertical"></i>
                                  </button>
                                  <ul class="dropdown-menu tabel_dropdown">
                                      <li>
                                          <!-- Button trigger modal -->
                                          <a class="btn" href="{{route ('admin.editStaff', $staff->staff_id)}}" data-bs-toggle="modal" data-bs-target="#editStaff">
                                            <i class="bi bi-pencil-square"></i> Edit
                                          </a>
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
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot class="custom-bg">
                        <tr>
                          <!-- <th>Id</th> -->
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
            <form action="{{route ('admin.addStaff')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header heading">
                  <h2>Add New Staff</h2>
                  <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="form-group row mb-2">
                      <div class="col-6">
                      <label for="name">Staff Name</label>
                      <input type="text" name="name" value="{{old ('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Full Name">
                      @error('name')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                      <div class="col-6">
                      <label for="designation">Designation</label>
                      <input type="text" name="designation" value="{{old ('designation')}}" class="form-control @error('designation') is-invalid @enderror " id="designation" placeholder="Enter Designation">
                      @error('designation')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-2">
                      <div class="col-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" value="{{old ('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email Addres">
                      @error('email')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                      <div class="col-6">
                      <label for="mobile">Mobile</label>
                      <input type="text" name="mobile" value="{{old ('mobile')}}" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile No.">
                      @error('mobile')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-2">
                      <div class="col-6">
                      <label for="address">Address</label>
                      <input type="text" name="address" cvalue="{{old ('address')}}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address">
                      @error('address')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                      <div class="col-6">
                      <label for="joining">Joining Date</label>
                      <input type="date" name="joining" value="{{old ('joining')}}" id="joining" class="form-control @error('joining') is-invalid @enderror">
                      @error('joining')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
                      </div>
                  </div>
                  <div class="form-group row mb-2">
                      <div class="col-12">
                      <label for="image">Staff Image</label>
                      <input type="file" name="image" value="{{old ('image')}}"  class="form-control @error('image') is-invalid @enderror" id="image">
                      @error('image')
                        <p class="invalid-feedback">{{$message}}</p>
                      @enderror
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

    <!-- Update Staff Data Modal -->
    <div class="modal fade" id="editStaff">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{route ('admin.updateStaff', $staff->staff_id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-header heading">
              <h2>Update Staff Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="name">Staff Name</label>
                  <input type="text" name="name" value="{{old ('name',$staff->name)}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Full Name">
                  @error('name')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="designation">Designation</label>
                  <input type="text" name="designation" value="{{old ('designation',$staff->designation)}}" class="form-control @error('designation') is-invalid @enderror " id="designation" placeholder="Enter Designation">
                  @error('designation')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="email">Email</label>
                  <input type="email" name="email" value="{{old ('email',$staff->email)}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email Addres">
                  @error('email')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="mobile">Mobile</label>
                  <input type="text" name="mobile" value="{{old ('mobile',$staff->mobile)}}" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile No.">
                  @error('mobile')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="address">Address</label>
                  <input type="text" name="address" cvalue="{{old ('address',$staff->address)}}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address">
                  @error('address')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="joining">Joining Date</label>
                  <input type="date" name="joining" value="{{old ('joining',$staff->joining)}}" id="joining" class="form-control @error('joining') is-invalid @enderror">
                  @error('joining')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-12">
                  <label for="image">Staff Image</label>
                  <input type="file" name="image" value="{{old ('image',$staff->image)}}"  class="form-control @error('image') is-invalid @enderror" id="image">
                  @error('image')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn larger-btn"><i class="bi bi-plus-lg"></i> Update</button>
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
            <div class="preview_content">
              <div class="modal_img">
                <img src="./assets/img/Surya-Avatar.png" alt="Surya-Avatar">
              </div>
              <div class="modal_content">
                <div class="d-flex mb-3">
                  <strong>Name</strong><h3>Styam Singh</h2>
                </div>
                <div class="d-flex mb-3">
                  <strong>Designation</strong><h4>Assistant</h4>
                </div>
                <div class="d-flex mb-3">
                  <strong>Mobile</strong><a href="">8521489063</a>
                </div>
                
                <div class="d-flex mb-3">
                  <strong>Email</strong><a href="">Styam852@gmail.com</a>
                </div>
                
                <div class="d-flex mb-3">
                  <strong>Address</strong><p>24/25 Road Kolkata</p>
                </div>
               
                <div class="d-flex mb-3">
                  <strong>Joining Date</strong><p>16/04/2024</p>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

</div>
@include('admin.footer')