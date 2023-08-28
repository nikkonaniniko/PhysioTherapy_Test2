<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\Prescriptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
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
        
        return view('prescriptions.index', ['prescriptions' => $data]);
    }

    public function create(){
        return view('prescriptions.create')->with('title', 'Add New');
    }

    public function createFromPatient(){
        // $prescriptions = Prescriptions::with('patients')->get();
        // $patients = Patients::with('prescriptions')->get();

        // return view('prescriptions.createFromPatient')->with('prescriptions', 'patients');
        return view('prescriptions.createFromPatient')->with('title', 'Add New');
    }

    public function store(Request $request){

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

    public function view($id){
        $data = Prescriptions::findOrFail($id);
        return view('prescriptions.show', ['prescription'=>$data]);
    }

    public function viewFromPatient($id){
        $data = Prescriptions::findOrFail($id);
        return view('prescriptions.viewFromPatient', ['prescription'=>$data]);
    }

    public function download(Request $request,$filename){
        return response()->download(public_path('storage/patients/'.$filename));
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

        return back()->with('message', 'Prescription Updated');
    }

    public function destroy(Prescriptions $prescription){
        $prescription->delete();
        return redirect('/admin/prescriptions')->with('message', 'Prescription Deleted Successfully');
    }
}
