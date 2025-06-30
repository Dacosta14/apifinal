@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Login</h2>
    <form id="form-login">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="{{ route('register.form') }}">Cadastre-se aqui</a></p>


    <p id="mensagem"></p>
</div>

<script>
    document.getElementById('form-login').addEventListener('submit', async function (e) {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();
        document.getElementById('mensagem').innerText = data.message;

        if (data.token) {
            localStorage.setItem('token', data.token);
            window.location.href = '/perfil'; // redireciona se quiser
        }
    });
</script>
@endsection
