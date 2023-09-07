<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();

        // $request->validate([
        //     'label' => ['required', 'string', Rule::unique('types')],
        //     'color' => 'required|exists:types,color'
        // ], [
        //     'label.required' => 'Questo campo è richiesto',
        //     'label.unique' => 'Questo tipo esiste già',
        //     'color.required' => 'Devi selezionare un colore',
        //     'color.exists' => 'Questo colore esiste già'
        // ]);

        $type = new Type();
        $type->fill($data);
        $type->save();

        return to_route('admin.types.index', $type);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('types')->ignore($type->id)],
            // 'color' => 'required|exists:types,color'
        ], [
            'label.required' => 'Questo campo è richiesto',
            'label.unique' => 'Questo tipo esiste già',
            'color.required' => 'Devi selezionare un colore',
            'color.exists' => 'Questo colore esiste già'
        ]);

        $data = $request->all();
        $type->update($data);

        return to_route('admin.types.index', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->forceDelete();

        return to_route('admin.types.index');
    }
}
