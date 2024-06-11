<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //This method show the dashboard.
    public function showDashboard(){
        return view('admin.pages.dashboard');
    }
    //This method show the All Rooms.
    // public function showRooms(){
    //     return view('admin.pages.rooms');
    // }
    //This method show the All Booking.
    public function showBooking(){
        return view('admin.pages.bookings');
    }
    //This method show the All Staff.
    public function showStaff(){
        return view('admin.pages.staff');
    }
    //This method show the All Report.
    public function showReports(){
        return view('admin.pages.reports');
    }
}
