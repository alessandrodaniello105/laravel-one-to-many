<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();

        $title = "Inserisci un nuovo progetto";
        $route = route('admin.projects.store');
        $method = "POST";
        $project = null;

        return view("admin.projects.create-edit", compact("technologies", "types", "title", "route", "method", "project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Project::generateSlug($form_data['title']);

        $new_project = Project::create($form_data);


        return redirect()->route('admin.projects.show', $new_project)->with('success', 'Nuovo progetto inserito con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        $technologies = Technology::all();
        $types = Type::all();

        $title = "Modifica il progetto ''$project->title''";
        $route = route('admin.projects.update', $project);
        $method = "PUT";

        return view('admin.projects.create-edit', compact('technologies', 'types', 'title', 'route', 'method', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if ($form_data['title'] !== $project->title) {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        } else {
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project)->with('success', 'Hai modificato correttamente il progetto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', "Hai correttamente cancellato ''$project->title''.");
    }
}
