<?php

namespace App\Http\Controllers\Admin;


use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $technology = new Technology();
        return view('admin.technologies.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'label' => ['required', 'string', Rule::unique('types')],
            // 'color' => 'required|exists:types,color'
        ], [
            'label.required' => 'Questo campo è richiesto',
            'label.unique' => 'Questo tipo esiste già',
            'color.required' => 'Devi selezionare un colore',
            'color.exists' => 'Questo colore esiste già'
        ]);

        $technology = new Technology();
        $technology->fill($data);
        $technology->save();

        return to_route('admin.types.index', $technology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('types')->ignore($technology->id)],
            'color' => 'required|exists:types,color'
        ], [
            'label.required' => 'Questo campo è richiesto',
            'label.unique' => 'Questo tipo esiste già',
            'color.required' => 'Devi selezionare un colore',
            'color.exists' => 'Questo colore esiste già'
        ]);

        $data = $request->all();
        $technology->update($data);

        return to_route('admin.types.index', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->forceDelete();

        return to_route('admin.technologies.index');
    }
}
