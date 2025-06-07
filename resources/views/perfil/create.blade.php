@extends('layouts.app')

@section('content')

<style>
    form {
        max-width: 500px;
        margin: 30px auto;
        background-color: #111;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px #00d9ff;
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #00d9ff;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: none;
        background-color: #222;
        color: white;
        box-shadow: 0 0 5px #00d9ff;
        margin-bottom: 20px;
        outline: none;
        transition: 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    input[type="file"]:focus {
        background-color: #333;
        box-shadow: 0 0 10px #00d9ff;
    }

    button[type="submit"] {
        background-color: transparent;
        border: 2px solid #00d9ff;
        color: #00d9ff;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: bold;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #00d9ff;
        color: #000;
        box-shadow: 0 0 15px #00d9ff;
    }

    .errors {
        max-width: 500px;
        margin: 20px auto;
        background: #330000;
        padding: 15px 20px;
        border-radius: 10px;
        color: #ff6666;
        font-weight: bold;
    }
</style>

<h1 style="text-align:center; color: #00d9ff; margin-top: 40px;">Criar Perfil</h1>

@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" accept="image/*">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}">

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}">


    <button type="submit">Salvar</button>
</form>

@endsection
