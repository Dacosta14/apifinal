@section('content')
<style>
    /* Estilo para botões Editar e Excluir na lista de perfis */
    .perfil-actions button {
        background-color: transparent;
        border: 2px solid #00d9ff;
        color: #00d9ff;
        padding: 8px 16px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
        outline: none;
    }

    .perfil-actions button:hover {
        background-color: #00d9ff;
        color: #000;
        box-shadow: 0 0 10px #00d9ff;
    }

    /* Espaçamento entre os botões */
    .perfil-actions button + button {
        margin-left: 10px;
    }
</style>

<!-- seu HTML continua aqui normalmente -->
<div class="perfil-page">
    <h1>Lista de Perfis</h1>
    <link rel="stylesheet" href="style.css">

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        @foreach ($perfil as $p)
            <div class="perfil-content">
              <div class="perfil-foto">
    <img src="{{ $p->foto ? asset('storage/' . $p->foto) : 'https://via.placeholder.com/150' }}" alt="Foto de {{ $p->nome }}">
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
    
                    </div>

                
                    <div class="perfil-actions">
                        <a href="{{ route('perfil.edit', $p->id) }}">
                            <button type="button" class="btn-edit">Editar</button>
                        </a>

                        <form action="{{ route('perfil.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
