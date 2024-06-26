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
                          <!-- <th>No</th> -->
                          <th>Room Number</th>
                          <th>Room Name</th>
                          <th>Room Type</th>
                          <th>Room Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>100</td>
                          <td>Family Room</td>
                          <td>Luxury</td>
                          <td>pending</td>
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
                      </tbody>

                      <tfoot class="custom-bg">
                        <tr>
                          <!-- <th>No</th> -->
                          <th>Room Number</th>
                          <th>Room Name</th>
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
          <form>
            <div class="modal-header heading">
              <h2>Add New Rooms Details</h2>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <div class="col-9">
                  <div class="mb-4">
                    <label for="room_name">Room Name</label>
                    <input type="text" name="room_name" id="room_name" class="form-control" placeholder="Enter Room Name">
                  </div>
                  <div class="mb-4">
                    <label for="room_desc">Room Description</label>
                    <div id="addRichTextEditor" name="room_desc" class="form-control" style="width: 100%;"></div>
                  </div>
                </div>
                <div class="col-3">
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
                    <label for="room_excerpt">Excerpt</label>
                    <textarea name="room_excerpt" id="room_excerpt" class="form-control" placeholder="Enter Room Excerpt"></textarea>
                  </div>

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
                    <label for="room_name">Room Name</label>
                    <input type="text" name="room_name" id="room_name" class="form-control" placeholder="Enter Room Name">
                  </div>
                  <div class="mb-4">
                    <label for="room_desc">Room Description</label>
                    <div id="editRichTextEditor" name="room_desc" class="form-control" style="width: 100%;"></div>
                  </div>
                </div>
                <div class="col-3">
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
                    <label for="room_excerpt">Excerpt</label>
                    <textarea name="room_excerpt" id="room_excerpt" class="form-control" placeholder="Enter Room Excerpt"></textarea>
                  </div>
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