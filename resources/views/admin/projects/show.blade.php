@extends('layouts.app')
@section('title', 'Dettagli')

@section('content')

    <div class="d-flex justify-content-end my-5">
        <a href="{{ route('admin.projects.index') }}" class="me-3 btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Torna indietro
        </a>
        <a href="{{ route('admin.projects.edit', $project) }}" class="me-3 btn btn-sm btn-warning">
            <i class="fa-regular fa-pen-to-square me-2"></i> Modifica
        </a>
        <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="fa-solid fa-trash-can me-2"></i> Elimina
            </button>
        </form>
    </div>
    <div class="row my-5">
        <div class="col-8">
            <h1>{{ $project->title }}</h1>
            <p class="">{{ $project->description }}</p>
        </div>
        <div class="col-4">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
        </div>
    </div>
    <div class="d-flex mt-5">
        <p>Progetto creato il: {{ $project->created_at }}</p>
        <p class="ms-3">Ultima modifica: {{ $project->updated_at }}</p>
    </div>
    <div>
        <strong>Tipo di progetto:</strong>
        @if ($project->type)
            <span class="badge fs-6" style="background-color: {{ $project->type->color }}">
                {{ $project->type->label }}</span>
        @else
            <small>Non assegnato</small>
        @endif
    </div>
@endsection
