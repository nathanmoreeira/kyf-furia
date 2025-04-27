<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - FÚRIA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f0f0f;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(138, 43, 226, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-container h2 {
            margin-bottom: 30px;
            font-size: 24px;
            color: #e5e5e5;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #ccc;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #2b2b2b;
            color: #fff;
            font-size: 16px;
        }

        .input-group input:focus {
            outline: 2px solid #8a2be2;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #8a2be2;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-button:hover {
            background: #7321cc;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>

</head>

<body>
    <div class="login-container">
        <!-- Logo da Fúria -->
        <img src="{{ asset('imagem/furia@logotyp.us.svg') }}" alt="Logo FURIA" />
        <h2>Login no Sistema FÚRIA</h2>

        <!-- Formulário de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seuemail@furia.gg"
                    value="{{ old('email') }}" required autofocus />
                @error('email')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="" required />
                @error('password')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botão de Login -->
            <button type="submit" class="login-button">Entrar</button>

        </form>

        <!-- Rodapé -->
        <div class="footer">© 2025 FÚRIA Esports</div>
    </div>
</body>

</html>
