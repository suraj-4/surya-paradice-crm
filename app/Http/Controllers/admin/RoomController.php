<?php

namespace App\Http\Controllers\admin;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    //This method will show the All Rooms.
    public function showAllRooms(){
        $rooms = Room::get();
        return view('admin.pages.rooms',[
            'rooms' => $rooms
        ]);
    }

    //This method will Add the Rooms in Table.
    public function addRoom(Request $request ){
        $rules = [
            'room_name' => 'required',
            'room_type' => 'required',
            'room_number' => 'required|numeric',
            'room_status' => 'required',
        ];

        $Validate = Validator::make($request->all(), $rules);
        if ($Validate -> fails()){
            return redirect() -> back() -> withErrors($Validate) -> withInput();
        }

        $rooms = new Room();
        $rooms->room_name = $request->room_name;
        $rooms->room_type = $request->room_type;
        $rooms->room_number = $request->room_number;
        $rooms->room_status = $request->room_status;
        $rooms->save();
        return redirect() -> route('admin.rooms') -> with('success', 'Room Added Successfully');

    }

}
