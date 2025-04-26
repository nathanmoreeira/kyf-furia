<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bem-vindo - FÚRIA</title>
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
      flex-direction: column;
    }

    header {
      width: 100%;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(0,0,0,0.7);
    }

    header img {
      width: 80px;
    }

    .login-btn {
      padding: 10px 20px;
      background: #8a2be2;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.3s;
    }

    .login-btn:hover {
      background: #7321cc;
    }

    .hero {
      flex: 1;
      background: url('https://pbs.twimg.com/media/FtqX0u4XgAIs8uH?format=jpg&name=large') no-repeat center center/cover;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px;
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15,15,15,0.6);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 600px;
    }

    .hero-content h1 {
      font-size: 48px;
      margin-bottom: 20px;
      animation: fadeInDown 1s ease;
    }

    .hero-content p {
      font-size: 18px;
      margin-bottom: 30px;
      color: #ccc;
      animation: fadeInUp 1s ease;
    }

    .buttons {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .buttons a {
      padding: 12px 24px;
      background: #8a2be2;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .buttons a:hover {
      background: #7321cc;
    }

    footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #666;
      background: rgba(0,0,0,0.8);
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
@auth
<header style="height: 7%; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; background-color: #1a1a1a;">
  <!-- Logo à esquerda -->
  <a href="{{ route('home') }}">
    <img src="/imagem/furia@logotyp.us.svg" alt="Logo FURIA" style="width: 30%;"/>
  </a>
  <!-- Nome do usuário e botão de logout à direita -->
  <div class="right" style="display: flex; align-items: center; gap: 20px;">
    <span class="user-info" style="color: #fff; font-size: 16px;">{{ Auth::user()->name }}</span>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="logout-btn" style="background: #8a2be2; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; font-size: 14px;">
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
      <h1>Bem-vindo à FÚRIA Fans</h1>
      <p>Conecte-se com os melhores momentos e produtos oficiais.</p>
      <div class="buttons">
        <a href="https://furia.gg/store" target="_blank">Loja Oficial</a>
        <a href="https://furia.gg/" target="_blank">Site Oficial</a>
      </div>
    </div>
  </section>
  <footer>
    © 2025 FÚRIA Esports. Todos os direitos reservados.
  </footer>
</body>
</html>
