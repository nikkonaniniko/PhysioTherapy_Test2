<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffs;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    public function index(){
        $data = array('staffs' => DB::table('staffs')->orderBy('created_at','desc')->simplePaginate(10));
        return view('staffs.index', $data);
    }

    public function show($id){
        $data = Staffs::findOrFail($id);
        return view('staffs.edit', ['staff'=>$data]);
    }

    public function create(){
        return view('staffs.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "last_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "designation" => ['required'],
            "expertise" => [],
            "contact_num" => ['required', 'phone:PH,US'],
            "emer_contact_num" => ['required', 'phone:PH,US'],
        ], ['first_name.regex' => 'Invalid first name. Please follow the format: "First Name"', 'last_name.regex' => 'Invalid last name. Please follow the format: "Last Name"', 'contact_num.required' => 'The contact number field is required', 'emer_contact_num.required' => 'The emergency contact number field is required']);

        if($request->hasFile('staff_photo')){
            $request->validate([
                "staff_photo" => 'image|mimes:jpeg,jpg,png|max:4096'
            ]);

            $filenameWithExtension = $request->file("staff_photo");

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("staff_photo")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('staff_photo')->storeAs('public/staffs', $filenameToStore);

            $request->file("staff_photo")->storeAs('public/staffs/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/public/staffs/thumbnail/' .$smallThumbnail;
            
            $this->createThumbnail($thumbNail, 100, 150);

            $validated['staff_photo'] = $filenameToStore;
        }

        Staffs::create($validated);

        return redirect('/admin/staff')->with('message', 'New Staff Added Successfully');
    }

    public function update(Request $request, Staffs $staff){
        $validated = $request->validate([
            "first_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "last_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "designation" => ['required'],
            "expertise" => [],
            "contact_num" => ['required', 'phone:PH,US'],
            "emer_contact_num" => ['required', 'phone:PH,US'],
        ], ['first_name.regex' => 'Invalid first name. Please follow the format: "First Name"', 'last_name.regex' => 'Invalid last name. Please follow the format: "Last Name"', 'contact_num.required' => 'The contact number field is required', 'emer_contact_num.required' => 'The emergency contact number field is required']);

        //dd($request);
        if($request->hasFile('staff_photo')){
            $request->validate([
                "staff_photo" => 'image|mimes:jpeg,jpg,png|max:4096'
            ]);

            $filenameWithExtension = $request->file("staff_photo");

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("staff_photo")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file('staff_photo')->storeAs('public/staff', $filenameToStore);

            $request->file("staff_photo")->storeAs('public/staff/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/staff/thumbnail/' .$smallThumbnail;
            
            $this->createThumbnail($thumbNail, 80, 80);

            $validated['staff_photo'] = $filenameToStore;
        }

        $staff->update($validated);

        return back()->with('message', 'Update Successful');
    }

    public function destroy(Staffs $staff){
        $staff->delete();
        return redirect('/admin/staff')->with('message', 'Staff Deleted Successfully');
    }

    public function createThumbnail($path, $width, $height) 
    {
        $img = Image::make($path)->resize($width, $height, function($constraint){
            //$constraint->aspectRatio();
        });
        $img->save($path);
    }
}
