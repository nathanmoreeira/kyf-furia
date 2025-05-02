<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bem-vindo - FURIA</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

            <div class="buttons">
                <a href="{{ route('fan.register') }}" class="register-btn" style="width: 52%;">Cadastre-se como Fan!</a>

            </div>

        </div>
    </section>


    <footer style="background: rgba(0,0,0,0.8); padding: 20px 40px; font-size: 12px; color: #666;">
        <div
            style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <!-- Frase de direitos autorais centralizada -->
            <div style="flex: 1; text-align: center;">
                © 2025 FURIA Esports. Todos os direitos reservados.
            </div>

            <!-- Redes sociais à direita com mais espaçamento -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-left: auto;">
                <span style="margin-bottom: 5px; color: #ccc; font-size: 14px;">SIGA A FURIA</span>
                <div style="display: flex; gap: 20px;"> <!-- Aumentei o gap entre os ícones -->
                    <a href="https://twitter.com/furia" target="_blank" style="color: #8a2be2; font-size: 20px;">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://instagram.com/furiagg" target="_blank" style="color: #8a2be2; font-size: 20px;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>







    <!-- Adicionando a imagem de fundo -->
    <div class="background"></div>

    <!-- Botão para abrir/fechar o chat -->
    <div id="chatbot-toggle">💬</div>

    <!-- Container do chatbot -->
    <div id="chatbot-container" style="display: none;">
        <div id="chatbot-header">FURIA Chat</div>
        <div id="chatbot-messages"></div>
        <div id="chatbot-input">
            <input type="text" id="chatbot-text" placeholder="Digite sua pergunta..." />
            <button id="chatbot-send">Enviar</button>
        </div>
    </div>

    <style>
        #chatbot-toggle {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background-color: #9147ff;
            color: white;
            font-size: 24px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            z-index: 10000;
        }

        #chatbot-container {
            position: fixed;
            bottom: 100px;
            right: 24px;
            width: 340px;
            height: 500px;
            background-color: #1c1c1c;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
            color: white;
            z-index: 9999;
        }

        #chatbot-header {
            background-color: #111;
            padding: 16px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        #chatbot-messages {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chatbot-message {
            max-width: 75%;
            padding: 10px 14px;
            border-radius: 12px;
            word-wrap: break-word;
            white-space: pre-wrap;
        }

        .chatbot-message strong {
            display: block;
            margin-bottom: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .from-user {
            align-self: flex-end;
            background-color: #9147ff;
            color: white;
            border-bottom-right-radius: 0;
        }

        .from-bot {
            align-self: flex-start;
            background-color: #2b2b2b;
            color: white;
            border-bottom-left-radius: 0;
        }

        #chatbot-input {
            display: flex;
            border-top: 1px solid #333;
        }

        #chatbot-input input {
            flex: 1;
            padding: 12px;
            border: none;
            outline: none;
            background-color: #2b2b2b;
            color: white;
        }

        #chatbot-send {
            padding: 12px 16px;
            border: none;
            background-color: #9147ff;
            color: white;
            cursor: pointer;
        }
    </style>

    <script>
        const chatbotToggle = document.getElementById('chatbot-toggle');
        const chatbotContainer = document.getElementById('chatbot-container');
        const chatbotMessages = document.getElementById('chatbot-messages');
        const chatbotSend = document.getElementById('chatbot-send');
        const chatbotText = document.getElementById('chatbot-text');
        const conversationHistory = [];

        chatbotToggle.addEventListener('click', () => {
            chatbotContainer.style.display = chatbotContainer.style.display === 'none' ? 'flex' : 'none';
        });

        chatbotSend.addEventListener('click', sendMessage);
        chatbotText.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') sendMessage();
        });

        async function sendMessage() {
            const message = chatbotText.value.trim();
            if (!message) return;

            appendMessage('Você', message, true);
            chatbotText.value = '';

            conversationHistory.push({
                role: 'user',
                content: message
            });

            const response = await fetch(
                'https://d024-2804-7f0-3d1-9b32-a934-ccc6-677d-6317.ngrok-free.app/webhook/FURIA', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        history: conversationHistory
                    }),
                });

            const result = await response.json();
            conversationHistory.push({
                role: 'assistant',
                content: result.text
            });

            appendMessage('FURIA Bot', result.text, false);
        }

        function appendMessage(sender, text, isUser) {
            const msgDiv = document.createElement('div');
            msgDiv.classList.add('chatbot-message', isUser ? 'from-user' : 'from-bot');
            msgDiv.innerHTML = `<strong>${sender}</strong>${text}`;
            chatbotMessages.appendChild(msgDiv);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }
    </script>





</body>

</html>
