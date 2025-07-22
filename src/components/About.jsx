import React from "react";

const About = () => {
    return (
        <section id="sobre" className="min-h-screen bg-gradient-to-b from-gray-100 to-white py-20">
            <div className="container mx-auto px-6 max-w-6xl">
                <div className="text-center mb-16">
                    <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Sobre Mim
                    </h2>
                    <div className="w-24 h-1 bg-black mx-auto"></div>
                </div>
            </div>

            <div className="space-y-6">
                <div className="space-y-4">
                    <h3 className="text-2xl md:text-3xl font-bold text-gray-800">
                        Olá, eu sou Miguel!
                    </h3>
                    <p className="text-lg text-gray-600 leading-relaxed">
                        Desenvolvedor Full Stack e Cientista de Dados apaixonado por tecnologia e inovação.
                        Com experiência em desenvolvimento web e análise de dados, busco constantemente
                        criar soluções que façam a diferença no mundo digital.
                    </p>
                    <p className="text-lg text-gray-600 leading-relaxed">
                        Minha jornada começou com curiosidade sobre como as coisas funcionam por trás
                        das telas, e hoje trabalho transformando dados complexos em insights valiosos
                        e desenvolvendo aplicações que resolvem problemas reais.
                    </p>
                </div>

                <div className="grid grid-cols-2 gap-6 pt-6">
                    <div className="text-center p-4 bg-gray-50 rounded-lg hove:shadow-lg tras">
                        <div className="text-3xl font-bold text-black mb-2">1 e 6 meses</div>
                        <div className="text-gray-600 font-medium">Anos de Experiência</div>
                    </div>
                    <div className="text-center p-4 bg-gray-50 rounded-lg hove:shadow-lg transition-all duration-300">
                        <div className="text-3xl font-bold text-black mb-2">10</div>
                        <div className="text-gray-600 font-medium">Projetos Concluídos</div>
                    </div>
                </div>
            </div>

            <div className="flex justify-center">
                <div className="relative">
                    <div className="w-80 h-80 bg-gradient-to-br from-gray-200 to-gray-400 rounded-2xl flex items-center justify-center shadow-2xl overflow-hidden">
                        <div className="text-6xl text-gray-600">
                          <img className="w-64 h-64 object-cover rounded-xl shadow-lg" src="/miguel.jpg"
                          alt="Miguel - Desenvolvedor Full-stack"></img>
                        </div>
                    </div>

                    <div className="absolute -top-4 -right-4 w-24 h-24 bg-black rounded-full"></div>
                    <div className="absolute -bottom-4 -left-4 w-16 h-16 bg-gray-300 opacity-60 rounded-full"></div>
                </div>
            </div>
        </section>
    )
}

export default About;
