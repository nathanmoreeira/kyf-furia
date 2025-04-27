<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bem-vindo - FURIA</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .background {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 30%;
            /* Ajuste a largura da imagem conforme necessário */
            background-image: url('/imagem/background.jpg');
            /* Caminho para a imagem */
            background-size: cover;
            /* Faz com que a imagem cubra a área */
            background-position: center center;
            /* Posiciona a imagem no centro */
            background-repeat: no-repeat;
            /* Impede a repetição da imagem */
            z-index: -1;
            /* Garante que a imagem fique atrás do conteúdo */
        }

        /* Ajuste outros elementos para não sobrepor a imagem */
        .hero {
            position: relative;
            z-index: 1;
            /* Mantém o conteúdo acima da imagem */
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

    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Bem-vindo ao FURIA Fans</h1>
            <p>Conecte-se com os melhores momentos e produtos oficiais.</p>
            <div class="buttons">
                <a href="https://furia.gg/store" target="_blank">Loja Oficial</a>
                <a href="https://furia.gg/" target="_blank">Site Oficial</a>

            </div>
            <br>
            <div class="buttons">
                <a href="{{ route('fan.register') }}" class="register-btn" style="width: 52%;">Cadastre-se como Fan!</a>

            </div>

        </div>
    </section>


    <footer>
        © 2025 FÚRIA Esports. Todos os direitos reservados.
    </footer>

    <!-- Adicionando a imagem de fundo -->
    <div class="background"></div>

</body>

</html>
