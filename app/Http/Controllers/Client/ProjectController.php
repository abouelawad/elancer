<?php

namespace App\Http\Controllers\Client;

use App\Models\Tag;
use App\Models\Project;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Enums\Project as EnumProject; //I didn't need it as I used Enum class directly in the view file
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function index(): View
    {

        $user = Auth::user();

        // $projects = Project::where('user_id',$user->id)->paginate();
        $projects = $user->projects()->with('category.parent','tags')->paginate();


        return view('client.projects.index', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $project->type = $project->types();
        $project->status = $project->statuses();
        $categories = Category::orderBy("id")->pluck('name','id');




        return view('client.projects.create',compact('project','categories'));
    }

    public function show($project)
    {
        $user = Auth::user();
        // $project = Project::where('user_id',$user->id)->findOrFail($project);
        $project = $user->projects()->findOrFail($project);
        return view('client.projects.show',compact('project'));
    }

    public function store(Request $request)//:RedirectResponse
    {

        $request->validate(['title'=>'required|string|max:255',
                            'description' =>'required|string',
                            'type'=>'required|in:hourly,fixed',
                            'budget'=>'nullable|numeric|min:0',
                            ]);

        // dd($request);
        $data = $request->except('attachments');
        if($request->hasFile('attachments'))
        {
            $files = $request->file('attachments');
            $attachments=[];
            foreach($files as $file){
                if($file->isValid()){
                    $path = $file->store('/attachments',['disk'=>'public']);
                    $attachments[]=$path;
                }
            }
            $data['attachments']=$attachments;
        }

        /**
         * This code is a reference for the relation in User model short cut in the line below
         *  $request->merge(['user_id'=>$request->user()->id]);
         *  $project = Project::create($request->all());
         */
        $project = $request->user()->projects()->create($data);
        $tags = explode(',', $request->tags );
        $tagIds=[];

        #prepare tags' data
        foreach($tags as $tagName){
            $tag =  Tag::firstOrCreate([
                'slug'=> Str::slug($tagName),
                ],[
                    'name'=> trim($tagName) ,
                ]);
            $tagIds[] = $tag->id;
        }

        # Save data of tags
        $project->tags()->sync($tagIds);

        #create session with succession
        session()->flash('success','a new project has been created');

        return redirect(route('client.projects.index'));
    }

    public function edit($project): View
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project);
        $categories=Category::orderBy('id')->pluck('name','id');
        $tags = $project->tags->pluck('name')->toArray();

        // dd($project->tags()->pluck('name'),$project->tags->pluck('name')->toArray());

        return view('client.projects.edit',compact('project','categories','tags'));
    }

    public function update(Request $request,$project)
    {
        $request->validate(['title'=>'required|string|max:255',
                            'description' =>'required|string',
                            'type'=>'required|in:hourly,fixed',
                            'budget'=>'nullable|numeric|min:0',
                            ]);


        #retrieve the user and project
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project);
        #check the attachments

        $data=$request->except('attachments');


        if($request->hasFile('attachments')){
        
            $files = $request->file('attachments');
            $attachments=[];
            foreach($files as $file)
            {
                if($file->isValid())
                {
                    $path=$file->store('/attachments',['disk'=>'public']);
                    $attachments[] = $path;
                }
            }

            $data['attachments']=$attachments;
        }




        #clear data of tags from request
        $tags = explode(',',$request->tags);
        $tags_ids = [];

        #prepare tags' data
        foreach($tags as $tagName){
           $tag =  Tag::firstOrCreate([
                'slug'=> Str::slug($tagName),
                ],[
                    'name'=> trim($tagName) ,
                ]);
            $tags_ids[] = $tag->id;
        }

        # Save data of tags
        $project->tags()->sync($tags_ids);

        # Save data of request
        $project->update($data);

        session()->flash('success','the project has been updated successfully');
        return redirect(route('client.projects.index'));
    }

    public function destroy($project)
    {
        Project::destroy($project);
        session()->flash('deleted','project has been deleted successfully');
        return back();
    }
}
