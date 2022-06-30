@extends('layouts.main')

@section('content')
    <div class="container my-5">
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
                            value="{{ $pasta->name }}"
                            class="form-control" placeholder="Nome pasta">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" id="type"
                        name="type"
                        value="{{ $pasta->type }}"
                        class="form-control" placeholder="Tipo pasta" >
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="{{ $pasta->image }}" alt=""><br>
                        <label for="image" class="form-label">URL immagine</label>
                        <input type="text" id="image"
                        name="image"
                        value="{{ $pasta->image }}"
                        class="form-control" placeholder="URL immagine" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$pasta->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>

    </div>
@endsection
