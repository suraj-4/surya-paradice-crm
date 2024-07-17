<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session; 

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ahowAllStaff()
    {
        $staffs = Staff::all();
        return view('admin.pages.staff', [
           'staffs' => $staffs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addStaff(Request $request){
        // dd();

        $rule = [
            'name' => 'required',
            'designation' => 'required',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required',
            'joining' => 'required',
        ];

        if ($request->hasFile('image')){
            $rule['image'] = 'image';
        }
        $validater = Validator::make($request->all(), $rule);
        if ($validater -> fails()){
            return redirect()->back()->withInput()->withErrors($validater) ;
        }

        $staff = new Staff();
        $staff-> staff_name = $request->name;
        $staff-> staff_designation = $request->designation;
        $staff-> staff_email = $request->email;
        $staff-> staff_mobile = $request->mobile;
        $staff-> staff_address = $request->address;
        $staff-> staff_joining_date = $request->joining;
        $staff-> save();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Store image in Product Directory
            $image->move(public_path('admin/uploads/staff'), $imageName);

            // Save image name in db
            $staff-> image = $imageName;
            $staff-> save();
        }
        return redirect()->back()->with('success', 'Staff Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function prevOneStaff($staff_id)    {
        $staff = Staff::where('staff_id', $staff_id)->first();
        if ($staff) {
            // Assuming your images are stored in the "storage/images" directory
            $imagePath = asset('admin/uploads/staff/' . $staff->image); // Adjust the path as needed
            return response()->json([
                'message' => "Staff found successfully",
                'success' => true,
                'staff' => [
                    'image_path' => $imagePath,
                    'staff_name' => $staff->staff_name,
                    'staff_desig' => $staff->staff_designation,
                    'staff_mobile' => $staff->staff_mobile,
                    'staff_email' => $staff->staff_email,
                    'staff_address' => $staff->staff_address,
                    'staff_joining' => $staff->staff_joining_date
                ]
            ]);
        } else {
            return response()->json([
                'message' => "Staff not found",
                'success' => false
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editStaff($staff_id)
    {
        $staff = Staff::where('staff_id',$staff_id)->first();
        return response()->json(['message'=> "Staff find Successfully",'Success'=>true, 'staff' => $staff]);
    }

    /* Update the specified resource in storage. */
    public function updateStaff(Request $request)
    {
        $rule = [
            'name' => 'required',
            'designation' => 'required',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required',
            'joining' => 'required',
        ];

        if ($request->hasFile('image')){
            $rule['image'] = 'image';
        }
        $validater = Validator::make($request->all(), $rule);
        if ($validater -> fails()){
            return redirect()->back()->withInput()->withErrors($validater) ;
        }
        $staff_id = $request->staff_id;
        $staff = Staff::find($staff_id);
        $staff-> staff_name = $request->name;
        $staff-> staff_designation = $request->designation;
        $staff-> staff_email = $request->email;
        $staff-> staff_mobile = $request->mobile;
        $staff-> staff_address = $request->address;
        $staff-> staff_joining_date = $request->joining;
        $staff-> update();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Store image in Product Directory
            $image->move(public_path('admin/uploads/staff'), $imageName);

            // Save image name in db
            $staff-> image = $imageName;
            $staff-> update();
        }
        return redirect()->back()->with('success', 'Staff Updated Successfully');
    }


    /* Remove the specified resource from storage. */
    public function destroyStaff($staff_id) {
        $staff = Staff::findOrFail($staff_id);

        // delete image from db
        File::delete(public_path('admin/uploads/staff'.$staff->imageName));


        $staff-> delete();
        return redirect()->back()->with('Success', 'staff deleted successfully');
    }
}
