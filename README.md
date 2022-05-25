# PI-Nestec-Backend
# Nestec 
Nestec é um sistema de gerenciamento de compras baseado no sistema de vendas, 
entregas e trocas da Nestlé S.A. no Brasil.

# Principais Requisitos 
I - Gerenciamento de Cadastro de Clientes

II - Gerenciamento de pedidos

III - Gerenciamento de Trocas

IV - Acompanhamento de Entregas

V - Acompanhamento da Situação Financeira dos Clientes

# Dependências
- PHP
- Composer
- Laravel
- MySQL
- Workbench
- Visual Studio Code

# Instruções para Download
- Instalar o PHP 8

- Clonar o Repositório
    git clone https://github.com/EduardaSMartins/PI-Nestec-Backend.git

- Após ter clonado o repositório, ele deve ser aberto no VSCode para gerar instalação 
das dependências do PHP através do Composer
    - composer install

- Para obter conexão com o banco de dados é necessário configurar o arquivo .env colocando o DB_DATABASE = nestec, DB_USERNAME com o usuário usado no Workbanch e em DB_PASSWORD a senha desse usuário.

- Criação do Banco de Dados
    - php artisan migrate
- Popular o banco
    - php artisan db:seed

- Rodar a aplicação 
    - php artisan serve

# Contato 
- Eduarda Martins: eduardamartins@alunos.utfpr.edu.br
