@extends('layouts.app')

@section('content')

<style>
    h1 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 40px;
        background: linear-gradient(90deg, #00BFFF, #A020F0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        user-select: none;
        font-family: 'Poppins', sans-serif;
    }

    form {
        display: flex;
        flex-direction: column;
        max-width: 600px;
        width: 100%;
        margin: 0 auto 50px auto;
        background-color: #111;
        padding: 30px 40px;
        border-radius: 20px;
        box-shadow: 0 0 20px #00BFFF;
        color: white;
        font-family: 'Poppins', sans-serif;
        gap: 4px
    }

    label {
        display: block;
        font-weight: 600;
        color: #00BFFF;
        user-select: none;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="file"] {
        margin: 0 0 12px 0;
        width: 100%;
        padding: 10px 12px;
        border-radius: 12px;
        border: 2px solid #00BFFF;
        background-color: #222;
        color: white;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    input[type="file"]:focus {
        outline: none;
        border-color: #A020F0;
        box-shadow: 0 0 8px #A020F0;
    }

    button[type="submit"] {
        display: block;
        margin: 12px 0 0 0;
        width: 100%;
        background-color: transparent;
        border: 2px solid #00BFFF;
        border-radius: 12px;
        padding: 12px;
        font-weight: 700;
        color: #00BFFF;
        cursor: pointer;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        user-select: none;
    }

    button[type="submit"]:hover {

        background-color: #00BFFF;
        color: #000;
        box-shadow: 0 0 15px #00BFFF;
    }

    img {
        border-radius: 12px;
        margin-bottom: 20px;
        border: 3px solid #00BFFF;
        box-shadow: 0 0 15px #00BFFF;
    }

    /* Estilo para erros */
    div[style*="color: red"] {
        max-width: 600px;
        margin: 0 auto 20px auto;
        background-color: #330000;
        border: 2px solid #ff4d4d;
        border-radius: 12px;
        padding: 15px 20px;
        color: #ff9999;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        user-select: none;
    }

    div[style*="color: red"] ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<h1>Editar Perfil</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('perfil.update', $perfil->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Foto atual:</label><br>
    @if($perfil->foto)
        <img src="{{ asset('storage/fotos/' . $perfil->foto) }}" alt="Foto" width="100"><br><br>
    @endif


    <label>Nome:</label><br>
    <input type="text" name="nome" value="{{ old('nome', $perfil->nome) }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $perfil->email) }}"><br><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $perfil->data_nascimento) }}"><br><br>

    <button type="submit">Atualizar</button>
</form>
@endsection
