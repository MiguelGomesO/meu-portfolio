import React, { useState, useEffect } from "react";

const Header = () => {
    const [scrolled, setScrolled] = useState(false);
    const [displayedName, setDisplayedName] = useState('');
    const [currentIndex, setCurrentIndex] = useState(0);
    const [showSubtitle, setShowSubtitle] = useState(false);
    const fullName = "Miguel Gomes de Oliveira";

    useEffect(() => {
        const handleScroll = () => {
            const isScrolled = window.scrollY > 10;
            setScrolled(isScrolled);
        }
        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    useEffect(() => {
        if (currentIndex < fullName.length) {
            const timeOut = setTimeout(() => {
                setDisplayedName(prev => prev + fullName[currentIndex]);
                setCurrentIndex(prev => prev + 1);
            }, 75);

            return () => clearTimeout(timeOut);
        } else if (currentIndex === fullName.length && !showSubtitle) {
            const subtitleTimeout = setTimeout(() => {
                setShowSubtitle(true);
            }, 300);

            return () => clearTimeout(subtitleTimeout);
        }
    }, [currentIndex, fullName, showSubtitle])

    return (
        <header className={`fixed top-0 left-0 right-0 transition-all duration-300 z-50 ${scrolled
            ? 'bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-200'
            : 'bg-black/80 backdrop-blur-md'
            }`}>
            <div className="container mx-auto px-6 py-4">
                <div className="flex items-center justify-between">
                    <div className="flex flex-col">
                        <div className="relative">
                            <h1 className={`text-2xl md:text-3xl font-bold transition-all duration-300 ${scrolled
                                ? 'text-black'
                                : 'text-white'
                                }`}>
                                {displayedName}
                                {currentIndex < fullName.length && (
                                    <span className={`inline-block w-0.5 h-6 md:h-8 bg-current ml-1${currentIndex < fullName.length ? 'animate-ping' : 'opacity-0'
                                        }`}></span>
                                )}
                            </h1>
                        </div>
                        {showSubtitle && (
                            <p className={`text-sm md:text-base font-medium transition-all duration-300 animate-pulse ${scrolled ? 'text-gray-600' : 'text-gray-300'}`}>
                                Desenvolvedor Full Stack | Analista de Dados | Cientista de Dados
                            </p>
                        )}
                    </div>

                    <nav className="hidden md:flex space-x-8">
                        {['Sobre', 'Projetos', 'Habilidades', 'Contato'].map((item) => (
                            <a
                                key={item}
                                href={`#${item.toLowerCase()}`}
                                className={`font-medium transition-all duration-300 hover:scale-105 ${scrolled
                                    ? 'text-gray-700 hover:text-black'
                                    : 'text-white hover:text-white'
                                    }`}
                            >
                                {item}
                            </a>
                        ))}
                    </nav>

                    <button className={`md:hidden p-2 rounded-lg transition-all duration-300 ${scrolled
                        ? 'text-gray-700 hover:bg-gray-100'
                        : 'text-gray-300 hover:bg-gray-800'
                        }`}>
                        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>
    );
};

export default Header;