<?php

return [

    'name' => 'Miguel Gomes',
    'title' => 'Desenvolvedor Full Stack',
    'tagline' => 'Transformo ideias em soluções digitais de alto impacto.',
    'bio' => 'Desenvolvedor freelancer especializado em criar aplicações web robustas, escaláveis e com design impecável. Com experiência em Laravel, APIs RESTful e interfaces modernas, entrego projetos que convertem visitantes em clientes.',
    'email' => 'gomesmigueloliveira@outlook.com',
    'phone' => '+55 (11) 99003-8266',
    'location' => 'Jacareí, Brasil',
    'photo' => 'images/miguel.jpg',

    'social' => [
        ['name' => 'GitHub', 'url' => 'https://github.com/MiguelGomesO', 'icon' => 'github'],
        ['name' => 'LinkedIn', 'url' => 'https://linkedin.com/in/miguel-gomes-034605296', 'icon' => 'linkedin'],
        ['name' => 'WhatsApp', 'url' => 'https://wa.me/5511990038266', 'icon' => 'whatsapp'],
    ],

    'stats' => [
        ['value' => '3+', 'label' => 'Projetos entregues'],
        ['value' => '5+', 'label' => 'Clientes satisfeitos'],
        ['value' => '1+', 'label' => 'Anos de experiência'],
    ],

    'technologies' => [
        ['name' => 'Laravel', 'category' => 'backend'],
        ['name' => 'PHP', 'category' => 'backend'],
        ['name' => 'WordPress', 'category' => 'backend'],
        ['name' => 'MySQL', 'category' => 'backend'],
        ['name' => 'PostgreSQL', 'category' => 'backend'],
        ['name' => 'Redis', 'category' => 'backend'],
        ['name' => 'JavaScript', 'category' => 'frontend'],
        ['name' => 'Alpine.js', 'category' => 'frontend'],
        ['name' => 'Vue.js', 'category' => 'frontend'],
        ['name' => 'React', 'category' => 'frontend'],
        ['name' => 'Tailwind CSS', 'category' => 'frontend'],
        ['name' => 'HTML5', 'category' => 'frontend'],
        ['name' => 'CSS3', 'category' => 'frontend'],
        ['name' => 'Docker', 'category' => 'devops'],
        ['name' => 'Git', 'category' => 'devops'],
        ['name' => 'AWS', 'category' => 'devops'],
        ['name' => 'Linux', 'category' => 'devops'],
        ['name' => 'REST API', 'category' => 'backend'],
        ['name' => 'Figma', 'category' => 'design'],
    ],

    'services' => [
        [
            'title' => 'Desenvolvimento Web',
            'description' => 'Sites e sistemas web completos, responsivos e otimizados para SEO e performance.',
            'icon' => 'code',
        ],
        [
            'title' => 'APIs & Backend',
            'description' => 'APIs RESTful seguras e escaláveis com Laravel, integrações e arquitetura limpa.',
            'icon' => 'server',
        ],
        [
            'title' => 'E-commerce',
            'description' => 'Lojas virtuais completas com checkout, gestão de produtos e painel administrativo.',
            'icon' => 'cart',
        ],
        [
            'title' => 'Manutenção & Suporte',
            'description' => 'Correções, atualizações, otimização de performance e evolução contínua do seu projeto.',
            'icon' => 'wrench',
        ],
    ],

    'projects' => [
        [
            'title' => 'Plataforma SaaS',
            'description' => 'Sistema de gestão completo de campeonatos de futebol online.',
            'category' => 'web',
            'tech' => ['Laravel', 'Vue.js', 'MySQL'],
            'image' => 'images/saas.jpg',
            'url' => '#',
            'video' => 'videos/saas.mp4', // ex: 'videos/plataforma-saas.mp4'
        ],
        [
            'title' => 'E-commerce Premium',
            'description' => 'Loja virtual com catálogo dinâmico, carrinho e integração com gateways de pagamento.',
            'category' => 'ecommerce',
            'tech' => ['Laravel', 'Alpine.js', 'Tailwind'],
            'image' => null,
            'url' => '#',
            'video' => null, // ex: 'videos/ecommerce-premium.mp4'
        ],
        [
            'title' => 'Landing Page Conversiva',
            'description' => 'Página de alta conversão com animações.',
            'category' => 'landingPage',
            'tech' => ['HTML', 'CSS'],
            'image' => 'images/landingpage.jpg',
            'url' => '#',
            'video' => 'videos/landingpage.mp4', // ex: 'videos/landing-page.mp4'
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Briefing', 'description' => 'Entendo suas necessidades, objetivos e público-alvo.'],
        ['step' => '02', 'title' => 'Proposta', 'description' => 'Apresento escopo, prazos e investimento transparentes.'],
        ['step' => '03', 'title' => 'Desenvolvimento', 'description' => 'Construo com entregas parciais e feedback contínuo.'],
        ['step' => '04', 'title' => 'Entrega', 'description' => 'Deploy, testes finais e suporte pós-lançamento.'],
    ],

];
