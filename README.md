# MoodleExt — IFSERTÃO-PE Campus Floresta

Projeto customizado baseado no **Moodle 5.1.3+** para o IFSERTÃO-PE Campus Floresta.

## Pré-requisitos

| Requisito | Versão mínima |
|---|---|
| PHP | 8.2+ |
| MariaDB | 10.11+ |
| Apache | 2.4+ |
| Composer | 2.x |

### Extensões PHP obrigatórias

`gd`, `intl`, `sodium`, `zip`, `soap`, `mbstring`, `curl`, `openssl`, `xmlreader`, `xml`, `json`, `fileinfo`, `ctype`, `dom`, `simplexml`, `pcre`, `spl`, `filter`, `hash`, `iconv`, `zlib`

## Instalação local (Windows + XAMPP)

### 1. Clonar o repositório

```bash
cd C:\xampp\htdocs
git clone https://github.com/IFSERTAOPE-FLO/moodleExt.git
cd moodleExt
```

### 2. Instalar dependências

```bash
composer install --no-dev --classmap-authoritative
```

### 3. Criar o banco de dados

Abra o phpMyAdmin (`http://localhost/phpmyadmin`) e crie o banco:

- **Nome:** `moodleext`
- **Collation:** `utf8mb4_unicode_ci`

Ou via terminal:

```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE moodleext DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 4. Criar o arquivo `config.php`

Copie o arquivo de exemplo e edite com suas configurações:

```bash
copy config-dist.php config.php
```

Edite `config.php` com os seguintes valores para XAMPP:

```php
$CFG->dbtype    = 'mariadb';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodleext';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->prefix    = 'mdl_';
$CFG->wwwroot   = 'http://localhost/moodleExt';
$CFG->dataroot  = 'C:\\moodledata';
```

### 5. Criar o diretório de dados

```bash
mkdir C:\moodledata
```

### 6. Configurar o Apache

O Moodle 5.x usa o diretório `public/` como raiz web. Adicione ao arquivo `C:\xampp\apache\conf\extra\httpd-vhosts.conf`:

```apache
Alias /moodleExt "C:/xampp/htdocs/moodleExt/public"
<Directory "C:/xampp/htdocs/moodleExt/public">
    AllowOverride All
    Require all granted
</Directory>
```

Reinicie o Apache após a alteração.

### 7. Habilitar extensões PHP

No arquivo `C:\xampp\php\php.ini`, descomente (remova o `;`) as seguintes linhas:

```ini
extension=gd
extension=intl
extension=sodium
extension=zip
extension=soap
```

Ajuste também:

```ini
max_input_vars = 5000
zend.exception_ignore_args = On
```

Reinicie o Apache.

### 8. Verificar versão do MariaDB

O Moodle 5.1.3+ exige **MariaDB 10.11+**. O XAMPP pode vir com versão mais antiga. Verifique:

```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "SELECT VERSION();"
```

Se a versão for inferior a 10.11, será necessário atualizar o MariaDB manualmente.

### 9. Acessar o Moodle

Acesse no navegador:

```
http://localhost/moodleExt/
```

O assistente de instalação será iniciado automaticamente.

## Estrutura do projeto

```
moodleExt/
├── config.php          # Configuração do Moodle (criar manualmente)
├── config-dist.php     # Modelo de configuração
├── composer.json       # Dependências PHP
├── public/             # Raiz web (DocumentRoot)
│   ├── index.php       # Ponto de entrada
│   ├── admin/          # Painel administrativo
│   ├── mod/            # Módulos de atividades
│   ├── theme/          # Temas
│   ├── lib/            # Bibliotecas core
│   └── ...
├── lib/                # Setup e helpers
├── vendor/             # Dependências do Composer
└── server/             # Configurações de servidor
```

> **Importante:** Nunca acesse `localhost/moodleExt/public/` diretamente. Use o Alias do Apache para que `localhost/moodleExt/` aponte para `public/`.

## Branches

| Branch | Descrição |
|---|---|
| `main` | Branch principal estável |
| `victor` | Branch de desenvolvimento |

## Licença

Este projeto é baseado no [Moodle](https://moodle.org), distribuído sob a [GNU General Public License v3.0](https://www.gnu.org/copyleft/gpl.html).
