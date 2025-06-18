# Sistema de Gerenciamento de Contatos

Sistema simples para gerenciar contatos pessoais com Laravel 11 e Livewire.

## 🚀 Comandos para Executar

```bash
# 1. Instalar dependências
composer install

# 2. Copiar arquivo de ambiente
cp .env.example .env

# 3. Gerar chave da aplicação
php artisan key:generate

# 4. Executar migrações
php artisan migrate

php artisan db:seed --class=UserSeeder
# 5. Iniciar servidor
php artisan serve
```

Acesse: `http://localhost:8000`

## ⚙️ Configuração do Banco

Edite o arquivo `.env` com suas configurações:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contacts
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

## 🐛 Problemas Comuns

**Erro: "vendor/autoload.php"**
```bash
composer install
```

**Erro: "No application encryption key"**
```bash
php artisan key:generate
```

**Erro: "Table 'sessions' doesn't exist"**
```bash
php artisan config:clear
```

## 📝 Funcionalidades

- ✅ Cadastro de contatos
- ✅ Listagem de contatos  
- ✅ Edição de contatos
- ✅ Exclusão de contatos
- ✅ Interface responsiva
