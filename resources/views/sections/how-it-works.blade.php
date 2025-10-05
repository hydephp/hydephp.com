<section>
    <style>
        /* Apple-style scroll-driven animation */
        #how-it-works-scroll-container {
            height: 400vh; /* Scroll track for 3 steps */
            position: relative;
        }

        @media (max-width: 768px) {
            #how-it-works-scroll-container {
                height: auto; /* Disable scroll animation on mobile */
            }
        }

        #how-it-works-viewport {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1500px;
            perspective-origin: center center;
        }

        @media (max-width: 768px) {
            #how-it-works-viewport {
                position: relative;
                height: auto;
                min-height: auto;
                padding: 2rem 1rem;
            }
        }

        .step-content {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            will-change: opacity;
            transform-style: preserve-3d;
        }

        .step-content.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* Morphing container */
        #morphing-container {
            position: relative;
            will-change: width, height;
        }

        @media (max-width: 768px) {
            #morphing-container {
                width: 100% !important;
                max-width: calc(100vw - 2rem);
                height: auto !important;
                margin: 0 auto;
            }
        }

        .content-layer {
            position: absolute;
            inset: 0;
            opacity: 0;
            will-change: opacity;
        }

        @media (max-width: 768px) {
            .content-layer {
                position: relative;
                opacity: 1 !important;
                margin-bottom: 2rem;
                height: auto !important;
            }
        }

        .content-layer.visible {
            opacity: 1;
        }

        /* Subtle glow effect with morphing */
        .device-glow {
            box-shadow:
                0 0 20px rgba(168, 85, 247, 0.05),
                0 0 40px rgba(168, 85, 247, 0.03);
            transition: box-shadow 0.6s ease;
            will-change: transform, box-shadow;
        }

        .device-glow.enhanced {
            box-shadow:
                0 0 30px rgba(168, 85, 247, 0.15),
                0 0 60px rgba(168, 85, 247, 0.08);
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

        /* Mobile-specific styles */
        @media (max-width: 768px) {
            .animate-element {
                opacity: 1 !important;
                transform: none !important;
            }

            .site-content {
                flex-direction: column !important;
            }

            .metric-card {
                display: inline-block;
            }

            .metric-cards-mobile {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .progress-bar {
                max-width: 100% !important;
            }
        }
    </style>

    <!-- Main scroll-driven animation section -->
    <section id="how-it-works" class="relative bg-slate-900">
        <!-- Scroll container (tall area to enable scroll) -->
        <div id="how-it-works-scroll-container">
            <!-- Sticky viewport (fixed at 100vh) -->
            <div id="how-it-works-viewport" class="flex items-center justify-center">

                <div class="w-full">
                    <!-- Static heading -->
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white text-center mb-8 md:mb-16 px-4">
                        From terminal to production in minutes
                    </h2>

                    <!-- Single morphing container with all device layers -->
                    <div class="flex items-center justify-center">
                        <div id="morphing-container" class="relative">

                        <!-- Layer 1: Terminal -->
                        <div class="content-layer absolute inset-0" data-layer="0">
                            <div class="bg-black/80 rounded-xl border border-white/10 overflow-hidden device-glow w-full h-full">
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
                                <div class="p-4 md:p-6 font-mono text-xs md:text-sm">
                                    <div class="command-line">
                                        <span class="text-green-400">$</span>
                                        <span class="text-white ml-2 break-all">composer create-project hyde/hyde</span>
                                        <span class="terminal-cursor text-green-400">_</span>
                                    </div>

                                    <div class="output-lines mt-4 space-y-1">
                                        <div class="output-line text-slate-400 animate-element">Creating a new Hyde project...</div>
                                        <div class="output-line text-slate-400 animate-element">Installing dependencies...</div>
                                        <div class="output-line animate-element">
                                            <div class="flex items-center gap-2">
                                                <div class="progress-bar w-full max-w-64 h-2 bg-slate-700 rounded-full overflow-hidden">
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

                        <!-- Layer 2: Code Editor -->
                        <div class="content-layer absolute inset-0" data-layer="1">
                            <div class="bg-slate-800/80 rounded-xl border border-white/10 overflow-hidden device-glow w-full h-full">
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
                                <div class="p-4 md:p-6 font-mono text-xs md:text-sm">
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

                        <!-- Layer 3: Browser -->
                        <div class="content-layer absolute inset-0" data-layer="2">
                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden device-glow w-full h-full">
                                <!-- Browser header -->
                                <div class="bg-slate-100 px-4 py-3 grid grid-cols-3 items-center border-b border-slate-200">
                                    <div class="flex items-center gap-3">
                                        <div class="flex gap-1.5">
                                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="bg-white rounded px-2 md:px-4 py-1.5 text-xs md:text-sm text-slate-600 border border-slate-300 shadow-inner w-full max-w-xl text-center">
                                            ship.hydephp.com
                                        </div>
                                    </div>
                                    <div class="hidden md:flex justify-end gap-4 text-sm text-slate-500">
                                        <span>Home</span>
                                        <span>Blog</span>
                                        <span>About</span>
                                    </div>
                                </div>

                                <!-- Website content -->
                                <div class="p-4 md:p-8 bg-gradient-to-br from-white to-slate-50">
                                    <div class="site-content flex gap-6">
                                        <!-- Main content area -->
                                        <div class="flex-1">
                                            <h1 class="text-xl md:text-3xl font-bold text-slate-900 mb-2">Hello World</h1>
                                            <p class="text-sm md:text-base text-slate-500 mb-4 md:mb-6" id="current-date">January 20, 2025</p>

                                            <div class="prose prose-slate max-w-none">
                                                <h2 class="text-lg md:text-xl font-semibold text-slate-800 mb-2 md:mb-3">Welcome to Hyde</h2>
                                                <p class="text-sm md:text-base text-slate-600 mb-3 md:mb-4">This is my first post built with <strong>HydePHP</strong>.</p>

                                                <h3 class="text-base md:text-lg font-semibold text-slate-800 mb-2">Features</h3>
                                                <ul class="list-disc list-inside text-sm md:text-base text-slate-600 space-y-1">
                                                    <li>Lightning fast</li>
                                                    <li>Markdown powered</li>
                                                    <li>Laravel elegance</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Performance metrics sidebar -->
                                        <div class="hidden md:flex flex-col gap-4 w-32">
                                            <div class="metric-card bg-green-50 border border-green-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-green-600">100</div>
                                                <div class="text-xs text-green-800 leading-tight">Lighthouse Score</div>
                                            </div>
                                            <div class="metric-card bg-blue-50 border border-blue-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-blue-600">0.3s</div>
                                                <div class="text-xs text-blue-800 leading-tight">Load Time</div>
                                            </div>
                                            <div class="metric-card bg-purple-50 border border-purple-200 rounded-lg p-4 text-center animate-element">
                                                <div class="text-2xl font-bold text-purple-600">0%</div>
                                                <div class="text-xs text-purple-800 leading-tight">JS Required</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mobile metrics -->
                                    <div class="md:hidden metric-cards-mobile mt-4">
                                        <div class="metric-card bg-green-50 border border-green-200 rounded-lg p-3 text-center animate-element">
                                            <div class="text-xl font-bold text-green-600">100</div>
                                            <div class="text-xs text-green-800 leading-tight">Lighthouse</div>
                                        </div>
                                        <div class="metric-card bg-blue-50 border border-blue-200 rounded-lg p-3 text-center animate-element">
                                            <div class="text-xl font-bold text-blue-600">0.3s</div>
                                            <div class="text-xs text-blue-800 leading-tight">Load Time</div>
                                        </div>
                                        <div class="metric-card bg-purple-50 border border-purple-200 rounded-lg p-3 text-center animate-element">
                                            <div class="text-xl font-bold text-purple-600">0%</div>
                                            <div class="text-xs text-purple-800 leading-tight">JS Required</div>
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
        // Set today's date
        (function() {
            const dateEl = document.getElementById('current-date');
            if (dateEl) {
                const today = new Date();
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                dateEl.textContent = today.toLocaleDateString('en-US', options);
            }
        })();

        // Apple-style scroll-driven animation controller
        (function() {
            const container = document.getElementById('how-it-works-scroll-container');
            const viewport = document.getElementById('how-it-works-viewport');
            const TOTAL_STEPS = 3;

            // Disable scroll animation on mobile
            const isMobile = window.innerWidth <= 768;
            if (isMobile) {
                // Show all layers stacked on mobile
                document.querySelectorAll('.content-layer').forEach(layer => {
                    layer.style.opacity = '1';
                    layer.style.position = 'relative';
                });
                return;
            }

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

                // Morph container and crossfade layers
                morphContainerAndLayers(scrollProgress, currentStep, stepProgress);

                // Animate elements within current step
                animateStepElements(currentStep, stepProgress);
            }

            function morphContainerAndLayers(scrollProgress, currentStep, stepProgress) {
                const morphingContainer = document.getElementById('morphing-container');
                const layers = document.querySelectorAll('.content-layer');

                if (!morphingContainer) return;

                // Define container dimensions for each step
                const dimensions = [
                    { width: 768, height: 400 },  // Terminal (max-w-3xl equivalent)
                    { width: 896, height: 480 },  // Editor (max-w-4xl equivalent)
                    { width: 1024, height: 520 }  // Browser (max-w-5xl equivalent)
                ];

                // Calculate current and next step dimensions
                const currentDim = dimensions[currentStep];
                const nextDim = dimensions[Math.min(currentStep + 1, TOTAL_STEPS - 1)];

                // Interpolate dimensions based on step progress during transitions
                let targetWidth = currentDim.width;
                let targetHeight = currentDim.height;

                // Smooth transition in the last 30% of each step
                if (stepProgress > 0.7 && currentStep < TOTAL_STEPS - 1) {
                    const transitionProgress = (stepProgress - 0.7) / 0.3;
                    targetWidth = currentDim.width + (nextDim.width - currentDim.width) * transitionProgress;
                    targetHeight = currentDim.height + (nextDim.height - currentDim.height) * transitionProgress;
                }

                // Apply morphing to container
                morphingContainer.style.width = `${targetWidth}px`;
                morphingContainer.style.height = `${targetHeight}px`;

                // Crossfade layers
                layers.forEach((layer, layerIndex) => {
                    let layerOpacity = 0;

                    if (layerIndex === currentStep) {
                        // Current layer: fade out during transition
                        if (stepProgress > 0.7 && currentStep < TOTAL_STEPS - 1) {
                            layerOpacity = 1 - ((stepProgress - 0.7) / 0.3);
                        } else {
                            layerOpacity = 1;
                        }
                    } else if (layerIndex === currentStep + 1 && stepProgress > 0.7) {
                        // Next layer: fade in during transition
                        layerOpacity = (stepProgress - 0.7) / 0.3;
                    }

                    layer.style.opacity = layerOpacity;
                    layer.classList.toggle('visible', layerOpacity > 0);
                });
            }

            function animateStepElements(stepIndex, progress) {
                // Get elements from the current layer
                const layer = document.querySelector(`.content-layer[data-layer="${stepIndex}"]`);
                if (!layer) return;

                const elements = layer.querySelectorAll('.animate-element');

                // Step 1: Terminal
                if (stepIndex === 0) {
                    // Output lines
                    if (elements[0]) applyScrollEffect(elements[0], progress, 0.2, 0.4);
                    if (elements[1]) applyScrollEffect(elements[1], progress, 0.3, 0.5);
                    if (elements[2]) {
                        applyScrollEffect(elements[2], progress, 0.4, 0.6);
                        // Update progress bar fill based on scroll
                        const progressFill = layer.querySelector('.progress-fill');
                        const progressPercent = layer.querySelector('.progress-percent');
                        const barProgress = Math.round(mapRange(progress, 0.4, 0.8, 0, 100));
                        if (progressFill) progressFill.style.width = `${barProgress}%`;
                        if (progressPercent) progressPercent.textContent = `${barProgress}%`;
                    }
                    if (elements[3]) applyScrollEffect(elements[3], progress, 0.6, 0.8);
                }

                // Step 2: Code editor
                if (stepIndex === 1) {
                    // Code lines appear progressively
                    const codeLines = layer.querySelectorAll('.code-line');
                    codeLines.forEach((line, i) => {
                        const lineStart = 0.15 + (i * 0.06);
                        const lineEnd = lineStart + 0.1;
                        applyScrollEffect(line, progress, lineStart, lineEnd);
                    });
                }

                // Step 3: Browser
                if (stepIndex === 2) {
                    // Metric cards
                    const metricCards = layer.querySelectorAll('.metric-card');
                    metricCards.forEach((card, i) => {
                        const cardStart = 0.4 + (i * 0.15);
                        const cardEnd = cardStart + 0.15;
                        applyScrollEffect(card, progress, cardStart, cardEnd);
                    });
                }
            }

            // Throttled scroll handler using requestAnimationFrame
            let ticking = false;
            let scrollTimeout;

            function handleScroll() {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        updateAnimation();
                        ticking = false;
                    });
                    ticking = true;
                }

                // Detect when scrolling stops and snap to nearest slide
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    snapToNearestSlide();
                }, 150);
            }

            function snapToNearestSlide() {
                if (!container || !viewport) return;

                const rect = container.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                const scrollProgress = Math.max(0, Math.min(1,
                    -rect.top / (rect.height - viewportHeight)
                ));

                const rawStep = scrollProgress * TOTAL_STEPS;
                const currentStep = Math.floor(rawStep);
                const stepProgress = rawStep - currentStep;

                // If we're in the middle of a transition (between 0.7 and 1.0)
                if (stepProgress > 0.7 && stepProgress < 1.0 && currentStep < TOTAL_STEPS - 1) {
                    // Determine which slide is closer
                    const snapForward = stepProgress > 0.85;

                    // Calculate target scroll position
                    const targetStep = snapForward ? currentStep + 1 : currentStep;
                    const targetProgress = targetStep / TOTAL_STEPS;
                    const targetScrollTop = targetProgress * (rect.height - viewportHeight);
                    const currentScrollTop = -rect.top;
                    const scrollDelta = targetScrollTop - currentScrollTop;

                    // Smooth scroll to target
                    window.scrollBy({
                        top: scrollDelta,
                        behavior: 'smooth'
                    });
                }
            }

            window.addEventListener('scroll', handleScroll, { passive: true });

            // Initial call
            updateAnimation();
        })();
    </script>
</section>