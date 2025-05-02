# 🎯 KYF FURIA – Know Your Fans

KYF FURIA é um chatbot interativo desenvolvido para a comunidade da FURIA Esports.  
Ele permite que fãs façam perguntas e recebam respostas automatizadas, proporcionando uma experiência de engajamento personalizada.

## 🚀 Tecnologias Utilizadas

- **Laravel 10** – Framework PHP para o backend.
- **Vite** – Empacotador de módulos para assets modernos.
- **Tailwind CSS** – Framework utilitário para estilização rápida.
- **JavaScript Vanilla** – Para lógica do frontend.
- **n8n** – Plataforma de automação de workflows.
- **Supabase** – Backend como serviço para persistência dos dados.

## 📦 Instalação

### 1. Clonar o repositório

```
git clone https://github.com/nathanmoreeira/kyf-furia.git
cd kyf-furia
```

### 2. Instalar dependências

```
composer install
npm install
```

### 3. Configurar o ambiente

```
cp .env.example .env
php artisan key:generate
```

Edite o arquivo `.env` com suas configurações de banco de dados, Supabase, etc.

### 4. Rodar as migrações

```
php artisan migrate
```

### 5. Iniciar o servidor de desenvolvimento

```
php artisan serve
npm run dev
```

Acesse o projeto em `http://localhost:8000`.

## 💬 Como Usar

O chatbot aparece como um botão flutuante no canto inferior direito da tela.  
Ao clicar, ele se expande para exibir uma interface de conversa com:

- **Mensagens do usuário**: alinhadas à direita, com fundo escuro.
- **Mensagens do FURIA Bot**: alinhadas à esquerda, com fundo claro.

As mensagens são enviadas via `fetch` para um **webhook público** configurado com n8n + OpenAI (ou outro serviço).

## ⚙️ Configuração do Webhook no n8n

1. Crie um novo workflow no n8n com um nó HTTP Trigger.
2. Configure-o para aceitar requisições `POST` no endpoint `/webhook/FURIA`.
3. Adicione um nó HTTP Request (ou OpenAI) que receba o histórico da conversa (`history`) e gere uma resposta.
4. Retorne a resposta como JSON para o frontend.

### Exemplo de chamada do frontend:

```js
const response = await fetch('https://seu-webhook-url.com/webhook/FURIA', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ history: conversationHistory }),
});
```

## 🧠 Cadastro de Fãs

O app inclui um formulário completo para cadastro de fãs da FURIA, com campos como:

- Nome, E-mail, CPF, Data de Nascimento  
- Endereço, Número, Cidade, Estado  
- Instagram, Twitter  
- Esporte Favorito e Jogador Favorito da FURIA

As informações são armazenadas no Supabase.

## 📁 Estrutura do Projeto

```
├── app/
├── resources/
│   ├── views/
│   │   ├── chatbot.blade.php
│   │   ├── fans/
│   │       ├── create.blade.php
│   │       ├── edit.blade.php
│   │       └── index.blade.php
├── public/
│   └── chatbot.js / chatbot.css
├── routes/
│   └── web.php
```

## 🎨 Personalização

- **Estilo**: altere o CSS embutido ou use Tailwind.
- **Comportamento**: edite o JavaScript do chatbot conforme necessário.
- **Linguagem**: personalize mensagens e respostas.

## 🛠️ Contribuindo

1. Fork este repositório.
2. Crie sua branch: `git checkout -b minha-feature`
3. Faça suas alterações e commit: `git commit -m 'minha feature'`
4. Push para sua branch: `git push origin minha-feature`
5. Abra um Pull Request.

## 📝 Licença

Distribuído sob a Licença MIT. Veja `LICENSE` para mais informações.

---

Made with ❤️ by [Nathan Moreira](https://github.com/nathanmoreeira)
