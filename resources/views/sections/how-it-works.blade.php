<section>
    <style>
        /* Custom animations */
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes glow {
            0%, 100% { 
                box-shadow: 
                    0 0 20px rgba(168, 85, 247, 0.1),
                    0 0 40px rgba(168, 85, 247, 0.05);
            }
            50% { 
                box-shadow: 
                    0 0 30px rgba(168, 85, 247, 0.2),
                    0 0 60px rgba(168, 85, 247, 0.1);
            }
        }
        
        .terminal-text {
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid #10b981;
            animation: typing 1.5s steps(30) forwards;
        }
        
        .terminal-cursor {
            animation: blink 1s infinite;
        }
        
        .fade-up {
            animation: fadeUp 0.6s ease-out forwards;
        }
        
        .device-glow {
            animation: glow 3s ease-in-out infinite;
        }
        
        /* Smooth scroll snapping */
        .scroll-container {
            scroll-snap-type: y proximity;
            scroll-padding: 50px 0;
        }
        
        .scroll-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
        }
        
        /* Progress indicators */
        .progress-dot {
            transition: all 0.3s ease;
        }
        
        .progress-dot.active {
            transform: scale(1.5);
            background: white;
        }
        
        /* Parallax layers */
        .parallax-slow {
            transform: translateY(var(--scroll-y, 0px));
            transition: transform 0.1s linear;
        }
        
        .parallax-fast {
            transform: translateY(calc(var(--scroll-y, 0px) * 1.5));
            transition: transform 0.1s linear;
        }
    </style>
