@extends('layouts.app')

@section('content')

<style>
    .perfil-page {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Poppins', sans-serif;
        color: white;
    }

    .perfil-page h1 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 40px;
        background: linear-gradient(90deg, #00BFFF, #A020F0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        user-select: none;
    }

    .btn-create {
        display: inline-block;
        margin-bottom: 30px;
        padding: 12px 25px;
        background-color: transparent;
        border: 2px solid #00BFFF;
        border-radius: 12px;
        color: #00BFFF;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-create:hover {
        background-color: #00BFFF;
        color: #000;
        box-shadow: 0 0 15px #00BFFF;
    }

    .grid-perfis {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .perfil-content {
        background-color: #111;
        border-radius: 20px;
        box-shadow: 0 0 15px #00BFFF;
        padding: 25px;
        display: flex;
        gap: 20px;
        align-items: flex-start;
        color: white;
    }

    .perfil-foto img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 3px solid #00BFFF;
        box-shadow: 0 0 15px #00BFFF;
        object-fit: cover;
    }

    .perfil-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .perfil-info-box {
        background-color: #1a1a1a;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 0 10px #00BFFF;
        color: #cce6ff;
    }

    .perfil-info-box h2 {
        margin-bottom: 10px;
        color: #00BFFF;
        font-weight: 700;
        user-select: none;
    }

    .perfil-actions {
        margin-top: 15px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .perfil-actions a button,
    .perfil-actions form button {
        background-color: transparent;
        border: 2px solid #00BFFF;
        border-radius: 12px;
        padding: 10px 25px;
        color: #00BFFF;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .perfil-actions a button:hover,
    .perfil-actions form button:hover {
        background-color: #00BFFF;
        color: #000;
        box-shadow: 0 0 15px #00BFFF;
    }

    /* Remove botão default do link */
    .perfil-actions a {
        text-decoration: none;
    }
</style>

<div class="perfil-page">
    <h1>Lista de Perfis</h1>

    {{-- MOSTRA botão somente se não houver perfis --}}
    @if($perfil->isEmpty())
        <a href="{{ route('perfil.create') }}" class="btn-create">Criar novo perfil</a>
    @endif

    <div class="grid-perfis">
        @foreach ($perfil as $p)
            <div class="perfil-content">
              <div class="perfil-foto">
    <img src="{{ $p->foto ? asset('storage/fotos/' . $p->foto) : 'https://via.placeholder.com/150' }}" alt="Foto de {{ $p->nome }}">
</div>


                <div class="perfil-info">
                    <div class="perfil-info-box">
                        <h2>Informações de Contato</h2>
                        <p><strong>Email:</strong> {{ $p->email }}</p>
                    </div>

                    <div class="perfil-info-box">
                        <h2>Informações Gerais</h2>
                        <p><strong>Nome:</strong> {{ $p->nome }}</p>
                        <p><strong>Data de nascimento:</strong> {{ $p->data_nascimento }}</p>
                        <p><strong>Departamento:</strong> {{ $p->departamento }}</p>
                        <p><strong>Supervisor:</strong> {{ $p->supervisor }}</p>
                    </div>

                    <div class="perfil-info-box">
                        <h2>Informações Adicionais</h2>
                        <p><strong>Grupos:</strong> {{ $p->grupos }}</p>
                    </div>

                    <div class="perfil-actions">
                        <a href="{{ route('perfil.edit', $p->id) }}">
                            <button type="button">Editar</button>
                        </a>

                        <form action="{{ route('perfil.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
