import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('portfolio', () => ({
    mobileMenuOpen: false,
    activeSection: 'home',
    projectFilter: 'all',
    showBackToTop: false,
    projectModal: {
        open: false,
        title: '',
        description: '',
        video: null,
        url: null,
        tech: [],
    },
    contactForm: {
        name: '',
        email: '',
        message: '',
        submitted: false,
        errors: {},
    },

    init() {
        this.handleScroll();
        window.addEventListener('scroll', () => this.handleScroll(), { passive: true });
    },

    handleScroll() {
        this.showBackToTop = window.scrollY > 500;

        const sections = ['home', 'about', 'skills', 'services', 'projects', 'contact'];
        const scrollPos = window.scrollY + 120;

        for (const id of sections) {
            const el = document.getElementById(id);
            if (el && el.offsetTop <= scrollPos && el.offsetTop + el.offsetHeight > scrollPos) {
                this.activeSection = id;
                break;
            }
        }
    },

    scrollTo(id) {
        this.mobileMenuOpen = false;
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    },

    matchesProjectFilter(category) {
        return this.projectFilter === 'all' || this.projectFilter === category;
    },

    getProjectVideoSrc() {
        const video = this.projectModal.video;
        if (!video || this.isYoutubeVideo(video)) return null;
        if (video.startsWith('http://') || video.startsWith('https://')) {
            return video;
        }
        return '/' + video.replace(/^\//, '');
    },

    isYoutubeVideo(url) {
        if (!url) return false;
        return /youtu\.be|youtube\.com/.test(url);
    },

    getYoutubeEmbedUrl(url) {
        if (!this.isYoutubeVideo(url)) return '';

        let videoId = null;

        if (url.includes('youtu.be/')) {
            videoId = url.split('youtu.be/')[1].split(/[?&]/)[0];
        } else if (url.includes('youtube.com/watch')) {
            videoId = new URL(url).searchParams.get('v');
        } else if (url.includes('youtube.com/embed/')) {
            videoId = url.split('youtube.com/embed/')[1].split(/[?&]/)[0];
        }

        return videoId ? `https://www.youtube.com/embed/${videoId}` : '';
    },

    openProjectModal(project) {
        this.projectModal = {
            open: true,
            title: project.title,
            description: project.description,
            video: project.video,
            url: project.url,
            tech: project.tech ?? [],
        };
        document.body.classList.add('overflow-hidden');
    },

    closeProjectModal() {
        this.projectModal.open = false;
        document.body.classList.remove('overflow-hidden');

        const video = this.$refs.modalVideo;
        if (video) {
            video.pause();
            video.currentTime = 0;
        }

        const iframe = this.$refs.modalYoutube;
        if (iframe) {
            iframe.src = '';
        }
    },

    submitContact() {
        this.contactForm.errors = {};

        if (!this.contactForm.name.trim()) {
            this.contactForm.errors.name = 'Informe seu nome.';
        }
        if (!this.contactForm.email.trim() || !this.contactForm.email.includes('@')) {
            this.contactForm.errors.email = 'Informe um e-mail válido.';
        }
        if (!this.contactForm.message.trim()) {
            this.contactForm.errors.message = 'Escreva sua mensagem.';
        }

        if (Object.keys(this.contactForm.errors).length === 0) {
            this.contactForm.submitted = true;
        }
    },
}));

Alpine.start();
