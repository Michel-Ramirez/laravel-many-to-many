@extends('layouts.app')

@section('title', 'Modifica il tipo')

@section('content')
    <header class="my-5">
        <h1 class="text-center">Modifica</h1>
    </header>
    <div class="d-flex justify-content-end m-5">
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Torna indietro
        </a>
    </div>
    @include('includes.admin.types.form')
@endsection
