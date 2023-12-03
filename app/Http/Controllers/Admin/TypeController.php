<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        $sel_type = null;

        return view("admin.types.index", compact("types", 'sel_type'));
    }

    public function typeProjects() {
        $types = Type::all();
        return view('admin.types.type-projects', compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route("admin.technologies.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Helper::generateSlug($form_data['name'], Type::class);

        $new_type = Type::create($form_data);

        return redirect()->route('admin.types.index')->with('success', "Hai inserito con successo un nuovo tipo di progetto dal nome ''$new_type->name''");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        // $sel_type = Type::find($type->id);
        $types = Type::all();

        $sel_type = $type;
        return view('admin.types.index', compact('sel_type', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $form_data = $request->all();
        $form_data['slug'] = Helper::generateSlug($form_data['name'], Type::class);

        $type->update($form_data);

        return redirect()->route('admin.types.index', compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', "Hai correttamente cancellato ''$type->name''.");
    }
}
