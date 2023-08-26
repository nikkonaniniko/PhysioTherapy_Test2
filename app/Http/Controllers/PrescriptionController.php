<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\Prescriptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PrescriptionController extends Controller
{
    public function index() {

        $data = DB::table('patients')
            ->join('prescriptions', 'patients.id', '=', 'prescriptions.patients_id')
            ->orderBy('updated_at','desc')
            ->select('patients.last_name', 'prescriptions.*')
            ->simplePaginate(10);
            // ->get();
            
        // $data = array('prescriptions' => DB::table('prescriptions')->orderBy('created_at','desc')->simplePaginate(10));
        return view('prescriptions.index', ['prescriptions' => $data]);
    }

    public function create(){
        return view('prescriptions.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        // $data = DB::table('patients')
        //     ->join('prescriptions', 'patients.id', '=', 'prescriptions.patients_id')
        //     ->select('patients.last_name', 'prescriptions.*')
        //     ->get();

        $validated = $request->validate([
            // "time" => ['required'],
            // "date" => ['required','date'],
            "filename" => 'mimes:jpeg,png,jpg,zip,pdf,docx|max:10000',
            "patients_id" => ['required','int']
        ]);

            $filenameWithExtension = $request->file("filename");

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("filename")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $request->file('filename')->storeAs('public/patients', $filenameToStore);

            $validated['filename'] = $filenameToStore;

            Prescriptions::create($validated);

        return redirect('/admin/prescriptions')->with('message', 'Prescription Added Successfully');;
    }
        

    public function update(Request $request, Prescriptions $prescription){
        $validated = $request->validate([
            "filename" => '|mimes:jpeg,png,jpg,zip,pdf,docx|max:10000',
            "patients_id" => $request->patients_id
        ]);

            $filenameWithExtension = $request->file("filename");

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("filename")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $request->file('filename')->storeAs('public/patients', $filenameToStore);

            $validated['filename'] = $filenameToStore;

        $prescription->update($validated);

        return back()->with('message', 'Prescription Added');
    }
}
