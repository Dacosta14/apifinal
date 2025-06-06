@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">✏️ Editar <span>Animal</span></h1>
     <a href="{{ route('animais.create') }}" class="btn-add">+ Cadastrar Novo</a>

    <form action="{{ route('animais.update', $animal->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $animal->nome }}" required>
        </div>

        <div class="form-group">
            <label for="tipo">Espécie:</label>
            <input type="text" name="tipo" id="tipo" value="{{ $animal->tipo }}" required>
        </div>

        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" value="{{ $animal->idade }}" required>
        </div>

        <div class="form-group">
            <label for="raca">Raça:</label>
            <input type="text" name="raca" id="raca" value="{{ $animal->raca }}" required>
        </div>

        <button type="submit" class="btn-submit">💾 Atualizar</button>
    </form>
</div>
@endsection
