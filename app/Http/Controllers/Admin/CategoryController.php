<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
         $request->validate([
                'category_name' => 'required',
                'description'=>'required    '
            ]);

        Category::create([
            'category_name'=>$request->category_name,
            'description'=>$request->description,
            'status'=>$request->status
           
        ]);


    return redirect()->route('categories.index');
    }

    public function edit($id){
        $category = Category::find($id);

        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->update([
            'category_name'=>$request->category_name,
            'description'=>$request->description,
            'status'=>$request->status
        ]);
        return redirect()->route('categories.index');

    }

    public function delete($id){
        Category::destroy($id);
        return redirect()->route('categories.index');
    }

    public function search(Request $request){
        $category = Category::where('category_name','like',"%$request->search%")->paginate(5);
        return view('admin.categories.index',['categories'=>$category, 'search'=>$request->search]);
    }

}
