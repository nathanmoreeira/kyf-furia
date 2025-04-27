<!-- <header>
  <a href="{{ route('home') }}">
    <img src="{{ asset('image/furia@logotyp.us.svg') }}" alt="Logo Furia" style="width: 7%;">
  </a>
  <div style="display: flex; align-items: center;">
    <span class="user-info">{{ Auth::user()->name }}</span>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="logout-btn">Sair</button>
    </form>
  </div>
</header> -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

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


<div class="container">
    <!-- Filtros no início da página -->
    <div class="filters">
        <h3 style="color: #fff; margin-bottom: 20px; text-align: center;">Filtrar fãs</h3>
        <form method="GET" action="{{ route('dashboard') }}" style="display: flex; flex-wrap: wrap; gap: 15px;">
            <div class="input-group" style="flex: 1 1 30%; min-width: 200px;">
                <label for="name" style="display: block; color: #ccc; margin-bottom: 5px;">Nome</label>
                <input type="text" id="name" name="name" value="{{ request('name') }}"
                    placeholder="Digite o nome"
                    style="width: 100%; padding: 10px; border: none; border-radius: 8px; background: #333; color: #fff; font-size: 14px;" />
            </div>

            <div class="input-group" style="flex: 1 1 30%; min-width: 200px;">
                <label for="favorite_sport" style="display: block; color: #ccc; margin-bottom: 5px;">Esporte
                    favorito</label>
                <input type="text" id="favorite_sport" name="favorite_sport" value="{{ request('favorite_sport') }}"
                    placeholder="Esporte favorito"
                    style="width: 100%; padding: 10px; border: none; border-radius: 8px; background: #333; color: #fff; font-size: 14px;" />
            </div>

            <div class="input-group" style="flex: 1 1 30%; min-width: 200px;">
                <label for="favorite_player" style="display: block; color: #ccc; margin-bottom: 5px;">Jogador
                    favorito</label>
                <input type="text" id="favorite_player" name="favorite_player"
                    value="{{ request('favorite_player') }}" placeholder="Jogador favorito"
                    style="width: 100%; padding: 10px; border: none; border-radius: 8px; background: #333; color: #fff; font-size: 14px;" />
            </div>

            <div style="flex: 1 1 100%; text-align: center; margin-top: 20px;">
                <button type="submit" class="filter-button"
                    style="background: #8a2be2; color: white; padding: 10px 20px; border-radius: 8px; border: none; cursor: pointer; font-size: 16px; width: 13%;">
                    Filtrar
                </button>
            </div>
        </form>
    </div>
    <br><br>

    <!-- Tabela de Fãs -->
    <div class="filters">
        <div class="fans-list">
            <h2>Fãs Listados</h2>
            <table>
                <thead>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>E-Sport Favorito</th>
                        <th>Jogador Favorito</th>
                        <th>Data de Nascimento</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($fans as $fan)
                        <tr>
                            <td>{{ $fan->name }}</td>
                            <td>{{ $fan->email }}</td>
                            <td>{{ $fan->favorite_sport }}</td>
                            <td>{{ $fan->favorite_player }}</td>
                            <td>{{ $fan->birth_date }}</td>
                            <td style="display: flex; gap: 10px;">
                                <a href="" class="btn-primary" style="color: #8a2be2; font-size: 18px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger"
                                        style="background: none; border: none; cursor: pointer; color: crimson; font-size: 18px;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center;">Nenhum fã cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>


<!-- Estilos CSS -->

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
        justify-content: flex-start;
    }

    .container {
        margin-top: 50px;
        padding: 20px;
    }

    .filters {
        background: #1a1a1a;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.3);
        margin-bottom: 30px;
    }

    .filters h3 {
        color: #e5e5e5;
        margin-bottom: 20px;
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

    .filter-button {
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

    .filter-button:hover {
        background: #7321cc;
    }

    .fans-list {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background: #2b2b2b;
    }

    tr:hover {
        background: #3c3c3c;
    }

    td {
        color: #ccc;
    }
</style>
