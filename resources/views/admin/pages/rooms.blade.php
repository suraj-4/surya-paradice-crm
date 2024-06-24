@include('admin.header')
@section('title')
    Room
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
              <div class="heading"><h2>All Rooms Details</h2></div>
              <button type="button" class="btn larger-btn" data-bs-toggle="modal" data-bs-target="#addRoom">
                <i class="bi bi-plus-lg"></i> Add New
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
                          <th>No</th>
                          <th>Room Name</th>
                          <th>Room Type</th>
                          <th>Room Number</th>
                          <th>Room Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @if ($rooms ->isNotEmpty())
                          @foreach ($rooms as $room)
                          <tr>
                            <td>{{$room->room_id}}</td>
                            <td>{{$room->room_name}}</td>
                            <td>{{$room->room_type}}</td>
                            <td>{{$room->room_number}}</td>
                            <!-- <td><div class="proccess">{{$room->room_status}}</div></td> -->
                            <td>
                              @if ($room->room_status == 'pending')
                                <div class="pending">{{$room->room_status}}</div>
                              @elseif ($room->room_status == 'done')
                               <div class="done">{{$room->room_status}}</div>
                              @elseif ($room->room_status == 'booked')
                               <div class="proccess">{{$room->room_status}}</div>
                              @endif
                            </td>
                            <td>
                              <div class="dropdown">
                                  <button class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                  </button>
                                  <ul class="dropdown-menu tabel_dropdown">
                                    <li>
                                      <!-- Button trigger modal -->
                                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editRoom"><i class="bi bi-pencil-square"></i> Edit</button>
                                    </li>
                                    <li>
                                      <!-- Button trigger modal -->
                                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#prevRoom"><i class="bi bi-eye"></i> Preview </button>
                                    </li>
                                    <li>
                                      <a href="javaScript:void(0)" class="btn"><i class="bi bi-trash3"></i> Delete</a>  
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
                          <th>No</th>
                          <th>Name</th>
                          <th>Room Type</th>
                          <th>Number</th>
                          <th>Status</th>
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

    <!-- Add New Data Modal -->
    <div class="modal fade" id="addRoom">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{Route ('admin.rooms')}}" method="POST">
            @csrf
            <div class="modal-header heading">
              <h2>Add New Rooms Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="room_name">Room Name</label>
                  <input type="text" name="room_name" class="form-control @error('room_name') is-invalid @enderror" id="room_name" placeholder="Enter Room name">
                  @error('room_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="room_type">Room Type</label>
                  <input type="text" name="room_type" class="form-control @error('room_type') is-invalid @enderror" id="room_type" placeholder="Enter Room Type">
                  @error('room_type')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="room_number">Room Number</label>
                  <input type="text" name="room_number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" placeholder="Enter Room No.">
                </div>
                @error('room_number')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="col-6">
                  <label for="room_status">Room Status</label>
                    <select name="room_status" class="form-select @error('room_status') is-invalid @enderror" id="room_status">
                        <option selected>Pending</option>
                        <option value="booked">Booked</option>
                        <option value="done">Done</option>
                    </select>
                    @error('room_status')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn larger-btn">Add New</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Data Modal -->
    <div class="modal fade" id="editRoom">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header heading">
            <h2>Edit Rooms Details</h2>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
                <div class="form-group row mb-4">
                    <div class="col-6">
                    <label for="name">Room Name</label>
                    <input type="text" name="name" class="form-control shadow-none" placeholder="Enter Room name" id="name">
                    </div>
                    <div class="col-6">
                    <label for="phone">Room Type</label>
                    <input type="text" name="room_type" class="form-control shadow-none" placeholder="Enter Room Type" id="room_type">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <div class="col-6">
                    <label for="email">Room Number</label>
                    <input type="email" name="room_no" class="form-control shadow-none" placeholder="Enter Room No." id="room_no">
                    </div>
                    <div class="col-6">
                    <label for="id_proof">Room Status</label>
                        <select class="form-select shadow-none">
                            <option selected>Pending</option>
                            <option value="booked">Booked</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                </div>
                </form>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn larger-btn">Update</button>
          </div>
        </div>
      </div>
    </div>
</div>
@include('admin.footer')