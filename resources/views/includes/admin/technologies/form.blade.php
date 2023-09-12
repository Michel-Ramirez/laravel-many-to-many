<div class="d-flex justify-content-center">
    <div class="wrapper">

        @if ($technology->exists)
            <form method="POST" action="{{ route('admin.technologies.update', $technology) }}" class="card p-5">
                @method('PUT')
            @else
                <form method="POST" action="{{ route('admin.technologies.store', $technology) }}" class="card p-5">
        @endif
        @csrf
        <div class="row d-flex justify-content-between">

            {{-- INPUT TITLE --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="label" class="form-label">Nome del tipo</label>
                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label"
                        name="label" value="{{ old('label', $technology->label) }}"autofocus>
                    @error('label')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                {{-- <div class="mb-3"> --}}
                <label for="color_tech" class="form-label">Scegli colore</label>
                <input type="color" name="color" value="{{ old('color', $technology->color) }}" id="color_tech">
                {{-- </div> --}}
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
