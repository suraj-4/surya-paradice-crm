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
            'hotelName' => 'required',
            'roomType' => 'required',
            'roomNo' => 'required|numeric',
            'roomRent' => 'required|numeric',
            'roomStatus' => 'required',
            'roomExcerpt' => 'required'
        ];

        $Validate = Validator::make($request->all(), $rules);
        if ($Validate -> fails()){
            return redirect()->back()->withInput()->withErrors($Validate);
        }

        $rooms = new Room();
        $rooms->room_number = $request->roomNo;
        $rooms->hotel_name = $request->hotelName;
        $rooms->room_type = $request->roomType;
        $rooms->room_status = $request->roomStatus;
        $rooms->room_price = $request->roomRent;
        $rooms->room_excerpt = $request->roomExcerpt;
        $rooms->hotel_location = $request->location;
        $rooms->hotel_map = $request->map;
        $rooms->room_desc = $request->roomDesc;
        $rooms->save();
        return redirect()->route('admin.rooms')->with('success', 'Room Added Successfully');

    }


}
