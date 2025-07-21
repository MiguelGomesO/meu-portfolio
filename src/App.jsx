import { useState } from 'react'
import './App.css'
import Header from './components/Header.jsx'
import About from './components/About.jsx'
import Skills from './components/Skills.jsx'

function App() {
  const [count, setCount] = useState(0)

  return (
    <div className='min-h-screen'>
      <Header />

      <section className='h-screen bg-gradient-to-br from-black via-gray-900 to-gray-900 flex items-center justify-center'>
        <div className='text-center text-white px-6'>
          <h2 className='text-4xl md:text-6xl font-bold mb-6'>
            Entre linhas de código e gráficos de dados, construo o futuro digital!
          </h2>
          <p className='text-xl md:text-2xl mb-8 opacity-90'>
            Transformando ideias em produtos inteligentes e orientados por dados.
          </p>
          <button className='bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition-all duration-300 transform hover: scale-105 border-2 border-white'>
            Ver Projetos
          </button>
        </div>
      </section>

      <About />

      <Skills />
    </div>
  )
}

export default App;
