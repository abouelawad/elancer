<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View as ViewView;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\View as FacadesView;

class CategoryController extends Controller 
{
    public function index() : View
    {
        $categories = Category::leftJoin('categories as parents', 'parents.id','=','categories.parent_id')->
                                select(['categories.*',
                                        'parents.name as parent_name'])->
                                paginate(5,'*','p');
        


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
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Category::create($data);

       session()->flash('success','a new category has been created');
        return redirect('categories');
    }

    public function edit($category) : View
    {
        
        $category = Category::findOrFail($category);
        $categories = Category::all();
        return view('categories.edit' ,compact('categories', 'category'));
    }

    public function update(Request $request, $category) : RedirectResponse
    {
        $category = Category::findOrFail($category);
        $this->validateInputs($request,$category) ;   
        $category->update($request->all());
       session()->flash('warning','a new category has been edited');
        
        return redirect('categories');
    }
    public function destroy($category) :RedirectResponse
    {
        Category::destroy($category);
       session()->flash('deleted','a category has been deleted');

        return back();
    }

    private function validateInputs($request,$category = null ) :array
    {

        
        $rules = [
                /*
                #NOTE - two approach methods to exclude the current id in edit 
                */

            // 'name'       =>'required|string|between:3,255|unique:categories,name,'.(($category->id)??""),
            'name'       =>'required|string|between:3,255|'.Rule::unique('categories','name')->ignore($category->id??""),
            'description'=>'required|string',
            'parent_id'  =>'nullable|exists:categories,id',
            'image'      =>'nullable|image',
            
        ];
        $messages = ['name'=>'the field :attribute is wrong ']; //example for edit error messages
        return $request->validate($rules,$messages);
    }
}
