<?php

namespace App\Http\Controllers\admin;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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

        $imageName = NULL;
        if (!empty ($request->hotelImg)){
            $imageObject = $request->hotelImg;
            $newImageName = time().'.'.$imageObject->getClientOriginalExtension();
            $imageObject->move(public_path('admin/uploads/rooms'), $newImageName);
            $imageName = $newImageName;
        }

        Room::create([
            'room_number' => $request->roomNo,
            'hotel_name' => $request->hotelName,
            'hotel_image' => $imageName,
            'room_type' => $request->roomType,
            'room_status' => $request->roomStatus,
            'room_price' => $request->roomRent,
            'room_excerpt' => $request->roomExcerpt,
            'hotel_location' => $request->location,
            'hotel_map' => $request->map,
            'room_desc' => $request->roomDesc,
        ]);

        return redirect()->back()->with('Success', 'Room Added Successfully');

    }

    //This method will Preview the Rooms in Table.
    public function prevOneRoom($room_id){
        $room = Room::find($room_id);

        if ($room) {
            // Assuming your images are stored in the "storage/images" directory
            $imagePath = asset('admin/uploads/rooms/' . $room->hotel_image); // Adjust the path as needed
            return response()->json([
                'message' => "Room found successfully",
                'success' => true,
                'room' => [
                    'roomNo' => $room->room_number,
                    'hotelName' => $room->hotel_name,
                    'imagePath' => $imagePath,
                    'roomType' => $room->room_type,
                    'roomStatus' => $room->room_status,
                    'roomPrice' => $room->room_price,
                    'roomExcerpt' => $room->room_excerpt,
                    'hotelLocation' => $room->hotel_location,
                    'hotelMap' => $room->hotel_map,
                    'roomDesc' => $room->room_desc,

                ]
            ]);
        } 
        
    }

    //This method will Edit the Rooms in Table.
    public function editRoom($room_id){
        $room = Room::where('room_id',$room_id)->first();
        return response()->json(['message'=> "Room find Successfully",'Success'=>true, 'room' => $room]);
    }

    //This method will Update the Rooms in Table.
    public function updateRoom(Request $request){
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

        $previousImg = 'admin/uploads/rooms'.$request->hotel_image;
        if(File::exists($previousImg)){
            File::delete($previousImg);
        }  

        $imageName = NULL;
        if (!empty ($request->hotelImg)){
            $imageObject = $request->hotelImg;
            $newImageName = time().'.'.$imageObject->getClientOriginalExtension();
            $imageObject->move(public_path('admin/uploads/rooms'), $newImageName);
            $imageName = $newImageName;
        }

        $room_id = $request->room_id;
        $room = Room::find($room_id)
                ->update([
                    'room_number' => $request->roomNo,
                    'hotel_name' => $request->hotelName,
                    'hotel_image' => $imageName,
                    'room_type' => $request->roomType,
                    'room_status' => $request->roomStatus,
                    'room_price' => $request->roomRent,
                    'room_excerpt' => $request->roomExcerpt,
                    'hotel_location' => $request->location,
                    'hotel_map' => $request->map,
                    'room_desc' => $request->roomDesc,
                ]);

        return redirect()->back()->with('Success', 'Room Updated Successfully');

    }

    //This method will Delete the Rooms in Table.
    public function destroyRoom(string $room_id){
        $room = Room::find($room_id);

        // delete image from db
        File::delete(public_path('admin/uploads/rooms'.$room->newImageName));

        // Delete the room record
        $room->delete();
        return redirect()->back()->with('Success', 'Rooms Deleted Successfully');
    }

}
