<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index(){
        $medicines= Medicine::with('category')
        ->latest()
        ->get();
        return view('admin.medicines.index',compact('medicines'));
    }

    public function create(){
        $categories = Category::where('status','active')->get();

        return view('admin.medicines.create',compact('categories'));
    }

    public function store(Request $request){

    $request->validate([

        'category_id' => 'required',
        'medicine_name' => 'required',
        'expiry_date' => 'required',
        'purchase_price' => 'required|numeric',
        'wholesale_price' => 'required|numeric',
        'retail_price' => 'required|numeric',
        'stock' => 'required|integer',

    ]);
        Medicine::create($request->all());

        return redirect()->route('medicines.index');
    }

    public function edit($id){
        $medicine = Medicine::find($id);
        $categories = Category::all();

        return view('admin.medicines.edit',compact('medicine','categories'));
    }
    public function update(Request $request,$id){
        $medicine = Medicine::find($id);
        $medicine->update($request->all());

        return redirect()->route('medicines.index');

    }

    public function delete($id){
        Medicine::destroy($id);
        return redirect()->route('medicines.index');
    }

    public function show($id){
        $medicine = Medicine::with('category')->find($id);
        return view('admin.medicines.show',compact('medicine'));
    }
}
