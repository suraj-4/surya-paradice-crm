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
                Add New <i class="bi bi-plus-lg"></i>
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
                          <th>Room Number</th>
                          <th>Hotel Name</th>
                          <th>Room Type</th>
                          <th>Room Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if ($rooms ->isNotEmpty())
                        @foreach ($rooms as $room)
                        <tr>
                          <td>{{$room->room_id}}</td>
                          <td>{{$room->room_number}}</td>
                          <td>{{$room->hotel_name}}</td>
                          <td>{{$room->room_type}}</td>
                          <td>{{$room->room_status}}</td>
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
                                  <!-- <a href="javaScript:void(0)" class="btn"><i class="bi bi-trash3"></i> Delete</a>   -->
                                   <form action="{{Route ('admin.destroyRoom',$room->room_id)}}" method="POST" enctype="multipart/form-data">
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
                          <th>No</th>
                          <th>Room Number</th>
                          <th>Hotel Name</th>
                          <th>Room Type</th>
                          <th>Room Status</th>
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
    <div class="modal fade" id="addRoom" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <form action="{{Route ('admin.addRooms')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header heading">
              <h2>Add New Rooms Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <div class="col-9">
                  <div class="mb-4">
                    <label for="hotelName">Hotel Name</label>
                    <input type="text" name="hotelName" id="hotelName" class="form-control @error('hotelName') is-invalid @enderror" placeholder="Enter Hotel Name">
                    @error('hotelName')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomDesc">Room Description</label>
                    <input id="addRichTextEditor" name="roomDesc" class="form-control @error('roomDesc') is-invalid @enderror" style="width: 100%;">
                    @error('roomDesc')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomExcerpt">Excerpt</label>
                    <textarea name="roomExcerpt" id="roomExcerpt" class="form-control @error('roomExcerpt') is-invalid @enderror" placeholder="Enter Room Excerpt"></textarea>
                    @error('roomExcerpt')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>

                </div>
                <div class="col-3">
                  <div class="mb-4">
                    <input type="file" name="hotelImg" id="fileInput" class="form-control @error('hotelImg') is-invalid @enderror" accept="image/*" hidden>
                    <label for="fileInput" class="upload-label">
                      <img id="preview" alt="Click to upload an image" class="hidden">
                      <p>Click to upload an image</p>
                    </label>
                    @error('hotelImg')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomNo">Room Number</label>
                    <input type="text" name="roomNo" id="roomNo" class="form-control @error('roomNo') is-invalid @enderror" placeholder="Enter Room no.">  
                    @error('roomNo')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomRent">Room Rent</label>
                    <input type="text" name="roomRent" id="roomRent" class="form-control @error('roomRent') is-invalid @enderror" placeholder="Enter Room Price">  
                    @error('roomRent')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomStatus">Room Status</label>
                    <select name="roomStatus" id="roomStatus" class="form-select @error('roomStatus') is-invalid @enderror">
                      <option selected>Select the Status</option>
                      <option value="available">Available</option>
                      <option value="reserved">Reserved</option>
                      <option value="occupied">Occupied</option>
                      <option value="pending">Pending</option>
                      <option value="checkedOut">Checked-Out</option>
                      <option value="outOfService">Out of Service</option>
                    </select>                
                    @error('roomStatus')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="roomType">Room Type</label>
                    <select name="roomType" id="roomType" class="form-select @error('roomType') is-invalid @enderror">
                      <option selected>Select Room Type</option>
                      <option value="single">Single Room</option>
                      <option value="double">Double Room</option>
                      <option value="twin">Twin Room</option>
                      <option value="triple">Triple Room</option>
                      <option value="quad">Quad Room</option>
                      <option value="family">Family Room</option>
                      <option value="suite">Suite</option>
                      <option value="studio">Studio</option>
                      <option value="deluxe">Deluxe Room</option>
                      <option value="executive">Executive Room</option>
                      <option value="luxury">Luxury Room</option>
                      <option value="presidentialSuite">Presidential Suite</option>
                      <option value="accessible">Accessible Room</option>
                      <option value="penthouse">Penthouse</option>
                    </select>
                    @error('roomType')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="location">Location</label>
                    <textarea name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="Enter Location"></textarea>
                    @error('location')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="map">Map</label>
                    <input type="text" name="map" id="map" class="form-control @error('map') is-invalid @enderror" placeholder="Enter Map Link">
                    @error('map')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>

                </div>
              </div>   
               
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn larger-btn">Add New <i class="bi bi-plus-lg"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Data Modal -->
    <div class="modal fade" id="editRoom" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header heading">
              <h2>Edit Rooms Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <div class="col-9">
                  <div class="mb-4">
                    <label for="hotel_name">Hotel Name</label>
                    <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter Hotel Name">
                  </div>
                  <div class="mb-4">
                    <label for="room_desc">Room Description</label>
                    <div id="editRichTextEditor" name="room_desc" class="form-control" style="width: 100%;"></div>
                  </div>
                  <div class="mb-4">
                    <label for="room_excerpt">Excerpt</label>
                    <textarea name="room_excerpt" id="room_excerpt" class="form-control" placeholder="Enter Room Excerpt"></textarea>
                  </div>

                </div>
                <div class="col-3">
                  <div class="mb-4">
                    <input type="file" id="fileInput" accept="image/*" hidden>
                    <label for="fileInput" class="upload-label">
                      <img id="preview" alt="Click to upload an image" class="hidden">
                      <p>Click to upload an image</p>
                    </label>
                  </div>
                  <div class="mb-4">
                    <label for="room_no">Room Number</label>
                    <input type="text" name="room_no" id="room_no" class="form-control" placeholder="Enter Room no.">  
                  </div>
                  <div class="mb-4">
                    <label for="room_price">Room Price</label>
                    <input type="text" name="room_price" id="room_price" class="form-control" placeholder="Enter Room Price">  
                  </div>
                  <div class="mb-4">
                    <label for="room_status">Room Status</label>
                    <select name="room_status" id="room_status" class="form-select">
                      <option selected>Select the Status</option>
                      <option value="available">Available</option>
                      <option value="reserved">Reserved</option>
                      <option value="occupied">Occupied</option>
                      <option value="pending">Pending</option>
                      <option value="checkedOut">Checked-Out</option>
                      <option value="outOfService">Out of Service</option>
                    </select>                
                  </div>
                  <div class="mb-4">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" class="form-select">
                      <option selected>Select Room Type</option>
                      <option value="single">Single Room</option>
                      <option value="double">Double Room</option>
                      <option value="twin">Twin Room</option>
                      <option value="triple">Triple Room</option>
                      <option value="quad">Quad Room</option>
                      <option value="family">Family Room</option>
                      <option value="suite">Suite</option>
                      <option value="studio">Studio</option>
                      <option value="deluxe">Deluxe Room</option>
                      <option value="executive">Executive Room</option>
                      <option value="luxury">Luxury Room</option>
                      <option value="presidential_suite">Presidential Suite</option>
                      <option value="accessible">Accessible Room</option>
                      <option value="penthouse">Penthouse</option>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label for="location">Location</label>
                    <textarea name="location" id="location" class="form-control" placeholder="Enter Location"></textarea>
                  </div>

                </div>
              </div>  
               
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn larger-btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@include('admin.footer')

<script>
  // Rich Text Editor
  var roomEditor = {}
  //   roomEditor.toolbar = "mytoolbar";
  //   roomEditor.toolbar_mytoolbar = "{bold,italic}|{justifyleft,justifycenter,justifyright,justifyfull}|{forecolor,backcolor}|removeformat"
  // + "#{undo,redo,fullscreenenter,fullscreenexit,togglemore}";
  var addEditor = new RichTextEditor("#addRichTextEditor", roomEditor);
  var editEditor = new RichTextEditor("#editRichTextEditor", roomEditor);
</script>