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
                            <!-- Edit Button trigger modal -->
                            <button type="button" class="btn" onclick="editRoom('{{$room->room_id}}')"><i class="bi bi-pencil-square"></i> Edit</button>
                          </li>
                          <li>
                            <!-- Preview Button trigger modal -->
                            <button type="button" class="btn" onclick="prevRoom('{{$room->room_id}}')"><i class="bi bi-eye"></i> Preview </button>
                          </li>
                          <li>
                            <a href="{{Route ('admin.destroyRoom',$room->room_id)}}" onclick="confirmation(event)" class="btn">
                              <i class="bi bi-trash3"></i> Delete
                            </a>  
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

  <!-- Add New Room Modal -->
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
                <div class="mb-4">
                  <label for="map">Map</label>
                  <input type="text" name="map" id="map" class="form-control @error('map') is-invalid @enderror" placeholder="Enter Map Link">
                  @error('map')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-3">
                <div class="mb-4">
                  <input type="file" name="hotelImg" id="uploadImg" class="form-control @error('hotelImg') is-invalid @enderror" accept="image/*" hidden>
                  <label for="uploadImg" class="upload-label">
                    <img id="uploadPreview" alt="Click to upload an image" class="hidden">
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

  <!-- Edit Room Modal -->
  <div class="modal fade" id="editRoom" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <form action="{{Route ('admin.updateRoom')}}" id="updateRoomForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="room_id" id="edit_id">
          <div class="modal-header heading">
            <h2>Edit Rooms Details</h2>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-9">
                <div class="mb-4">
                  <label for="edit_hotelName">Hotel Name</label>
                  <input type="text" name="hotelName" id="edit_hotelName" class="form-control" placeholder="Enter Hotel Name">
                </div>
                <div class="mb-4">
                  <label for="room_desc">Room Description</label>
                  <div id="editRichTextEditor" name="roomDesc" class="form-control" style="width: 100%;"></div>
                </div>
                <div class="mb-4">
                  <label for="edit_roomExcerpt">Excerpt</label>
                  <textarea name="roomExcerpt" id="edit_roomExcerpt" class="form-control" placeholder="Enter Room Excerpt"></textarea>
                </div>
                <div class="mb-4">
                  <label for="edit_hotelMap">Map Link</label>
                  <input name="map" id="edit_hotelMap" class="form-control" placeholder="Enter Map Link">
                </div>
              </div>
              <div class="col-3">
                <div class="mb-4">
                  <input type="file" name="hotelImg" id="changeImg" accept="image/*" hidden>
                  <label for="changeImg" class="upload-label">
                    <img id="uploadPreview" class="hidden">
                    <p>Click to upload an image</p>
                  </label>
                  <!-- <img id="edit_hotelImg" class="hidden"> -->
                </div>
                <div class="mb-4">
                  <label for="edit_roomNo">Room Number</label>
                  <input type="text" name="roomNo" id="edit_roomNo" class="form-control" placeholder="Enter Room no.">  
                </div>
                <div class="mb-4">
                  <label for="edit_roomPrice">Room Price</label>
                  <input type="text" name="roomRent" id="edit_roomPrice" class="form-control" placeholder="Enter Room Price">  
                </div>
                <div class="mb-4">
                  <label for="edit_roomStatus">Room Status</label>
                  <select name="roomStatus" id="edit_roomStatus" class="form-select">
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
                  <label for="edit_roomType">Room Type</label>
                  <select name="roomType" id="edit_roomType" class="form-select">
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
                </div>
                <div class="mb-4">
                  <label for="edit_hotelLoc">Location</label>
                  <textarea name="location" id="edit_hotelLoc" class="form-control" placeholder="Enter Location"></textarea>
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

  <!-- Preview Room Modal -->
  <div class="modal fade" id="prevRoom" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header heading">
          <h2>Preview Rooms Details</h2>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="prev_wrapper">
            <div class="row">
              <div class="col-lg-9">
                <h4>Hotel Name</h4>
                <h3 id="prev_hotelName"></h3>
                <h4>Room Description</h4>
                <div id="prev_roomDesc"></div>
                <h4>Short Description</h4>
                <p id="prev_roomExcerpt" class="field"></p>
              </div>
              <div class="col-lg-3">
                <h4>Room Number</h4>
                <div id="prev_roomNo" class="field"></div>
                <h4>Room Type</h4>
                <div id="prev_roomType" class="field"></div>
                <h4>Room Status</h4>
                <div id="prev_roomStatus" class="field"></div>
                <h4>Room Rent</h4>
                <div id="prev_roomPrice" class="field"></div>
                <h4>Location</h4>
                <div id="prev_hotelLoc" class="field"></div>
                <h4>Map</h4>
                <div class="field"><a href="" id="prev_hotelMap" target="_blank">Map Link</a></div>
                <div class="thumbnail"><img alt="" id="prev_hotelImg"></div>
              </div>
            </div>
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn larger-btn shadow-none" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</div>
@include('admin.footer')

