@extends('layouts.app')

@section('title', 'Tipi di progetto')

@section('content')

    <header>
        <h1 class="text-center my-5">Lista delle tecnologie</h1>
    </header>
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus me-2"></i>Aggiungi progetto
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultimo aggiornamento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($technologies as $tech)
                <tr>
                    <th scope="row">{{ $tech->id }}</th>
                    <td>
                        <span class="badge rounded-pill text-bg-{{ $tech->color }}">
                            {{ $tech->label }}
                        </span>
                    </td>
                    <td>{{ $tech->created_at }}</td>
                    <td>{{ $tech->updated_at }}</td>
                    <th>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.technologies.edit', $tech) }}" class="btn btn-sm btn-light mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.technologies.destroy', $tech) }}" method="post">
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
