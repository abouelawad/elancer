<?php

namespace App\Http\Controllers\Client;

use App\Models\Project;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(): View
    {
     
        $user = Auth::user();
        
        $projects = Project::where('user_id',$user->id)->paginate();
        $projects = $user->projects()->paginate();

        return view('client.projects.index', compact('projects'));
    }

    public function create()
    { 
        $project = new Project();
        return view('client.projects.create',compact('project'));
    }

    public function show($project)
    {
        $user = Auth::user();
        // $project = Project::where('user_id',$user->id)->findOrFail($project);
        $project = $user->projects()->findOrFail($project);
        return view('client.projects.show',compact('project'));
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate(['title'=>'required|string|max:255',
                            'description' =>'required|string',
                            'type'=>'required|in:hourly,fixed',
                            'budget'=>'nullable|numeric|min:0',
                            ]);
        /**
         * This code is a reference for the relation in User model short cut in the line below
         *  $request->merge(['user_id'=>$request->user()->id]); 
         *  $project = Project::create($request->all()); 
         */

        $project = $request->user()->projects()->create($request->all());
        session()->flash('success','a new project has been created');

        return redirect(route('client.projects.index'));
    }

    public function edit($project): View
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project);

        return view('client.projects.edit',compact('project'));
    }

    public function update(Request $request,$project)
    {

        $request->validate(['title'=>'required|string|max:255',
                            'description' =>'required|string',
                            'type'=>'required|in:hourly,fixed',
                            'budget'=>'nullable|numeric|min:0',
                            ]);

        $user = Auth::user();
        $project = $user->projects()->update($request->all());

        session()->flash('success','the project has been updated successfully');
        return redirect(route('client.projects.index'));
    }

    public function destroy($project)
    {
    # code...
    }
}
