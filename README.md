🎯 KYF FURIA – Know Your Fans
KYF FURIA é um chatbot interativo desenvolvido para a comunidade da FURIA Esports. Ele permite que fãs façam perguntas e recebam respostas automatizadas, proporcionando uma experiência de engajamento personalizada.

🚀 Tecnologias Utilizadas
Laravel 10 – Framework PHP para o backend.

Vite – Empacotador de módulos para assets modernos.

Tailwind CSS – Framework utilitário para estilização rápida.

JavaScript Vanilla – Para lógica do frontend.

n8n – Plataforma de automação de workflows.

📦 Instalação
1. Clonar o repositório
bash
Copiar
Editar
git clone https://github.com/nathanmoreeira/kyf-furia.git
cd kyf-furia
2. Instalar dependências
bash
Copiar
Editar
composer install
npm install
3. Configurar o ambiente
bash
Copiar
Editar
cp .env.example .env
php artisan key:generate
Edite o arquivo .env com suas configurações de banco de dados e outras variáveis necessárias.

4. Rodar as migrações
bash
Copiar
Editar
php artisan migrate
5. Iniciar o servidor de desenvolvimento
bash
Copiar
Editar
php artisan serve
npm run dev
O aplicativo estará disponível em http://localhost:8000.

💬 Como Usar
O chatbot é exibido como um botão flutuante no canto inferior direito da tela. Ao clicar, ele se expande para mostrar a interface de conversa.

Usuário: Mensagens alinhadas à direita com fundo roxo escuro.

FURIA Bot: Respostas alinhadas à esquerda com fundo claro.

As mensagens são processadas por um webhook configurado no n8n, que utiliza a API do OpenAI para gerar respostas.

⚙️ Configuração do Webhook no n8n
Crie um novo workflow no n8n com um nó HTTP Trigger.

Configure o endpoint para receber requisições POST.

Adicione um nó HTTP Request para chamar a API do OpenAI com o histórico de mensagens.

Retorne a resposta do OpenAI como saída do webhook.

Certifique-se de que o endpoint do webhook esteja acessível publicamente e atualize a URL no arquivo JavaScript do chatbot:

javascript
Copiar
Editar
const response = await fetch('https://seu-webhook-url.com/webhook/FURIA', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ history: conversationHistory }),
});
🎨 Personalização
Estilo: Modifique o arquivo CSS para ajustar cores, fontes e layout conforme necessário.

Comportamento: Edite o arquivo JavaScript para alterar a lógica de exibição de mensagens ou integração com outras APIs.

🛠️ Contribuição
Fork o projeto.

Crie uma nova branch: git checkout -b minha-feature.

Faça suas alterações e commit: git commit -m 'Minha nova feature'.

Envie para o GitHub: git push origin minha-feature.

Abra um Pull Request.

📄 Licença
Este projeto está licenciado sob a MIT License.

Para mais informações, acesse o repositório oficial: kyf-furia.
