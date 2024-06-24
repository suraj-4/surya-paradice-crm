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
                          <th>Id</th>
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
                        @if ($staffs ->isNotEmpty())
                          @foreach ($staffs as $staff)
                          <tr>
                            <td>{{$staff->staff_id}}</td>
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
                                      <button type="button" class="btn" onclick="editStaff('{{$staff->staff_id}}')"><i class="bi bi-pencil-square"></i> Edit</button>
                                    </li>
                                    <li>
                                      <!-- Button trigger modal -->
                                      <button type="button" class="btn" onclick="prevStaff('{{$staff->staff_id}}')"><i class="bi bi-eye"></i> Preview </button>
                                    </li>
                                    <li>
                                      <form action="{{route ('admin.destroyStaff',$staff->staff_id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="bi bi-trash3"></i> Delete</button>
                                      </form>
                                    </li>
                                  </ul>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot class="custom-bg">
                        <tr>
                          <th>Id</th>
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
                  <label for="add_name">Staff Name</label>
                  <input type="text" name="name" value="{{old ('name')}}" class="form-control @error('name') is-invalid @enderror" id="add_name" placeholder="Enter Full Name">
                  @error('name')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="add_designation">Designation</label>
                  <input type="text" name="designation" value="{{old ('designation')}}" class="form-control @error('designation') is-invalid @enderror " id="add_designation" placeholder="Enter Designation">
                  @error('designation')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="add_email">Email</label>
                  <input type="email" name="email" value="{{old ('email')}}" class="form-control @error('email') is-invalid @enderror" id="add_email" placeholder="Enter Email Addres">
                  @error('email')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="add_mobile">Mobile</label>
                  <input type="text" name="mobile" value="{{old ('mobile')}}" class="form-control @error('mobile') is-invalid @enderror" id="add_mobile" placeholder="Enter Mobile No.">
                  @error('mobile')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="add_address">Address</label>
                  <input type="text" name="address" cvalue="{{old ('address')}}" class="form-control @error('address') is-invalid @enderror" id="add_address" placeholder="Enter Address">
                  @error('address')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="add_joining">Joining Date</label>
                  <input type="date" name="joining" value="{{old ('joining')}}" id="add_joining" class="form-control @error('joining') is-invalid @enderror">
                  @error('joining')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                  </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-12">
                  <label for="add_image">Staff Image</label>
                  <input type="file" name="image"  class="form-control @error('image') is-invalid @enderror" id="add_image">
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
          <form action="{{Route ('admin.updateStaff')}}" id="updateStaffForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="staff_id" id="staff_id">

            <div class="modal-header heading">
              <h2>Update Staff Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="name">Staff Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="updt_name" placeholder="Enter Full Name">
                  @error('name')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="updt_designation">Designation</label>
                  <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror " id="updt_designation" placeholder="Enter Designation">
                  @error('designation')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="updt_email">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="updt_email" placeholder="Enter Email Addres">
                  @error('email')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="updt_mobile">Mobile</label>
                  <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="updt_mobile" placeholder="Enter Mobile No.">
                  @error('mobile')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-6">
                  <label for="updt_address">Address</label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="updt_address" placeholder="Enter Address">
                  @error('address')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="updt_joining">Joining Date</label>
                  <input type="date" name="joining" id="updt_joining" class="form-control @error('joining') is-invalid @enderror">
                  @error('joining')
                    <p class="invalid-feedback">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-12">
                  <label for="updt_image">Staff Image</label>
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="updt_image">
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
    <div class="modal fade" id="prevOneStaff">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header heading">
            <h2>Preview Staff Details</h2>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="preview_content">
              <div class="modal_img">
              @if ($staff->image != "")
                <img src="" id="prev_img" alt="Surya-Avatar">
              @endif
              </div>
              <div class="modal_content">
                <div class="d-flex mb-3">
                  <strong>Name</strong><h3 id="prev_name">{{$staff->staff_name}}</h3>
                </div>
                <div class="d-flex mb-3">
                  <strong>Designation</strong><h4 id="prev_desig">{{$staff->staff_designation}}</h4>
                </div>
                <div class="d-flex mb-3">
                  <strong>Mobile</strong><a href="" id="prev_mobile">{{$staff->staff_mobile}}</a>
                </div>
                
                <div class="d-flex mb-3">
                  <strong>Email</strong><a href="" id="prev_email">{{$staff->staff_email}}</a>
                </div>
                
                <div class="d-flex mb-3">
                  <strong>Address</strong><p id="prev_address">{{$staff->staff_address}}</p>
                </div>
               
                <div class="d-flex mb-3">
                  <strong>Joining Date</strong><p id="prev_join_date">{{$staff->staff_joining_date}}</p>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>


</div>
@include('admin.footer')

<script>
  function editStaff(staffId) {
    $('#editStaff').modal('show');

    $.ajax({
        url : "{{ route('admin.editStaff', '') }}/"+staffId,
        type : 'GET',
        dataType : 'json',
        success : function(result){
          // console.log(result);
          const data = result.staff;
          // console.log(data);

          $('#staff_id').val(data.staff_id);
          $('#updt_name').val(data.staff_name);
          $('#updt_designation').val(data.staff_designation);
          $('#updt_email').val(data.staff_email);
          $('#updt_mobile').val(data.staff_mobile);
          $('#updt_address').val(data.staff_address);
          $('#updt_joining').val(data.staff_joining_date);
          $('#updt_image').val(data.image);
            // console.log("===== " + result + " =====");

        }
    });
  }
</script>

<script>
  function prevStaff(staffId) {
    $('#prevOneStaff').modal('show');

    $.ajax({
        url : "{{ route('admin.prevOneStaff', '') }}/"+staffId,
        type : 'GET',
        dataType : 'json',
        success : function(result){
          // console.log(result);
          const data = result.staff;
          // console.log(data);
          // $('#prev_name')(data.staff_id);
          $('#prev_img').attr('src', data.image_path);
          $('#prev_name').text(data.staff_name);
          $('#prev_desig').text(data.staff_desig);
          $('#prev_mobile').text(data.staff_mobile);
          $('#prev_email').text(data.staff_email);
          $('#prev_address').text(data.staff_address);
          $('#prev_join_date').text(data.staff_joining);
            // console.log("===== " + result + " =====");
        }

    });
  }
</script>