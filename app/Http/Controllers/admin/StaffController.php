<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ahowAllStaff()
    {
        $staffs = Staff::all();
        return view('admin.pages.staff', [
           'staff' => $staffs
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
            return redirect() -> back() -> withErrors($validater) -> withInput();
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
        return redirect() -> route('admin.staff') -> with('success', 'Staff Added Successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $staff = Staff::findOrFail($staff);
        return view ('staff.edit',['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStaff(Request $request, Staff $staff)
    {
        $staff = Staff::findOrFail($staff);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