</head>
<body class="bg-slate-900">
    <!-- Main animation section -->
    <section id="how-it-works" class="relative bg-slate-900">
        <!-- Fixed progress indicators -->
        <div class="fixed right-8 top-1/2 -translate-y-1/2 z-50 hidden lg:flex flex-col gap-3">
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="0"></div>
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="1"></div>
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="2"></div>
        </div>

        <!-- Step 1: Install -->
        <div class="scroll-section min-h-screen flex items-center justify-center py-20" data-step="0">
            <div class="container max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/20 text-purple-300 border border-purple-500/30 mb-4">
                        Step 1: Install
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        Start with a single command
                    </h2>
                </div>
                
                <!-- Terminal animation -->
                <div class="max-w-3xl mx-auto">
                    <div class="bg-black/80 rounded-xl border border-white/10 overflow-hidden device-glow">
                        <!-- Terminal header -->
                        <div class="bg-slate-800/50 px-4 py-2 flex items-center gap-2 border-b border-white/10">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                            <span class="text-xs text-slate-400 ml-2">Terminal</span>
                        </div>
                        
                        <!-- Terminal content -->
                        <div class="p-6 font-mono text-sm">
                            <div class="command-line opacity-0">
                                <span class="text-green-400">$</span>
                                <span class="text-white ml-2">composer create-project hyde/hyde</span>
                                <span class="terminal-cursor text-green-400">_</span>
                            </div>
                            
                            <div class="output-lines mt-4 space-y-1">
                                <div class="output-line opacity-0 text-slate-400">Creating a new Hyde project...</div>
                                <div class="output-line opacity-0 text-slate-400">Installing dependencies...</div>
                                <div class="output-line opacity-0">
                                    <div class="flex items-center gap-2">
                                        <div class="progress-bar w-64 h-2 bg-slate-700 rounded-full overflow-hidden">
                                            <div class="progress-fill h-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full" style="width: 0%"></div>
                                        </div>
                                        <span class="text-green-400 text-xs">0%</span>
                                    </div>
                                </div>
                                <div class="output-line opacity-0 text-green-400 font-bold">✓ Installation complete!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Create Content -->
        <div class="scroll-section min-h-screen flex items-center justify-center py-20" data-step="1">
            <div class="container max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-300 border border-blue-500/30 mb-4">
                        Step 2: Create Content
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        Write in Markdown
                    </h2>
                </div>
                
                <!-- Code editor animation -->
                <div class="max-w-4xl mx-auto">
                    <div class="bg-slate-800/80 rounded-xl border border-white/10 overflow-hidden device-glow">
                        <!-- Editor header -->
                        <div class="bg-slate-700/50 px-4 py-2 flex items-center justify-between border-b border-white/10">
                            <div class="flex items-center gap-3">
                                <div class="flex gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                </div>
                                <span class="text-xs text-slate-400">hello-world.md</span>
                            </div>
                            <span class="text-xs text-slate-500">Markdown</span>
                        </div>
                        
                        <!-- Editor content with syntax highlighting -->
                        <div class="p-6 font-mono text-sm">
                            <div class="code-lines space-y-2">
                                <div class="code-line opacity-0">
                                    <span class="text-purple-400">---</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-cyan-400">title:</span> <span class="text-green-400">"Hello World"</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-cyan-400">date:</span> <span class="text-green-400">"2025-01-20"</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-purple-400">---</span>
                                </div>
                                <div class="code-line opacity-0 mt-4">
                                    <span class="text-blue-400">#</span> <span class="text-white">Welcome to Hyde</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-slate-300">This is my first post built with **HydePHP**.</span>
                                </div>
                                <div class="code-line opacity-0 mt-2">
                                    <span class="text-blue-400">##</span> <span class="text-white">Features</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-slate-400">-</span> <span class="text-slate-300">Lightning fast</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-slate-400">-</span> <span class="text-slate-300">Markdown powered</span>
                                </div>
                                <div class="code-line opacity-0">
                                    <span class="text-slate-400">-</span> <span class="text-slate-300">Laravel elegance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Ship -->
        <div class="scroll-section min-h-screen flex items-center justify-center py-20" data-step="2">
            <div class="container max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-500/20 text-green-300 border border-green-500/30 mb-4">
                        Step 3: Ship
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        Deploy anywhere
                    </h2>
                </div>
                
                <!-- Browser preview -->
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden device-glow transform perspective-1000">
                        <!-- Browser header -->
                        <div class="bg-slate-100 px-4 py-3 flex items-center justify-between border-b border-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="flex gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                </div>
                                <div class="bg-white rounded px-3 py-1 text-sm text-slate-600 border border-slate-300 ml-2">
                                    ship.hydephp.com
                                </div>
                            </div>
                            <div class="flex gap-4 text-sm text-slate-500">
                                <span>Home</span>
                                <span>Blog</span>
                                <span>About</span>
                            </div>
                        </div>
                        
                        <!-- Website content -->
                        <div class="p-8 bg-gradient-to-br from-white to-slate-50">
                            <div class="site-content opacity-0">
                                <h1 class="text-3xl font-bold text-slate-900 mb-2">Hello World</h1>
                                <p class="text-slate-500 mb-6">January 20, 2025</p>
                                
                                <div class="prose prose-slate max-w-none">
                                    <h2 class="text-xl font-semibold text-slate-800 mb-3">Welcome to Hyde</h2>
                                    <p class="text-slate-600 mb-4">This is my first post built with <strong>HydePHP</strong>.</p>
                                    
                                    <h3 class="text-lg font-semibold text-slate-800 mb-2">Features</h3>
                                    <ul class="list-disc list-inside text-slate-600 space-y-1">
                                        <li>Lightning fast</li>
                                        <li>Markdown powered</li>
                                        <li>Laravel elegance</li>
                                    </ul>
                                </div>
                                
                                <!-- Performance metrics https://pagespeed.web.dev/analysis/https-welcome-hydephp-com-hello-world-html/7obqlrvx8j?form_factor=desktop -->
                                <div class="mt-8 grid grid-cols-3 gap-4">
                                    <div class="metric-card opacity-0 bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-green-600">100</div>
                                        <div class="text-sm text-green-800">Lighthouse Score</div>
                                    </div>
                                    <div class="metric-card opacity-0 bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-blue-600">0.3s</div>
                                        <div class="text-sm text-blue-800">Load Time</div>
                                    </div>
                                    <div class="metric-card opacity-0 bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-purple-600">0%</div>
                                        <div class="text-sm text-purple-800">JS Required</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Deploy buttons -->
                    {{-- <div class="deploy-buttons opacity-0 mt-8 flex justify-center gap-4">
                        <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:shadow-lg transform hover:scale-105 transition">
                            Deploy to Netlify
                        </button>
                        <button class="px-6 py-3 bg-slate-800 text-white rounded-lg font-semibold hover:bg-slate-700 transition">
                            Deploy to Vercel
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>


    <script>
        // Intersection Observer for triggering animations
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        // Step 1: Terminal animations
        const step1Observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const section = entry.target;
                    
                    // Animate command line
                    setTimeout(() => {
                        section.querySelector('.command-line').classList.add('fade-up');
                        section.querySelector('.command-line').style.opacity = '1';
                    }, 200);
                    
                    // Animate output lines
                    const outputLines = section.querySelectorAll('.output-line');
                    outputLines.forEach((line, index) => {
                        setTimeout(() => {
                            line.classList.add('fade-up');
                            line.style.opacity = '1';
                            
                            // Animate progress bar
                            if (line.querySelector('.progress-fill')) {
                                const progressFill = line.querySelector('.progress-fill');
                                const progressText = line.parentElement.querySelector('.text-green-400');
                                let progress = 0;
                                const interval = setInterval(() => {
                                    progress += 5;
                                    progressFill.style.width = `${progress}%`;
                                    if (progressText) progressText.textContent = `${progress}%`;
                                    if (progress >= 100) clearInterval(interval);
                                }, 50);
                            }
                        }, 800 + (index * 400));
                    });
                    
                    step1Observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Step 2: Code editor animations
        const step2Observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const codeLines = entry.target.querySelectorAll('.code-line');
                    codeLines.forEach((line, index) => {
                        setTimeout(() => {
                            line.classList.add('fade-up');
                            line.style.opacity = '1';
                        }, 200 + (index * 150));
                    });
                    
                    step2Observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Step 3: Browser animations
        const step3Observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Animate site content
                    setTimeout(() => {
                        entry.target.querySelector('.site-content').classList.add('fade-up');
                        entry.target.querySelector('.site-content').style.opacity = '1';
                    }, 200);
                    
                    // Animate metric cards
                    const metricCards = entry.target.querySelectorAll('.metric-card');
                    metricCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('fade-up');
                            card.style.opacity = '1';
                        }, 800 + (index * 200));
                    });
                    
                    // Animate deploy buttons
                    setTimeout(() => {
                        const deployButtons = entry.target.querySelector('.deploy-buttons');
                        if (deployButtons) {
                            deployButtons.classList.add('fade-up');
                            deployButtons.style.opacity = '1';
                        }
                    }, 1600);
                    
                    step3Observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all steps
        document.querySelectorAll('[data-step="0"]').forEach(el => step1Observer.observe(el));
        document.querySelectorAll('[data-step="1"]').forEach(el => step2Observer.observe(el));
        document.querySelectorAll('[data-step="2"]').forEach(el => step3Observer.observe(el));

        // Update progress dots based on scroll
        const updateProgressDots = () => {
            const sections = document.querySelectorAll('.scroll-section');
            const scrollPosition = window.scrollY + window.innerHeight / 2;
            
            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const dot = document.querySelector(`.progress-dot[data-step="${index}"]`);
                
                if (rect.top < window.innerHeight / 2 && rect.bottom > window.innerHeight / 2) {
                    dot?.classList.add('active');
                } else {
                    dot?.classList.remove('active');
                }
            });
        };

        // Parallax effect (subtle)
        const updateParallax = () => {
            const scrollY = window.scrollY;
            document.documentElement.style.setProperty('--scroll-y', `${scrollY * 0.1}px`);
        };

        // Throttled scroll handler
        let ticking = false;
        const handleScroll = () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    updateProgressDots();
                    updateParallax();
                    ticking = false;
                });
                ticking = true;
            }
        };

        window.addEventListener('scroll', handleScroll);
        
        // Initial call
        updateProgressDots();
    </script>
</section>