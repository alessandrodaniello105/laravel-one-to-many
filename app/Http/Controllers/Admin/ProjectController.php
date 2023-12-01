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
        // definisco le tecnologie e i tipi nelle proprie variabili e le passo alla view tramite il compact
        $technologies = Technology::all();
        $types = Type::all();

        // per rendere unica la pagina di create e edit abbiamo bisogno di rendere dinamici questi parametri che hanno in comune
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
        // salvo in una variabile i dati che mi arrivano dal form di creazione
        $form_data = $request->all();

        // invoco la funzione di generazione dello slug
        $form_data['slug'] = Project::generateSlug($form_data['title']);

        // se esiste la chiave image salvo l'immagine nel file system e nel database
        if(array_key_exists('image', $form_data)) {

            // prima di salvare il file salvo il suo nome originale nel db
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            // salvo l'immagine nelo storage, rinominandolo
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }

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

        if(array_key_exists('image', $form_data)){

            // se esiste la chiave image vuol dire che devo sostituire l'immagine presente (se c'è) eliminando quella vecchia
            if($project->image){
                Storage::disk('public')->delete($project->image);

            }

            // prima di salvare il file prendo il nome del file per salvarlo nel db
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo il file nello storage rinominandolo
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
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
