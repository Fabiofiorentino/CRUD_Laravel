
# CRUD Laravel

Sistema simples de gerenciamento de produtos e fornecedores desenvolvido com **Laravel**.

## 🔧 Funcionalidades

- CRUD completo de **produtos** e **fornecedores**
- Associação de múltiplos fornecedores a um produto (relacionamento muitos-para-muitos)
- Filtros e busca por nome e fornecedor
- Exclusão em massa de produtos e fornecedores
- Interface estilizada com **Bootstrap**
- Máscara para campo de CNPJ

## 🛠️ Tecnologias utilizadas

- PHP 8.x
- Laravel 12
- MySQL
- Bootstrap 5
- JavaScript (vanilla)

## ⚙️ Instalação

Clone o repositório:

```bash
git clone https://github.com/Fabiofiorentino/vmarket-crud.git
cd vmarket-crud
````

Instale as dependências:

```bash
composer install
```
Copie o arquivo .env:

```bash
cp .env.example .env
```

Configure as variáveis de ambiente com as informações do seu banco de dados.

Gere a chave da aplicação:
```bash
php artisan key:generate
```

Crie o banco de dados e execute as migrações:
```bash
php artisan migrate
```

Rode o servidor:
```bash
php artisan serve
```

Acesse em http://localhost:8000
