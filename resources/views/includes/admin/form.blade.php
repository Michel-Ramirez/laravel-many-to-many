<div class="d-flex justify-content-center">
    <div class="wrapper">

        @if ($project->exists)
            <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="card p-5"
                enctype="multipart/form-data">
                @method('PUT')
            @else
                <form method="POST" action="{{ route('admin.projects.store', $project) }}" class="card p-5"
                    enctype="multipart/form-data">
        @endif
        @csrf
        <div class="row d-flex justify-content-between">

            {{-- INPUT TITLE --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo del progetto</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $project->title) }}"autofocus>
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo di progetto</label>
                    <select class="form-select form-select" id="type" name="type_id">
                        <option value="">Nessuno</option>


                        @foreach ($types as $type)
                            {{-- ? = $project->type è isset? true allora dammi il id altrimenti settalo a null (in termine tecnico "null safe operator") --}}
                            <option @if (old('type_id', $project->type?->id) == $type->id) selected @endif value="{{ $type->id }}">
                                {{ $type->label }}</option>
                        @endforeach


                    </select>
                </div>
            </div>

            {{-- SLUG --}}
            @if ($project->exists)
                <div class="col-4">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug"
                            value="{{ old('slug', $project->slug) }}" disabled>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">

            {{-- INPUT LOAD IMG --}}
            <div class="col-7">
                <div class="mb-3">
                    <label for="img" class="form-label">Carica uno screenshot</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" id="img"
                        name="image">
                    @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- PREVIEW --}}

            <div class="col-5 d-flex justify-content-center">
                <figure>
                    <img src="http://marcolanci.it/utils/placeholder.jpg" alt="" class="img-fluid">
                </figure>
            </div>
        </div>

        {{-- BUTTON GROUP --}}
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <button class="btn btn-warning me-3">Reset</button>
                <button class="btn btn-success">Invia</button>
            </div>
        </div>
        </form>

    </div>
</div>

@section('scripts')
    <script>
        const placeHolder = 'http://marcolanci.it/utils/placeholder.jpg';
        const
    </script>
@endsection
