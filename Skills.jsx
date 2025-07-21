import React, { useState, useEffect } from "react";

const Skills = () => {
    const skillsData = {
        frontend: [
            { name: 'HTML & CSS', level: 60 },
            { name: 'Javascript', level: 65 },
            { name: 'React', level: 55 },
            { name: 'Tailwind CSS', level: 55 }
        ],
        backend: [
            { name: 'C#', level: 65 },
            { name: 'Python', level: 50 },
            { name: 'PHP', level: 55 },
            { name: 'Node.js', level: 50 },
            { name: 'SQL Server', level: 65 }
        ],
        others: [
            { name: 'Lógica da Programação', level: 65 },
            { name: 'Refatoração de Código', level: 65 },
            { name: 'Data Science', level: 55 },
            { name: 'Inglês (B1)', level: 50 }
        ]
    };

    const SkillBar = ({ skill }) => (
        <div className="mb-6">
            <div className="flex justify-between mb-2">
                <span className="text-gray-300 font-medium">{skill.name}</span>
                <span className="text-gray-400 text-sm">{skill.level}</span>
            </div>
            <div className="w-full bg-gray-800 rounded-full h-3">
                <div
                    className="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-100 ease-out"
                    style={{ width: `${skill.level}%` }}
                ></div>
            </div>
        </div>
    );

    return (
        <section id="skills" className="min-h-screen bg-gradient-to-br from-black via-gray-900 to-gray-900 py-20">
            <div className="container mx-auto px-6 max-w-6xl mb-4">
                <div className="text-center mb-16">
                    <h2 className="text-4xl md:text-5xl font-bold text-white mb-6">
                        Minhas Habilidades
                    </h2>
                </div>
                <div className="w-24 h-1 bg-white mx-auto mb-4"></div>
                <p className="text-lg text-gray-300 max-w-2xl mx-auto">
                    Experiência sólida em desenvolvimento full-stack, desde interfaces responsivas
                    até integração com banco de dados e análise de dados.
                </p>
            </div>

            <div className="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                <div className="bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-800">
                    <div className="text-center mb-6">
                        <div className="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 p-3">
                            <img
                                src="/front-end.png"
                                alt="Front-end"
                                className="w-full h-full object-contain"
                            />
                        </div>
                        <h3 className="text-xl font-bold text-white">Front-End</h3>
                    </div>
                    {skillsData.frontend.map((skill, index) => (
                        <SkillBar key={index} skill={skill} />
                    ))}
                </div>

                <div className="bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-800">
                    <div className="text-center mb-6">

                        <div className="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4 p-3">
                            <img
                                src="/coding.png"
                                alt="Back-end"
                                className="w-full h-full object-contain"
                            />
                        </div>
                        <h3 className="text-xl font-bold text-white">Back-End</h3>
                    </div>
                    {skillsData.backend.map((skill, index) => (
                        <SkillBar key={index} skill={skill} />
                    ))}
                </div>

                <div className="bg-gray-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-800">
                    <div className="text-center mb-6">
                        <div className="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 p-3">
                            <img
                                src="/skill.png"
                                alt="Outras Habilidades"
                                className="w-full h-full object-contain"
                            />
                        </div>
                        <h3 className="text-xl font-bold text-white">Outras Habilidades</h3>
                    </div>
                    {skillsData.others.map((skill, index) => (
                        <SkillBar key={index} skill={skill} />
                    ))}
                </div>
            </div>

            <div className="mt-16 bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl p-8 text-white border border-gray-700">
                <h3 className="text-2xl font-bold text-center mb-8">Certificações & Conquistas</h3>
                <div className="grid md:grid-cols-3 gap-8 text-center">
                    <div className="bg-gray-700 bg-opacity-50 rounded-xl p-6    ">
                        <div className="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 p-2">
                            <img
                                src="/mba.png"
                                alt="MBA"
                                className="h-8 w-8 object-contain"
                            />
                        </div>
                        <div className="text-lg font-bold mb-2">Faculdade</div>
                        <div className="text-gray-300 text-sm">Engenharia de Software</div>
                        <div className="text-gray-400 text-xs mt-1">UNISA</div>
                    </div>
                    <div className="bg-gray-700 bg-opacity-50 rounded-xl p-6">
                        <div className="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3 p-2">
                            <img
                                src="/conclusion.png"
                                alt="Conclusão"
                                className="h-8 w-8 object-contain"
                            />
                        </div>
                        <div className="text-lg font-bold mb-2">MBA Concluído</div>
                        <div className="text-gray-300 text-sm">Tecnologia para Negócios - Data Science & Big Data</div>
                        <div className="text-gray-400 text-xs mt-1">Faculdade Iguaçu</div>
                    </div>
                    <div className="bg-gray-700 bg-opacity-50 rounded-xl p-6">
                        <div className="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3 p-2">
                            <img
                                src="/database.png"
                                alt="Banco de Dados"
                                className="h-8 w-8 object-contain"
                            />
                        </div>
                        <div className="text-lg font-bold mb-2">Curso em Andamento</div>
                        <div className="text-gray-300 text-sm">Aplicação de Banco de Dados</div>
                        <div className="text-gray-400 text-xs mt-1">Fundação FAT</div>
                    </div>
                </div>
                <div className="flex justify-center mt-5">
                    <div className="bg-gray-700 bg-opacity-50 rounded-xl p-6 w-full max-w-sm">
                        <div className="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3 p-2">
                            <img
                                src="/english.png"
                                alt="Inglês"
                                className="h-8 w-8 object-contain"
                            />
                        </div>
                        <div className="text-lg font-bold mb-2 text-center">Inglês B1</div>
                        <div className="text-gray-300 text-sm text-center">Comunicação Técnica Internacional</div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default Skills;