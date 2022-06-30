@extends('layouts.main')


@section('content')
    <div class="container">
        <h1>Errore 404</h1>
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
@endsection