<!-- Rich Text Editor -->
<script>
  var roomEditor = {}
  var addEditor = new RichTextEditor("#addRichTextEditor", roomEditor);
  var editEditor = new RichTextEditor("#editRichTextEditor", roomEditor);
</script>

<!-- image upload Script -->
<script>
  // Image Upload
  document.getElementById('uploadImg').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('uploadPreview');
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });

  // Change Image
  document.getElementById('changeImg').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('ChangePreview');
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });

  // document.getElementById('fileInput').addEventListener('change', function(event) {
  //   const file = event.target.files[0];
  //   if (file) {
  //     const reader = new FileReader();
  //     reader.onload = function(e) {
  //       const preview = document.getElementById('preview');
  //       preview.src = e.target.result;
  //       preview.classList.remove('hidden');
  //     };
  //     reader.readAsDataURL(file);
  //   }
  // });
</script>

<!-- Edit or Upadte Script -->
<script>
  function editRoom (roomId) {
  $('#editRoom').modal('show');

    // Fetch Room Details
    $.ajax({
      url: "{{Route ('admin.editRoom', '')}}/"+roomId,
      method: "GET",
      dataType: "json",
      success: function(response) {
        const data = response.room;
        // console.log(data.hotel_name);
        $('#edit_id').val(data.room_id);
        $('#edit_hotelName').val(data.hotel_name);
        $('#edit_roomExcerpt').val(data.room_excerpt);
        $('#edit_roomNo').val(data.room_number);
        $('#edit_roomPrice').val(data.room_price);
        $('#edit_roomStatus').val(data.room_status);
        $('#edit_roomType').val(data.room_type);
        $('#edit_hotelLoc').val(data.hotel_location);
        $('#edit_hotelMap').val(data.hotel_map);
        $('#changeImg').attr('src', data.imageName);
        $('#editRichTextEditor').val(data.room_desc);
        // editEditor.setValue(data.room_desc);

        console.log(data.imageName);

        //   console.log(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
</script>

<!-- Preview Script -->
<script>
 function prevRoom (roomId) {
  $('#prevRoom').modal('show');
  
  // Fetch Room Details
  $.ajax({
    url: "{{Route ('admin.prevOneRoom', '')}}/"+roomId,
    method: "GET",
    dataType: "json",
    success: function(response) {
      // console.log(response);
      const data = response.room;
      console.log(data.imagePath);
      $('#prev_hotelImg').attr('src', data.imagePath);
      $('#prev_roomNo').text(data.roomNo);
      $('#prev_hotelName').text(data.hotelName);
      $('#prev_roomType').text(data.roomType);
      $('#prev_roomStatus').text(data.roomStatus);
      $('#prev_roomPrice').text(data.roomPrice);
      $('#prev_roomExcerpt').text(data.roomExcerpt);
      $('#prev_hotelLoc').text(data.hotelLocation);
      // $('#prev_hotelMap').text(data.hotelMap);
      $('#prev_hotelMap').attr('href', data.hotelMap);
      $('#prev_roomDesc').text(data.roomDesc);
    },
    error: function(error) {
      console.log(error);
    }
  });
 }
</script>

<!-- Delete Script -->
<script>
  function confirmation (ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
      title : "Are you sure you want to delete this room?",
      text : "You won't be able to delete this room",
      icon : "Warning",
      button : true,
      dangerMode : true,
    })
    .then ((willCancel)=>{
      if (willCancel) {
        window.location.href = urlToRedirect;
      }
    });
  }
</script>