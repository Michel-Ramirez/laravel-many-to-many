@extends('layouts.app')

@section('title', 'Tipi di progetto')

@section('content')

    <header>
        <h1 class="text-center my-5">Lista dei tuoi progetti</h1>
    </header>
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('admin.types.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus me-2"></i>Aggiungi progetto
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Colore</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultimo aggiornamento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->label }}</td>
                    <td>
                        <span>{{ $type->color }}</span>
                    </td>
                    <td>{{ $type->created_at }}</td>
                    <td>{{ $type->updated_at }}</td>
                    <th>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-light mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.types.destroy', $type) }}" method="post">
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
