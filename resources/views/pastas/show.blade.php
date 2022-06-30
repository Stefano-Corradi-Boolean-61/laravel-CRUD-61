@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{ $pasta->name }}  <a class="btn btn-primary" href="{{ route('pastas.edit', $pasta) }}">EDIT</a></h1>
        <span class="bg-info badge rounded-pill text-bg-primary">{{ $pasta->type }}</span>

        <div class="row py-5">
            <div class="col-6">
                <img class="img-fluid" src="{{ $pasta->image }}" alt="{{ $pasta->name }}">
            </div>
            <div class="col-6">
                <p>{{ $pasta->description }}</p>
            </div>
        </div>

        <a class="btn btn-secondary mb-5" href="{{ route('pastas.index') }}"><< torna</a>


    </div>
@endsection
