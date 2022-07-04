@extends('layouts.main')

@section('content')
    <div class="container my-5">

        <div class="row">
            {{-- $errors->any() restituisce true o false le ci sono o meno errori --}}
            @if ($errors->any())
            <div class="col-8 offset-2 alert alert-danger">
                    <ul>
                        {{-- $errors->all() reistituisce l'array ceon tutti gli errori --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif

        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="mb-3">Modifica di: {{ $pasta->name }}</h2>
                <form action="{{ route('pastas.update', $pasta) }}" method="POST">
                    {{-- @csrf deve essere inserito in tutti i form altrimenti il form non è valido --}}
                    @csrf
                    {{-- se il method è PUT|PATCH|DELETE nel tag form mettere method="POST" e aggiungere in @method in blade --}}
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome pasta</label>
                        {{-- il name dell'input deve corrispondere al nome della colonna della tabella di riferimento --}}
                        <input type="text" id="name"
                            name="name"
                            value="{{ old('name', $pasta->name) }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nome pasta">
                            @error('name')
                                <p class="error-msg"> {{$message}} </p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" id="type"
                        name="type"
                        value="{{ old('type', $pasta->type) }}"
                        class="form-control @error('type') is-invalid @enderror"
                        placeholder="Tipo pasta" >
                        @error('type')
                            <p class="error-msg"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="{{ $pasta->image }}" alt=""><br>
                        <label for="image" class="form-label">URL immagine</label>
                        <input type="text" id="image"
                        name="image"
                        value="{{ old('image', $pasta->image) }}"
                        class="form-control @error('image') is-invalid @enderror"
                        placeholder="URL immagine" >
                        @error('image')
                            <p class="error-msg"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        name="description" id="description" cols="30" rows="10">{{ old('description', $pasta->description) }}</textarea>
                        @error('description')
                            <p class="error-msg"> {{$message}} </p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>

    </div>
@endsection
