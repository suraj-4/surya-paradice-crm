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
            <ul class="nav nav-tabs" id="settinsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-tab-pane" type="button" role="tab">Users</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab">Contact</button>
                </li>
            </ul>
            <div class="tab-content" id="settingsTabContent">
                <div class="tab-pane fade show active" id="users-tab-pane" role="tabpanel">
                    <div class="top_wrapper">
                        <div class="heading"><h2>Users All Details</h2></div>
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
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Role</th>
                                        <th>Change Role</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($users ->isNotEmpty())
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                <form action="{{route ('admin.updateUser',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <div class="col-9">
                                                            <select name="user_role" id="change_role" class="form-select">
                                                                <option selected>Admin</option>
                                                                <option value="customer">Customer</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div> 
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route ('admin.destroyUser',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>

                                    <tfoot class="custom-bg">
                                        <tr>
                                            <th>User Id</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Role</th>
                                            <th>Change Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel">
                    <div class="top_wrapper">
                        <div class="heading"><h2>Profile Details</h2></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel">
                    <div class="top_wrapper">
                        <div class="heading"><h2>Contact Details</h2></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- overview area End -->
    </div>
    <!-- main body area End -->

</div>
@include('admin.footer')

