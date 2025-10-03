<section>
    <style>
        /* Apple-style scroll-driven animation */
        #how-it-works-scroll-container {
            height: 400vh; /* Scroll track for 3 steps */
            position: relative;
        }

        #how-it-works-viewport {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-content {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            will-change: opacity, visibility;
        }

        .step-content.active {
            visibility: visible;
            pointer-events: auto;
        }

        /* Subtle glow effect */
        .device-glow {
            box-shadow:
                0 0 20px rgba(168, 85, 247, 0.05),
                0 0 40px rgba(168, 85, 247, 0.03);
            transition: box-shadow 0.6s ease;
        }

        .device-glow.enhanced {
            box-shadow:
                0 0 30px rgba(168, 85, 247, 0.15),
                0 0 60px rgba(168, 85, 247, 0.08);
        }

        /* Progress indicators */
        .progress-dot {
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .progress-dot.active {
            transform: scale(1.5);
            background: white;
        }

        /* Smooth element animations - controlled by scroll */
        .animate-element {
            will-change: opacity, transform;
        }

        /* Cursor blink */
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        .terminal-cursor {
            animation: blink 1s infinite;
        }
    </style>

    <!-- Main scroll-driven animation section -->
    <section id="how-it-works" class="relative bg-slate-900">
        <!-- Fixed progress indicators -->
        <div class="fixed right-8 top-1/2 -translate-y-1/2 z-50 hidden lg:flex flex-col gap-3">
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="0"></div>
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="1"></div>
            <div class="progress-dot w-2 h-2 bg-white/30 rounded-full" data-step="2"></div>
        </div>

        <!-- Scroll container (tall area to enable scroll) -->
        <div id="how-it-works-scroll-container">
            <!-- Sticky viewport (fixed at 100vh) -->
            <div id="how-it-works-viewport">

                <!-- Step 1: Install -->
                <div class="step-content" data-step="0">
                    <div class="container max-w-6xl mx-auto px-6">
                        <div class="text-center mb-12">
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/20 text-purple-300 border border-purple-500/30 mb-4 animate-element">
                                Step 1: Install
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4 animate-element">
                                Start with a single command
                            </h2>
                        </div>

                        <!-- Terminal animation -->
                        <div class="max-w-3xl mx-auto">
                            <div class="bg-black/80 rounded-xl border border-white/10 overflow-hidden device-glow animate-element">
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
                                    <div class="command-line">
                                        <span class="text-green-400">$</span>
                                        <span class="text-white ml-2">composer create-project hyde/hyde</span>
                                        <span class="terminal-cursor text-green-400">_</span>
                                    </div>

                                    <div class="output-lines mt-4 space-y-1">
                                        <div class="output-line text-slate-400 animate-element">Creating a new Hyde project...</div>
                                        <div class="output-line text-slate-400 animate-element">Installing dependencies...</div>
                                        <div class="output-line animate-element">
                                            <div class="flex items-center gap-2">
                                                <div class="progress-bar w-64 h-2 bg-slate-700 rounded-full overflow-hidden">
                                                    <div class="progress-fill h-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full" style="width: 0%"></div>
                                                </div>
                                                <span class="progress-percent text-green-400 text-xs">0%</span>
                                            </div>
                                        </div>
                                        <div class="output-line text-green-400 font-bold animate-element">✓ Installation complete!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Create Content -->
                <div class="step-content" data-step="1">
                    <div class="container max-w-6xl mx-auto px-6">
                        <div class="text-center mb-12">
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-300 border border-blue-500/30 mb-4 animate-element">
                                Step 2: Create Content
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4 animate-element">
                                Write in Markdown
                            </h2>
                        </div>

                        <!-- Code editor animation -->
                        <div class="max-w-4xl mx-auto">
                            <div class="bg-slate-800/80 rounded-xl border border-white/10 overflow-hidden device-glow animate-element">
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
                                        <div class="code-line animate-element">
                                            <span class="text-purple-400">---</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-cyan-400">title:</span> <span class="text-green-400">"Hello World"</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-cyan-400">date:</span> <span class="text-green-400">"2025-01-20"</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-purple-400">---</span>
                                        </div>
                                        <div class="code-line animate-element mt-4">
                                            <span class="text-blue-400">#</span> <span class="text-white">Welcome to Hyde</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-slate-300">This is my first post built with **HydePHP**.</span>
                                        </div>
                                        <div class="code-line animate-element mt-2">
                                            <span class="text-blue-400">##</span> <span class="text-white">Features</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-slate-400">-</span> <span class="text-slate-300">Lightning fast</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-slate-400">-</span> <span class="text-slate-300">Markdown powered</span>
                                        </div>
                                        <div class="code-line animate-element">
                                            <span class="text-slate-400">-</span> <span class="text-slate-300">Laravel elegance</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Ship -->
                <div class="step-content" data-step="2">
                    <div class="container max-w-6xl mx-auto px-6">
                        <div class="text-center mb-12">
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-500/20 text-green-300 border border-green-500/30 mb-4 animate-element">
                                Step 3: Ship
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4 animate-element">
                                Deploy anywhere
                            </h2>
                        </div>

                        <!-- Browser preview -->
                        <div class="max-w-5xl mx-auto">
                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden device-glow transform perspective-1000 animate-element">
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
                                    <div class="site-content">
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

                                        <!-- Performance metrics -->
                                        <div class="mt-8 grid grid-cols-3 gap-4">
                                            <div class="metric-card bg-green-50 border border-green-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-green-600">100</div>
                                                <div class="text-sm text-green-800">Lighthouse Score</div>
                                            </div>
                                            <div class="metric-card bg-blue-50 border border-blue-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-blue-600">0.3s</div>
                                                <div class="text-sm text-blue-800">Load Time</div>
                                            </div>
                                            <div class="metric-card bg-purple-50 border border-purple-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-purple-600">0%</div>
                                                <div class="text-sm text-purple-800">JS Required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Apple-style scroll-driven animation controller
        (function() {
            const container = document.getElementById('how-it-works-scroll-container');
            const viewport = document.getElementById('how-it-works-viewport');
            const steps = document.querySelectorAll('.step-content');
            const progressDots = document.querySelectorAll('.progress-dot');
            const TOTAL_STEPS = 3;

            // Helper function to map a value from one range to another
            function mapRange(value, inMin, inMax, outMin, outMax) {
                return Math.max(outMin, Math.min(outMax,
                    (value - inMin) * (outMax - outMin) / (inMax - inMin) + outMin
                ));
            }

            // Helper to apply scroll-based opacity and transform
            function applyScrollEffect(element, progress, startProgress, endProgress) {
                const elementProgress = mapRange(progress, startProgress, endProgress, 0, 1);
                const opacity = elementProgress;
                const translateY = (1 - elementProgress) * 20; // 20px movement
                const scale = 0.95 + (elementProgress * 0.05); // 0.95 to 1

                element.style.opacity = opacity;
                element.style.transform = `translateY(${translateY}px) scale(${scale})`;
            }

            function updateAnimation() {
                if (!container || !viewport) return;

                const rect = container.getBoundingClientRect();
                const viewportHeight = window.innerHeight;

                // Calculate overall scroll progress (0 to 1)
                const scrollProgress = Math.max(0, Math.min(1,
                    -rect.top / (rect.height - viewportHeight)
                ));

                // Determine which step is primary (0, 1, or 2)
                const rawStep = scrollProgress * TOTAL_STEPS;
                const currentStep = Math.min(TOTAL_STEPS - 1, Math.floor(rawStep));

                // Calculate progress within current step (0 to 1)
                const stepProgress = rawStep - currentStep;

                // Update progress dots
                progressDots.forEach((dot, i) => {
                    if (i === currentStep) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });

                // Animate each step based on scroll
                steps.forEach((stepEl, stepIndex) => {
                    // Only show the current step
                    if (stepIndex === currentStep) {
                        stepEl.classList.add('active');
                        stepEl.style.opacity = 1;
                        animateStepElements(stepEl, stepIndex, stepProgress);
                    } else {
                        stepEl.classList.remove('active');
                        stepEl.style.opacity = 0;
                        // Reset all elements in inactive steps
                        const allElements = stepEl.querySelectorAll('.animate-element, .code-line, .metric-card');
                        allElements.forEach(el => {
                            el.style.opacity = 0;
                            el.style.transform = 'translateY(20px) scale(0.95)';
                        });
                    }
                });
            }

            function animateStepElements(stepEl, stepIndex, progress) {
                const elements = stepEl.querySelectorAll('.animate-element');

                // Step 1: Terminal
                if (stepIndex === 0) {
                    // Badge appears first
                    if (elements[0]) applyScrollEffect(elements[0], progress, 0, 0.15);
                    // Title appears
                    if (elements[1]) applyScrollEffect(elements[1], progress, 0.1, 0.25);
                    // Terminal container
                    if (elements[2]) applyScrollEffect(elements[2], progress, 0.2, 0.35);
                    // Command line
                    if (elements[3]) applyScrollEffect(elements[3], progress, 0.3, 0.45);
                    // Output line 1
                    if (elements[4]) applyScrollEffect(elements[4], progress, 0.4, 0.55);
                    // Progress bar
                    if (elements[5]) {
                        applyScrollEffect(elements[5], progress, 0.5, 0.65);
                        // Update progress bar fill based on scroll
                        const progressFill = stepEl.querySelector('.progress-fill');
                        const progressPercent = stepEl.querySelector('.progress-percent');
                        const barProgress = Math.round(mapRange(progress, 0.5, 0.85, 0, 100));
                        if (progressFill) progressFill.style.width = `${barProgress}%`;
                        if (progressPercent) progressPercent.textContent = `${barProgress}%`;
                    }
                    // Complete message
                    if (elements[6]) applyScrollEffect(elements[6], progress, 0.7, 0.85);
                }

                // Step 2: Code editor
                if (stepIndex === 1) {
                    // Badge
                    if (elements[0]) applyScrollEffect(elements[0], progress, 0, 0.1);
                    // Title
                    if (elements[1]) applyScrollEffect(elements[1], progress, 0.05, 0.15);
                    // Editor container
                    if (elements[2]) applyScrollEffect(elements[2], progress, 0.1, 0.2);

                    // Code lines appear progressively
                    const codeLines = stepEl.querySelectorAll('.code-line');
                    codeLines.forEach((line, i) => {
                        const lineStart = 0.2 + (i * 0.06);
                        const lineEnd = lineStart + 0.1;
                        applyScrollEffect(line, progress, lineStart, lineEnd);
                    });
                }

                // Step 3: Browser
                if (stepIndex === 2) {
                    // Badge
                    if (elements[0]) applyScrollEffect(elements[0], progress, 0, 0.1);
                    // Title
                    if (elements[1]) applyScrollEffect(elements[1], progress, 0.05, 0.15);
                    // Browser container
                    if (elements[2]) applyScrollEffect(elements[2], progress, 0.15, 0.3);

                    // Metric cards
                    const metricCards = stepEl.querySelectorAll('.metric-card');
                    metricCards.forEach((card, i) => {
                        const cardStart = 0.5 + (i * 0.15);
                        const cardEnd = cardStart + 0.15;
                        applyScrollEffect(card, progress, cardStart, cardEnd);
                    });

                    // Enhanced glow on browser
                    const deviceGlow = stepEl.querySelector('.device-glow');
                    if (deviceGlow && progress > 0.3) {
                        deviceGlow.classList.add('enhanced');
                    } else if (deviceGlow) {
                        deviceGlow.classList.remove('enhanced');
                    }
                }
            }

            // Throttled scroll handler using requestAnimationFrame
            let ticking = false;
            function handleScroll() {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        updateAnimation();
                        ticking = false;
                    });
                    ticking = true;
                }
            }

            window.addEventListener('scroll', handleScroll, { passive: true });

            // Initial call
            updateAnimation();
        })();
    </script>
</section>