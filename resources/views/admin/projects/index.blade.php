@extends('layouts.app')

@section('title', 'Projects')

@section('content')

    <header>
        <h1 class="text-center my-5">Lista dei tuoi progetti</h1>
    </header>
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus me-2"></i>Aggiungi progetto
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Tipo di progetto</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultima modica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    @if ($project->type)
                        <td>
                            <span class="badge fs-6"
                                style="background-color:{{ $project->type->color }} ">{{ $project->type->label }}</span>
                        </td>
                    @else
                        -
                    @endif
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <th>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-light">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-light mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </th>
                </tr>
            @empty
                <h3 class="text-center" colspan="6">Non ci sono progetti da visualizzare</h3>
            @endforelse
        </tbody>
    </table>
@endsection
