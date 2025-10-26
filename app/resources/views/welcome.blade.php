@extends("layouts.app")

@section("content")

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
    
    body {
        font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated background particles */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: float 15s infinite;
    }

    .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { left: 40%; animation-delay: 1s; }
    .particle:nth-child(5) { left: 50%; animation-delay: 3s; }
    .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
    .particle:nth-child(7) { left: 70%; animation-delay: 2.5s; }
    .particle:nth-child(8) { left: 80%; animation-delay: 4.5s; }
    .particle:nth-child(9) { left: 90%; animation-delay: 1.5s; }

    @keyframes float {
        0%, 100% {
            transform: translateY(100vh) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) scale(1);
        }
    }

    .container-wrapper {
        position: relative;
        z-index: 1;
        padding: 2rem 1rem;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stack-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border-radius: 30px;
        padding: 3rem 2rem;
        max-width: 900px;
        width: 100%;
        text-align: center;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stack-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
        background-size: 200% 100%;
        animation: gradient 3s linear infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    .logo-container {
        margin-bottom: 2rem;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .stack-title {
        font-size: 2.8rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .stack-subtitle {
        font-size: 1.1rem;
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 2rem;
    }

    .divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
        margin: 1.5rem auto;
    }

    /* Tech Stack Grid */
    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin: 2.5rem 0;
    }

    .tech-item {
        background: linear-gradient(135deg, #f8f9ff, #ffffff);
        border: 2px solid transparent;
        border-radius: 15px;
        padding: 1.5rem 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .tech-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .tech-item:hover::before {
        opacity: 0.1;
    }

    .tech-item:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: #667eea;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .tech-icon {
        font-size: 2.5rem;
        position: relative;
        z-index: 1;
    }

    .tech-name {
        font-weight: 700;
        font-size: 0.95rem;
        color: #333;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
    }

    .tech-item:hover .tech-name {
        color: #667eea;
    }

    .description-text {
        font-size: 1.15rem;
        color: #555;
        line-height: 1.8;
        margin: 2rem 0;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-button {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: white;
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.6);
        background: linear-gradient(135deg, #764ba2, #667eea);
    }

    .cta-button:active {
        transform: translateY(-1px);
    }

    #stack-info {
        margin-top: 2rem;
        padding: 2rem;
        background: linear-gradient(135deg, #f8f9ff, #ffffff);
        border-radius: 15px;
        border-left: 4px solid #667eea;
    }

    .footer {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e0e0e0;
        font-size: 0.95rem;
        color: #6c757d;
    }

    .brand {
        font-weight: 800;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .year {
        font-weight: 600;
        color: #667eea;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stack-title {
            font-size: 2rem;
        }
        
        .stack-card {
            padding: 2rem 1.5rem;
        }
        
        .tech-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .tech-item {
            padding: 1rem 0.5rem;
        }
        
        .tech-icon {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .tech-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Animated Background Particles -->
<div class="particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="container-wrapper">
    <div class="stack-card">
        <!-- Logo/Icon -->
        <div class="logo-container">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="url(#gradient)" opacity="0.2"/>
                <path d="M30 50L45 35L60 50L45 65L30 50Z" fill="url(#gradient)"/>
                <path d="M45 35L60 20L75 35L60 50L45 35Z" fill="url(#gradient)" opacity="0.7"/>
                <circle cx="60" cy="50" r="8" fill="url(#gradient)"/>
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#667eea"/>
                        <stop offset="100%" style="stop-color:#764ba2"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <!-- Title -->
        <h1 class="stack-title">Bits Informatics Limited</h1>
        <p class="stack-subtitle">Enterprise Technology Solutions</p>
        
        <div class="divider"></div>

        <!-- Description -->
        <p class="description-text">
            Crafting cutting-edge enterprise systems with a powerful, battle-tested technology stack. 
            We transform ideas into scalable, secure, and high-performance digital solutions.
        </p>

        <!-- Tech Stack Grid -->
        <div class="tech-grid">
            <a href="https://laravel.com" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🚀</div>
                <div class="tech-name">LARAVEL</div>
            </a>

            <a href="https://getbootstrap.com" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🎨</div>
                <div class="tech-name">BOOTSTRAP</div>
            </a>

            <a href="https://jquery.com" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">⚡</div>
                <div class="tech-name">JQUERY</div>
            </a>

            <a href="https://htmx.org" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🔄</div>
                <div class="tech-name">HTMX</div>
            </a>

            <a href="https://tailwindcss.com" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">💎</div>
                <div class="tech-name">TAILWIND CSS</div>
            </a>

            <a href="http://localhost:8081" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🗄️</div>
                <div class="tech-name">PHPMYADMIN</div>
            </a>

            <a href="http://localhost:15672" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🐰</div>
                <div class="tech-name">RABBITMQ</div>
            </a>

            <a href="https://www.docker.com" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🐳</div>
                <div class="tech-name">DOCKER</div>
            </a>

            <a href="http://localhost:8080/telescope" target="_blank" class="tech-item" rel="noopener noreferrer">
                <div class="tech-icon">🔭</div>
                <div class="tech-name">TELESCOPE</div>
            </a>
        </div>

        <!-- Call to Action -->
        <button 
            class="cta-button"
            hx-get="/stack"
            hx-target="#stack-info"
            hx-swap="innerHTML">
            Explore Our Stack
        </button>

        <!-- Dynamic Content Area -->
        <div id="stack-info"></div>

        <!-- Footer -->
        <div class="footer">
            <p>
                Crafted with 💜 and innovation by <span class="brand">Bits Informatics Limited</span>
            </p>
            <p class="mt-2">
                Building the future, one line of code at a time • <span class="year">2025</span>
            </p>
        </div>
    </div>
</div>

@endsection