@extends('layouts.main')

@section('content')
<div class="container">

    {{-- verifico che esista in sessione il messaggio di elinazione prodotto
    se esiste lo stampo --}}
    @if(session('prodotto_cancellato'))
        <div class="alert alert-success" role="alert">
            {{ session('prodotto_cancellato') }}
        </div>
    @endif



    <h1>Le nostre paste</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($pastas as $pasta)
              <tr>
                <th scope="row">{{ $pasta->id }}</th>
                <td>{{ $pasta->name }}</td>
                <td>{{ $pasta->type }}</td>
                <td>
                    {{-- il bottone SHOW punta alla rotta pastas.show passando l'id come parametro --}}
                    {{-- passando direttamente l'oggetto l'eemeto passato sarà l'id --}}
                    <a class="btn btn-success" href="{{ route('pastas.show', $pasta) }}">SHOW</a>
                    <a class="btn btn-primary" href="{{ route('pastas.edit', $pasta) }}">EDIT</a>
                    {{-- per il tasto delete ho bisogno del method DELETE e con un link non è possibile
                    quindi ho bisgono di un form --}}
                    <form class="d-inline"
                        onsubmit="return confirm('confermi l\'eliminazione di: {{ $pasta->name }}?')"
                        action="{{ route('pastas.destroy', $pasta) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >DELETE</button>
                    </form>
                </td>
              </tr>

            @endforeach



        </tbody>
      </table>

</div>
@endsection
