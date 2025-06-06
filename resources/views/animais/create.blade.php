@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">➕ Cadastrar <span>Animal</span></h1>

    <form action="{{ route('animais.store') }}" method="POST" class="form">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="tipo">Espécie:</label>
            <input type="text" name="tipo" id="tipo" required>
        </div>

        <div class="form-group">
            <label for="raca">Raça:</label>
            <input type="text" name="raca" id="raca" required>
        </div>

        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>
        </div>

        <button type="submit" class="btn-submit">💾 Salvar</button>
    </form>
</div>
@endsection
