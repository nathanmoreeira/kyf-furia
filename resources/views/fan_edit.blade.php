<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fã - FURIA</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            background-color: #0d0d0d;
            color: white;
            font-family: Arial, sans-serif;

            margin: 0;
        }

        .register-container {
            max-width: 500px;
            margin: 50px auto;
            background: #1a1a1a;
            width: 50%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(138, 43, 226, 0.7);
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;

        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            background: #333;
            border: 1px solid #8a2be2;
            color: white;
            border-radius: 6px;
        }

        .submit-btn {
            width: 100%;
            background: #8a2be2;
            border: none;
            padding: 12px;
            margin-top: 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #6a1ab1;
        }
    </style>
</head>

<body>
    @auth
        <header
            style="height: 7%; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; background-color: #1a1a1a;">
            <!-- Logo à esquerda -->
            <a href="{{ route('home') }}">
                <img src="/imagem/furia@logotyp.us.svg" alt="Logo FURIA" style="width: 30%;" />
            </a>

            <!-- Nome do usuário e botão de logout à direita -->
            <div class="right" style="display: flex; align-items: center; gap: 20px;">
                <span class="user-info" style="color: #fff; font-size: 16px;">{{ Auth::user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn"
                        style="background: #8a2be2; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; font-size: 14px;">
                        Sair
                    </button>
                </form>
            </div>
        </header>
    @endauth

    @guest
        <header style="height: 7%">
            <a href="{{ route('home') }}">
                <img src="/imagem/furia@logotyp.us.svg" alt="Logo FURIA" />
            </a>
            <a href="{{ route('login') }}" class="login-btn">Login</a>
        </header>
    @endguest
    <div class="register-container">
        <h1><strong> Editar Fan</strong></h1>

        @if ($errors->any())
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('fan.update', $fan->id) }}" method="POST">
            @csrf

            <!-- Seção: Dados Pessoais -->
            <h2 style="margin-top: 20px; margin-bottom: 10px; font-size: 18px; border-bottom: 1px solid #8a2be2;">Dados
                Pessoais</h2>
            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="name" required value="{{ $fan->name }}">
            </div>

            <div class="form-group">
                <label for="birth_date">Data de Nascimento</label>
                <input type="date" id="birth_date" name="birth_date" required value="{{ $fan->birth_date }}">
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required value="{{ $fan->cpf }}">
            </div>

            <!-- Seção: Contato -->
            <h2 style="margin-top: 30px; margin-bottom: 10px; font-size: 18px; border-bottom: 1px solid #8a2be2;">
                Contato</h2>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required value="{{ $fan->email }}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" id="instagram" name="instagram" value="{{ $fan->instagram }}">
            </div>

            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" id="twitter" name="twitter" value="{{ $fan->twitter }}">
            </div>

            <!-- Seção: Endereço -->
            <h2 style="margin-top: 30px; margin-bottom: 10px; font-size: 18px; border-bottom: 1px solid #8a2be2;">
                Endereço</h2>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required value="{{ $fan->endereco }}">
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" required value="{{ $fan->numero }}">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" required value="{{ $fan->cidade }}">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" required value="{{ $fan->estado }}">
            </div>

            <!-- Seção: Preferências -->
            <h2 style="margin-top: 30px; margin-bottom: 10px; font-size: 18px; border-bottom: 1px solid #8a2be2;">
                Preferências</h2>
            <div class="form-group">
                <label for="favorite_sport">E-Sport Favorito</label>
                <input type="text" id="favorite_sport" name="favorite_sport" value="{{ $fan->favorite_sport }}">
            </div>

            <div class="form-group">
                <label for="favorite_player">Jogador da FURIA Favorito</label>
                <input type="text" id="favorite_player" name="favorite_player"
                    value="{{ $fan->favorite_player }}">
            </div>

            <button type="submit" class="submit-btn">Salvar</button>
        </form>


    </div>

</body>

</html>
