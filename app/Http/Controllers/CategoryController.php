<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View as ViewView;

class CategoryController extends Controller 
{
    public function index() : View
    {
        $categories = Category::get();
        


        return view('categories.index',compact('categories'));
    }

    public function show($category) :View
    {
        $category = Category::findOrFail($category);
        
        return view('categories.show',['category'=>$category]);
    }

    public function create() : View
    {
        $category= new Category ;
        $categories = Category::get();
        return view('categories.create',compact('categories', 'category'));
    }

    public function store(Request $request) //: RedirectResponse
    {
        $this->validateInputs($request);
       

        Category::create($request->all());

       session()->flash('success','a new category has been created');
        return redirect('categories');
    }

    public function edit($category)
    {
        
        $category = Category::findOrFail($category);
        $categories = Category::all();
        return view('categories.edit' ,compact('categories', 'category'));
    }

    public function update(Request $request, $category) : RedirectResponse
    {
        $category = Category::findOrFail($category);
        $this->validateInputs($request) ;   
        $category->update($request->all());
       session()->flash('success','a new category has been edited');
        
        return redirect('categories');
    }

    public function destroy($category) :RedirectResponse
    {
        Category::destroy($category);
       session()->flash('success','a category has been deleted');

        return back();
    }

    private function validateInputs($request) :array
    {
        $rules = [
            'name'       => 'required|string|between:3,255',
            'description'=>'required|string',
            'parent_id'  =>'nullable|exists:categories,id',
            'image'      =>'nullable|image',
        ];
        $messages = ['name'=>'the field :attribute is wrong ']; //example for edit error messages

        return $request->validate($rules,$messages);
    }
}
