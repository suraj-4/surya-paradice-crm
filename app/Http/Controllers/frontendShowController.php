<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class frontendShowController extends Controller
{
    //This method will show the All Rooms.
    public function showAllRooms(){
        $rooms = Room::all();
        return view('frontend.room',compact('rooms'));
    }

    //This method will show the Room Type Rooms.
    public function showRoomsType(){
        $luxuryRooms = Room::where('room_type', 'luxury')->get();
        return view('frontend.home', compact('luxuryRooms'));
    }

}
