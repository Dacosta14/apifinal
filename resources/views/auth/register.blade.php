@extends('layouts.app') <!-- Ou use layout que tiver -->

@section('content')
<div class="container">
    <h2>Cadastro</h2>
    <form id="form-register">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <p id="mensagem"></p>
</div>

<script>
    document.getElementById('form-register').addEventListener('submit', async function (e) {
        e.preventDefault();

        const nome = document.getElementById('nome').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ nome, email, password })
        });

        const data = await response.json();
        document.getElementById('mensagem').innerText = data.message;

        if (data.token) {
            localStorage.setItem('token', data.token);
            window.location.href = '/dashboard'; // redirecionar se quiser
        }
    });
</script>
@endsection
