# Portfolio — Miguel Gomes

Portfólio pessoal para freelancer, desenvolvido com **Laravel**, **Tailwind CSS** e **Alpine.js**.

Single page com seções de apresentação, skills, serviços, projetos (com modal de vídeo) e formulário de contato.

## Stack

- [Laravel 12](https://laravel.com)
- [Tailwind CSS 4](https://tailwindcss.com)
- [Alpine.js 3](https://alpinejs.dev)
- [Vite 7](https://vitejs.dev)

## Requisitos

- PHP 8.2+
- Composer
- Node.js 18+
- Extensão PHP **GD** (para gerar o favicon redondo)

## Instalação

```bash
# Clonar o repositório
git clone <url-do-repositorio>
cd Portfolio

# Dependências PHP
composer install

# Dependências frontend
npm install

# Ambiente
cp .env.example .env
php artisan key:generate
```

## Executar localmente

Em dois terminais:

```bash
# Terminal 1 — servidor Laravel
php artisan serve

# Terminal 2 — assets com hot reload
npm run dev
```

Acesse: **http://127.0.0.1:8000**

### Build para produção

```bash
npm run build
```

## Personalizar conteúdo

Todo o conteúdo do portfólio fica centralizado em:

```
config/portfolio.php
```

| Campo | Descrição |
|-------|-----------|
| `name`, `title`, `tagline`, `bio` | Textos principais |
| `email`, `phone`, `location` | Contato |
| `photo` | Foto de perfil |
| `social` | GitHub, LinkedIn, WhatsApp |
| `stats` | Números do hero |
| `technologies` | Stack por categoria |
| `services` | Serviços oferecidos |
| `projects` | Projetos do portfólio |
| `process` | Etapas de trabalho |

### Exemplo de projeto

```php
[
    'title' => 'Plataforma SaaS',
    'description' => 'Descrição do projeto.',
    'category' => 'web', // web | ecommerce | landingPage
    'tech' => ['Laravel', 'Vue.js', 'MySQL'],
    'image' => 'images/saas.jpg',
    'url' => 'https://meusite.com',
    'video' => 'videos/saas.mp4',
],
```

## Imagens e vídeos

Coloque os arquivos na pasta `public/`:

```
public/
├── images/
│   ├── miguel.jpg          # Foto de perfil
│   ├── saas.jpg            # Capa do projeto
│   └── landingpage.jpg
└── videos/
    ├── saas.mp4            # Demo no modal
    └── landingpage.mp4
```

No config, use o caminho **sem** `/public`:

```php
'photo' => 'images/miguel.jpg',
'image' => 'images/saas.jpg',
'video' => 'videos/saas.mp4',
```

**Formatos recomendados:**
- Imagens: `.jpg`, `.png`, `.webp`
- Vídeos: `.mp4`

> **Deploy:** os vídeos **não vão pro Git** (são pesados). Após clonar no servidor, copie manualmente para `public/videos/` ou envie via FTP.

## Favicon

O favicon redondo é gerado automaticamente a partir da foto em `config/portfolio.php`.

Após trocar a foto, regenere os arquivos:

```bash
php artisan tinker --execute="app(App\Http\Controllers\FaviconController::class)->sync();"
```

Isso atualiza `public/favicon.ico` e `public/favicon.svg`.

## Estrutura principal

```
app/Http/Controllers/
├── PortfolioController.php   # Página principal
└── FaviconController.php       # Favicon redondo

config/
└── portfolio.php               # Conteúdo editável

resources/
├── css/app.css                 # Tema e utilitários Tailwind
├── js/app.js                   # Alpine.js (modal, filtros, menu)
└── views/portfolio/
    └── index.blade.php         # Layout da single page

public/
├── images/                     # Fotos e capas
└── videos/                     # Demos dos projetos
```

## Funcionalidades

- Layout responsivo com tema escuro
- Navegação com scroll suave e seção ativa
- Menu mobile (Alpine.js)
- Filtro de projetos por categoria
- Modal com player de vídeo por projeto
- Formulário de contato com validação frontend
- Favicon circular com a foto de perfil

## Deploy

1. Configure o `.env` de produção (`APP_ENV=production`, `APP_DEBUG=false`)
2. Rode `composer install --optimize-autoloader --no-dev`
3. Rode `npm run build`
4. Aponte o servidor web para a pasta `public/`

## Licença

Projeto open source sob licença [MIT](https://opensource.org/licenses/MIT).

---

Desenvolvido por **Miguel Gomes**
