@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">🐾 Animais <span>Cadastrados</span></h1>

    <a href="{{ route('animais.create') }}" class="btn-add">+ Cadastrar Novo</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <div class="card-list">
        @foreach ($animais as $animal)
            <div class="card">
                <h2 class="animal-name">
                    @if($animal->tipo == 'Dog') 🐶
                    @elseif($animal->tipo == 'Cat') 🐱
                    @elseif($animal->tipo == 'Coelho') 🐰
                    @else 🐾
                    @endif
                    {{ $animal->nome }}
                </h2>
                <p><strong>Raça:</strong> {{ $animal->raca }}</p>
                <p><strong>Idade:</strong> {{ $animal->idade }} {{ $animal->idade > 1 ? 'anos' : 'ano' }}</p>

                <div class="actions">
                    <a href="{{ route('animais.edit', $animal->id) }}" class="btn-edit">✏️ Editar</a>
                    <form action="{{ route('animais.destroy', $animal->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')" class="btn-delete">🗑️ Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
