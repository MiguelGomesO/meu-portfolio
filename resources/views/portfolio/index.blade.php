<x-layouts.portfolio :portfolio="$portfolio">

    {{-- Navbar --}}
    <header class="fixed top-0 inset-x-0 z-50 glass">
        <nav class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <button @click="scrollTo('home')" class="font-display font-bold text-xl tracking-tight text-white hover:text-blue-400 transition-colors">
                    MG<span class="text-blue-500">.</span>
                </button>

                {{-- Desktop nav --}}
                <div class="hidden md:flex items-center gap-8">
                    @foreach (['home' => 'Início', 'about' => 'Sobre', 'skills' => 'Skills', 'services' => 'Serviços', 'projects' => 'Projetos', 'contact' => 'Contato'] as $id => $label)
                        <button
                            @click="scrollTo('{{ $id }}')"
                            :class="activeSection === '{{ $id }}' ? 'text-blue-400' : 'text-slate-400 hover:text-white'"
                            class="text-sm font-medium transition-colors"
                        >{{ $label }}</button>
                    @endforeach
                </div>

                <div class="hidden md:block">
                    <button @click="scrollTo('contact')" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-sm font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-blue-600/25">
                        Fale comigo
                    </button>
                </div>

                {{-- Mobile menu button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-slate-400 hover:text-white">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="mobileMenuOpen" x-cloak x-transition class="md:hidden pb-6 border-t border-white/5 mt-2 pt-4">
                <div class="flex flex-col gap-3">
                    @foreach (['home' => 'Início', 'about' => 'Sobre', 'skills' => 'Skills', 'services' => 'Serviços', 'projects' => 'Projetos', 'contact' => 'Contato'] as $id => $label)
                        <button @click="scrollTo('{{ $id }}')" class="text-left py-2 text-slate-300 hover:text-white font-medium">{{ $label }}</button>
                    @endforeach
                    <button @click="scrollTo('contact')" class="mt-2 px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg">Fale comigo</button>
                </div>
            </div>
        </nav>
    </header>

    {{-- Hero --}}
    <section id="home" class="relative min-h-screen flex items-center grid-bg overflow-x-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/20 via-transparent to-midnight pointer-events-none"></div>
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute bottom-1/4 -right-32 w-80 h-80 bg-amber-600/5 rounded-full blur-3xl animate-pulse-glow"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pt-32 pb-20 w-full">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass text-sm text-slate-300 mb-8">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                        Disponível para novos projetos
                    </div>

                    <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.15]">
                        {{ $portfolio['name'] }}
                    </h1>

                    <p class="mt-4 text-2xl md:text-3xl font-display font-semibold text-gradient">
                        {{ $portfolio['title'] }}
                    </p>

                    <p class="mt-6 text-lg text-slate-400 max-w-lg leading-relaxed">
                        {{ $portfolio['tagline'] }}
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">
                        <button @click="scrollTo('projects')" class="px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-xl transition-all hover:shadow-xl hover:shadow-blue-600/30 hover:-translate-y-0.5">
                            Ver projetos
                        </button>
                        <button @click="scrollTo('contact')" class="px-8 py-4 glass text-white font-semibold rounded-xl hover:border-blue-500/30 transition-all hover:-translate-y-0.5">
                            Solicitar orçamento
                        </button>
                    </div>

                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach ($portfolio['stats'] as $stat)
                            <div>
                                <p class="font-display text-3xl md:text-4xl font-bold text-white leading-none">{{ $stat['value'] }}</p>
                                <p class="mt-2 text-sm text-slate-500 leading-snug">{{ $stat['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative hidden lg:block">
                    <div class="relative w-full aspect-square max-w-md mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-amber-600/10 rounded-3xl rotate-6 glow-blue"></div>
                        <div class="relative glass rounded-3xl p-8 glow-blue animate-float">
                            <div class="space-y-4 font-mono text-sm">
                                <div class="flex items-center gap-2 text-slate-500">
                                    <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                                    <span class="ml-2 text-slate-600">portfolio.php</span>
                                </div>
                                <pre class="text-slate-300 leading-relaxed"><code><span class="text-purple-400">class</span> <span class="text-blue-400">Developer</span>
{
    <span class="text-slate-500">public</span> <span class="text-amber-400">string</span> $name = <span class="text-emerald-400">'{{ $portfolio['name'] }}'</span>;
    <span class="text-slate-500">public</span> <span class="text-amber-400">array</span> $stack = [
        <span class="text-emerald-400">'Laravel'</span>,
        <span class="text-emerald-400">'Tailwind'</span>,
        <span class="text-emerald-400">'Alpine.js'</span>,
    ];

    <span class="text-slate-500">public function</span> <span class="text-blue-300">build</span>(): <span class="text-purple-400">Solution</span>
    {
        <span class="text-purple-400">return</span> <span class="text-blue-400">new</span> <span class="text-blue-300">AmazingProject</span>();
    }
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <button @click="scrollTo('about')" class="text-slate-600 hover:text-slate-400 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </button>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="section-padding relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="aspect-[4/5] max-w-md mx-auto lg:mx-0 rounded-2xl overflow-hidden glass glow-gold relative">
                        @if ($portfolio['photo'] ?? null)
                            <img
                                src="{{ asset($portfolio['photo']) }}"
                                alt="{{ $portfolio['name'] }}"
                                class="absolute inset-0 w-full h-full object-cover"
                            >
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-steel to-midnight-light flex items-center justify-center">
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center font-display text-5xl font-bold text-white">
                                    MG
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-4 -right-4 lg:right-auto lg:-left-4 glass rounded-xl p-4 glow-blue">
                        <p class="font-display text-2xl font-bold text-white">100%</p>
                        <p class="text-xs text-slate-500">Comprometimento</p>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <span class="text-blue-400 font-semibold text-sm uppercase section-label">Sobre mim</span>
                    <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                        Código com propósito,<br>resultados reais.
                    </h2>
                    <p class="mt-6 text-slate-400 text-lg leading-relaxed">
                        {{ $portfolio['bio'] }}
                    </p>

                    <div class="mt-8 grid sm:grid-cols-2 gap-4">
                        @foreach (['Entrega no prazo', 'Código limpo & documentado', 'Comunicação transparente', 'Suporte pós-entrega'] as $item)
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-blue-600/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-slate-300 text-sm">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10 flex items-center gap-4 text-sm text-slate-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $portfolio['location'] }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Skills / Technologies --}}
    <section id="skills" class="section-padding bg-midnight-light/50 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-blue-400 font-semibold text-sm uppercase tracking-widest">Stack tecnológico</span>
                <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                    Tecnologias que domino
                </h2>
                <p class="mt-4 text-slate-400 text-lg">
                    Ferramentas modernas para entregar soluções robustas e escaláveis.
                </p>
            </div>

            @php
                $categories = [
                    'backend' => ['label' => 'Backend', 'color' => 'blue'],
                    'frontend' => ['label' => 'Frontend', 'color' => 'emerald'],
                    'devops' => ['label' => 'DevOps & Tools', 'color' => 'amber'],
                    'design' => ['label' => 'Design', 'color' => 'purple'],
                ];
            @endphp

            <div class="mt-16 space-y-12">
                @foreach ($categories as $catKey => $cat)
                    @php
                        $techs = collect($portfolio['technologies'])->where('category', $catKey);
                    @endphp
                    @if ($techs->isNotEmpty())
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-widest text-slate-500 mb-6">{{ $cat['label'] }}</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($techs as $tech)
                                    <div class="group px-5 py-3 glass rounded-xl card-hover cursor-default">
                                        <span class="text-slate-200 font-medium group-hover:text-white transition-colors">{{ $tech['name'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section id="services" class="section-padding relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-blue-400 font-semibold text-sm uppercase tracking-widest">Serviços</span>
                <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                    O que posso fazer por você
                </h2>
                <p class="mt-4 text-slate-400 text-lg">
                    Soluções completas do conceito ao deploy.
                </p>
            </div>

            <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($portfolio['services'] as $service)
                    <div class="glass rounded-2xl p-8 card-hover group">
                        <div class="w-12 h-12 rounded-xl bg-blue-600/10 flex items-center justify-center mb-6 group-hover:bg-blue-600/20 transition-colors">
                            @if ($service['icon'] === 'code')
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            @elseif ($service['icon'] === 'server')
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg>
                            @elseif ($service['icon'] === 'cart')
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            @else
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @endif
                        </div>
                        <h3 class="font-display text-xl font-bold text-white mb-3">{{ $service['title'] }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="section-padding bg-midnight-light/30">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-blue-400 font-semibold text-sm uppercase tracking-widest">Processo</span>
                <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                    Como trabalhamos juntos
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($portfolio['process'] as $step)
                    <div class="relative">
                        <span class="font-display text-6xl font-bold text-steel-light/30">{{ $step['step'] }}</span>
                        <h3 class="mt-2 font-display text-xl font-bold text-white">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-slate-400 text-sm leading-relaxed">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="section-padding relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
                <div>
                    <span class="text-blue-400 font-semibold text-sm uppercase tracking-widest">Portfólio</span>
                    <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                        Projetos recentes
                    </h2>
                </div>

                <div class="flex flex-wrap gap-2">
                    @foreach (['all' => 'Todos', 'web' => 'Web', 'ecommerce' => 'E-commerce', 'landingPage' => 'Landing Page'] as $filter => $label)
                        <button
                            @click="projectFilter = '{{ $filter }}'"
                            :class="projectFilter === '{{ $filter }}' ? 'bg-blue-600 text-white' : 'glass text-slate-400 hover:text-white'"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        >{{ $label }}</button>
                    @endforeach
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($portfolio['projects'] as $project)
                    <div
                        x-show="matchesProjectFilter('{{ $project['category'] }}')"
                        class="group glass rounded-2xl overflow-hidden card-hover"
                    >
                        <div class="aspect-video bg-gradient-to-br from-steel to-midnight-light relative overflow-hidden">
                            @if ($project['image'])
                                <img
                                    src="{{ asset($project['image']) }}"
                                    alt="{{ $project['title'] }}"
                                    class="absolute inset-0 w-full h-full object-cover"
                                >
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-midnight/80 via-midnight/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity bg-blue-600/10">
                                <button
                                    type="button"
                                    @click="openProjectModal(@js($project))"
                                    class="px-6 py-3 bg-white text-midnight font-semibold rounded-lg text-sm hover:bg-blue-50 transition-colors"
                                >
                                    Ver projeto
                                </button>
                            </div>
                            <div class="absolute bottom-4 left-4 flex gap-2">
                                @foreach ($project['tech'] as $tech)
                                    <span class="px-2 py-1 bg-midnight/80 text-xs text-slate-300 rounded">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-display text-xl font-bold text-white group-hover:text-blue-400 transition-colors">{{ $project['title'] }}</h3>
                            <p class="mt-2 text-slate-400 text-sm leading-relaxed">{{ $project['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Project video modal --}}
    <div
        x-show="projectModal.open"
        x-cloak
        @keydown.escape.window="closeProjectModal()"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8"
        role="dialog"
        aria-modal="true"
        :aria-label="projectModal.title"
    >
        <div
            @click="closeProjectModal()"
            class="absolute inset-0 bg-midnight/90 backdrop-blur-sm"
        ></div>

        <div
            @click.stop
            class="relative w-full max-w-4xl glass rounded-2xl overflow-hidden glow-blue"
        >
            <div class="flex items-start justify-between gap-4 p-6 border-b border-white/5">
                <div>
                    <h3 class="font-display text-2xl font-bold text-white" x-text="projectModal.title"></h3>
                    <p class="mt-2 text-slate-400 text-sm leading-relaxed" x-text="projectModal.description"></p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <template x-for="tech in projectModal.tech" :key="tech">
                            <span class="px-2 py-1 bg-midnight/80 text-xs text-slate-300 rounded" x-text="tech"></span>
                        </template>
                    </div>
                </div>
                <button
                    type="button"
                    @click="closeProjectModal()"
                    class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-white/5 transition-colors flex-shrink-0"
                    aria-label="Fechar modal"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <div class="aspect-video rounded-xl overflow-hidden bg-midnight border border-white/5">
                    <video
                        x-show="projectModal.video"
                        x-ref="modalVideo"
                        :src="getProjectVideoSrc()"
                        class="w-full h-full object-contain bg-black"
                        controls
                        playsinline
                    ></video>

                    <div x-show="!projectModal.video" class="w-full h-full flex flex-col items-center justify-center text-center p-8">
                        <div class="w-16 h-16 rounded-full bg-blue-600/10 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-slate-300 font-medium">Vídeo em breve</p>
                        <p class="mt-1 text-slate-500 text-sm">Adicione o caminho em <code class="text-blue-400">config/portfolio.php</code></p>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap gap-3 justify-end">
                    <button
                        type="button"
                        @click="closeProjectModal()"
                        class="px-5 py-2.5 glass text-slate-300 hover:text-white font-medium rounded-lg transition-colors"
                    >
                        Fechar
                    </button>
                    <a
                        x-show="projectModal.url && projectModal.url !== '#'"
                        :href="projectModal.url"
                        target="_blank"
                        rel="noopener"
                        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-colors"
                    >
                        Visitar site
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact --}}
    <section id="contact" class="section-padding bg-midnight-light/50 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <span class="text-blue-400 font-semibold text-sm uppercase tracking-widest">Contato</span>
                    <h2 class="mt-3 font-display text-4xl md:text-5xl font-bold text-white leading-tight">
                        Vamos conversar?
                    </h2>
                    <p class="mt-4 text-slate-400 text-lg leading-relaxed">
                        Tem um projeto em mente? Me conte sobre ele e receba uma proposta personalizada em até 24 horas.
                    </p>

                    <div class="mt-10 space-y-6">
                        <a href="mailto:{{ $portfolio['email'] }}" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-blue-600/10 flex items-center justify-center group-hover:bg-blue-600/20 transition-colors">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">E-mail</p>
                                <p class="text-white group-hover:text-blue-400 transition-colors">{{ $portfolio['email'] }}</p>
                            </div>
                        </a>

                        <a href="tel:{{ $portfolio['phone'] }}" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-blue-600/10 flex items-center justify-center group-hover:bg-blue-600/20 transition-colors">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Telefone</p>
                                <p class="text-white group-hover:text-blue-400 transition-colors">{{ $portfolio['phone'] }}</p>
                            </div>
                        </a>
                    </div>

                    <div class="mt-10 flex gap-4">
                        @foreach ($portfolio['social'] as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener" class="w-11 h-11 glass rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:border-blue-500/30 transition-all" title="{{ $social['name'] }}">
                                @if ($social['icon'] === 'github')
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.15 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.62.24 2.85.12 3.15.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                @elseif ($social['icon'] === 'linkedin')
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.062 2.062 0 114.125 0 2.063 2.063 0 01-2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="glass rounded-2xl p-8">
                    <div x-show="!contactForm.submitted">
                        <form @submit.prevent="submitContact()" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">Nome</label>
                                <input
                                    type="text"
                                    x-model="contactForm.name"
                                    class="w-full px-4 py-3 bg-midnight border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-colors"
                                    placeholder="Seu nome"
                                >
                                <p x-show="contactForm.errors.name" x-text="contactForm.errors.name" class="mt-1 text-sm text-red-400"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">E-mail</label>
                                <input
                                    type="email"
                                    x-model="contactForm.email"
                                    class="w-full px-4 py-3 bg-midnight border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-colors"
                                    placeholder="seu@email.com"
                                >
                                <p x-show="contactForm.errors.email" x-text="contactForm.errors.email" class="mt-1 text-sm text-red-400"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">Mensagem</label>
                                <textarea
                                    x-model="contactForm.message"
                                    rows="5"
                                    class="w-full px-4 py-3 bg-midnight border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-colors resize-none"
                                    placeholder="Conte sobre seu projeto..."
                                ></textarea>
                                <p x-show="contactForm.errors.message" x-text="contactForm.errors.message" class="mt-1 text-sm text-red-400"></p>
                            </div>
                            <button type="submit" class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-xl transition-all hover:shadow-xl hover:shadow-blue-600/30">
                                Enviar mensagem
                            </button>
                        </form>
                    </div>

                    <div x-show="contactForm.submitted" x-cloak class="text-center py-12">
                        <div class="w-16 h-16 mx-auto rounded-full bg-emerald-600/10 flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-white">Mensagem enviada!</h3>
                        <p class="mt-2 text-slate-400">Obrigado pelo contato. Retorno em breve.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t border-white/5 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} {{ $portfolio['name'] }}. Todos os direitos reservados.
            </p>
            <p class="text-slate-600 text-sm">
                Feito com Laravel, Tailwind CSS & Alpine.js
            </p>
        </div>
    </footer>

    {{-- Back to top --}}
    <button
        x-show="showBackToTop"
        x-cloak
        @click="scrollTo('home')"
        x-transition
        class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 hover:bg-blue-500 text-white rounded-xl shadow-lg shadow-blue-600/30 flex items-center justify-center transition-all hover:-translate-y-1 z-40"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <style>[x-cloak] { display: none !important; }</style>

</x-layouts.portfolio>
