<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PatientController extends Controller
{
    public function index() {
        $data = array('patients' => DB::table('patients')->orderBy('created_at','desc')->simplePaginate(10));
        return view('patients.index', $data);
    }

    public function show($id){
        $data = Patients::findOrFail($id);
        return view('patients.edit', ['patient'=>$data]);
    }

    public function create(){
        return view('patients.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "last_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "contact_num" => ['required', 'phone:PH,US'],
            "diagnosis" => [],
        ], ['first_name.regex' => 'Invalid first name. Please follow the format: "First Name"', 'last_name.regex' => 'Invalid last name. Please follow the format: "Last Name"', 'contact_num.required' => 'The contact number field is required', 'emer_contact_num.required' => 'The emergency contact number field is required']);

        // if($request->hasFile('prescriptions')){
        //     $request->validate([
        //         "prescriptions" => '|mimes:jpeg,png,jpg,zip,pdf,docx|max:10000'
        //     ]);

        //     $filenameWithExtension = $request->file("prescriptions");

        //     $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //     $extension = $request->file("prescriptions")->getClientOriginalExtension();

        //     $filenameToStore = $filename .'_'.time().'.'.$extension;

        //     $request->file('prescriptions')->storeAs('public/patients', $filenameToStore);

        //     $validated['prescriptions'] = $filenameToStore;
        // }

        Patients::create($validated);

        return redirect('/admin/patients')->with('message', 'New Patient Added Successfully');
    }

    public function update(Request $request, Patients $patient){
        $validated = $request->validate([
            "first_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "last_name" => ['required', 'min:2', 'max:30', 'regex:~^\p{Lu}~u'],
            "contact_num" => ['required', 'phone:PH,US'],
            "diagnosis" => [],
        ], ['first_name.regex' => 'Invalid first name. Please follow the format: "First Name"', 'last_name.regex' => 'Invalid last name. Please follow the format: "Last Name"', 'contact_num.required' => 'The contact number field is required', 'emer_contact_num.required' => 'The emergency contact number field is required']);

        // if($request->hasFile('prescriptions')){
        //     $request->validate([
        //         "prescriptions" => '|mimes:jpeg,png,jpg,zip,pdf,docx|max:10000'
        //     ]);

        //     $filenameWithExtension = $request->file("prescriptions");

        //     $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //     $extension = $request->file("prescriptions")->getClientOriginalExtension();

        //     $filenameToStore = $filename .'_'.time().'.'.$extension;

        //     $request->file('prescriptions')->storeAs('public/patients', $filenameToStore);

        //     $validated['prescriptions'] = $filenameToStore;
        // }

        $patient->update($validated);

        return back()->with('message', 'Update Successful');
    }

    public function destroy(Patients $patient){
        $patient->delete();
        return redirect('/admin/patients')->with('message', 'Patient Deleted Successfully');
    }



}
