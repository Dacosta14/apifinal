<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Animais</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        nav {
            background-color: #0d0d0d;
            padding: 20px 0;
            box-shadow: 0 0 10px #00BFFF;
            text-align: center;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #00BFFF;
            font-weight: bold;
            transition: 0.3s;
        }

        nav a:hover {
            color: #A020F0;
        }

        main {
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 80vh;
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('animais.index') }}">Home</a>
        <a href="{{ route('animais.create') }}">Cadastrar</a>
        <a href="{{ route('perfil.index') }}">Perfil</a>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
