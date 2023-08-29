<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class EquipmentController extends Controller
{
    public function index(){
        $data = array('equipments' => DB::table('equipments')->orderBy('created_at','desc')->simplePaginate(10));
        return view('equipments.index', $data);
    }

    public function show($id){
        $data = Equipments::findOrFail($id);
        return view('equipments.edit', ['equipment'=>$data]);
    }

    public function create(){
        return view('equipments.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:2', 'max:100',],
            "category" => ['required','in:"massage","therapy"'],
            "quantity" => ['required'],
            "expiration" => ['required', 'after:yesterday'],
            "description" => ['required','min:2','max:1000']
        ]);

        Equipments::create($validated);

        return redirect('/admin/equipment')->with('message', 'New Equipment Added Successfully');
    }

    public function update(Request $request, Equipments $equipment){
        $validated = $request->validate([
            "name" => ['required', 'min:2', 'max:100',],
            "category" => ['required','in:"massage","therapy"'],
            "quantity" => ['required'],
            "expiration" => ['required', 'after:yesterday'],
            "description" => ['required','min:2','max:300']
        ]);

        $equipment->update($validated);

        return back()->with('message', 'Update Successful');
    }

    public function destroy(Equipments $equipment){
        $equipment->delete();
        return redirect('/admin/equipment')->with('message', 'Equipment Deleted Successfully');
    }
}
