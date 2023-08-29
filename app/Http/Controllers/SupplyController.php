<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class SupplyController extends Controller
{
    public function index(){
        $data = array('supplies' => DB::table('supplies')->orderBy('created_at','desc')->simplePaginate(10));
        return view('supplies.index', $data);
    }

    public function show($id){
        $data = Supplies::findOrFail($id);
        return view('supplies.edit', ['supply'=>$data]);
    }

    public function create(){
        return view('supplies.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:2', 'max:100',],
            "category" => ['required','in:"massage","therapy"'],
            "quantity" => ['required'],
            "expiration" => ['required', 'after:yesterday'],
            "description" => ['required','min:2','max:1000']
        ]);

        supplies::create($validated);

        return redirect('/admin/supplies')->with('message', 'New Supply Added Successfully');
    }

    public function update(Request $request, Supplies $supply){
        $validated = $request->validate([
            "name" => ['required', 'min:2', 'max:100',],
            "category" => ['required','in:"massage","therapy"'],
            "quantity" => ['required'],
            "expiration" => ['required', 'after:yesterday'],
            "description" => ['required','min:2','max:300']
        ]);

        $supply->update($validated);

        return back()->with('message', 'Update Successful');
    }

    public function destroy(Supplies $supply){
        $supply->delete();
        return redirect('/admin/supplies')->with('message', 'Supply Deleted Successfully');
    }
}
