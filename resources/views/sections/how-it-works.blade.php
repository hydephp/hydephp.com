{{-- How It Works Section --}}
<section id="how-it-works" 
         class="relative w-full bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800"
         aria-labelledby="how-it-works-title"
         role="region"
         aria-roledescription="carousel">
  
  {{-- Background grid pattern --}}
  <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px] pointer-events-none"></div>
  
  {{-- Wrapper that provides scroll distance on desktop --}}
  <div id="hiw-wrapper" class="relative lg:min-h-[250svh] min-h-screen">
    
    {{-- Sticky viewport for desktop, normal flow for mobile --}}
    <div class="lg:sticky lg:top-0 lg:h-[100svh] flex items-center py-20 lg:py-0">
      <div class="container max-w-7xl mx-auto px-6 lg:px-8 w-full">
        
        {{-- Header --}}
        <header class="mb-8 lg:mb-12 text-center lg:text-left relative">
          <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                      bg-white/5 border border-white/10 backdrop-blur text-slate-200">
            ✨ How it works
          </div>
          <h2 id="how-it-works-title" class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-black text-white">
            <span class="block">From command to site</span>
            <span class="block bg-clip-text text-transparent text-hyde-ribbon">
              in minutes.
            </span>
          </h2>
          <p class="mt-4 max-w-2xl text-lg text-slate-300 lg:text-left mx-auto lg:mx-0">
            Three simple steps—install, write content, and ship a blazing-fast site.
          </p>
          
          {{-- Scroll hint for desktop --}}
          <div class="hidden lg:block absolute right-0 top-1/2 transform -translate-y-1/2">
            <div class="flex flex-col items-center text-slate-400 opacity-60">
              <span class="text-xs mb-2 transform rotate-90 whitespace-nowrap">Scroll to explore</span>
              <div class="w-px h-12 bg-gradient-to-b from-transparent via-slate-400 to-transparent animate-pulse"></div>
            </div>
          </div>
        </header>

        {{-- Widescreen window container --}}
        <div class="mx-auto w-full max-w-[400px] lg:max-w-[900px] xl:max-w-[1000px]">
          <div class="relative">
            {{-- Glow effect --}}
            <div class="absolute -inset-4 rounded-[48px] lg:rounded-[32px] bg-gradient-to-r
                        from-purple-600/30 via-pink-600/30 to-cyan-500/30 blur opacity-40"></div>
            
            {{-- Widescreen frame (phone on mobile, laptop-style on desktop) --}}
            <div class="relative rounded-[42px] lg:rounded-[24px] border border-white/20 bg-black/40 backdrop-blur-xl
                        shadow-2xl overflow-hidden phone-frame lg:aspect-[16/10]">
              
              {{-- Notch (mobile only) / Top bar (desktop) --}}
              <div class="h-4 w-24 mx-auto mt-3 rounded-full bg-black/70 border border-white/10 lg:hidden"></div>
              <div class="hidden lg:flex lg:items-center lg:px-6 lg:py-3 lg:bg-slate-800/50 lg:border-b lg:border-slate-700/50">
                <div class="flex space-x-2 mr-4">
                  <div class="w-3 h-3 rounded-full bg-red-500"></div>
                  <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                  <div class="w-3 h-3 rounded-full bg-green-500"></div>
                </div>
                <div class="text-sm text-slate-400">HydePHP Demo</div>
              </div>

              {{-- Track container (desktop pinned slider or mobile stack) --}}
              <div id="hiw-track"
                   class="relative mt-3 lg:mt-0 overflow-hidden
                          lg:flex lg:w-[300%] lg:h-[500px] xl:h-[550px] will-change-transform
                          mobile:space-y-0">

                {{-- PANEL 1: Install --}}
                <article class="hiw-panel w-full lg:w-1/3 lg:flex-shrink-0 p-6 lg:p-8 xl:p-12 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 1 of 3: Install">
                  @include('sections.partials.hiw-terminal')
                </article>

                {{-- PANEL 2: Create --}}
                <article class="hiw-panel w-full lg:w-1/3 lg:flex-shrink-0 p-6 lg:p-8 xl:p-12 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 2 of 3: Create Content">
                  @include('sections.partials.hiw-markdown')
                </article>

                {{-- PANEL 3: Ship --}}
                <article class="hiw-panel w-full lg:w-1/3 lg:flex-shrink-0 p-6 lg:p-8 xl:p-12 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 3 of 3: Ship">
                  @include('sections.partials.hiw-browser')
                </article>
              </div>
            </div>
          </div>

          {{-- Progress dots (desktop only) --}}
          <div class="hidden lg:flex justify-center mt-6 mb-4">
            <div class="flex space-x-2" id="progress-dots">
              <div class="w-2 h-2 rounded-full bg-white/30 dot-indicator transition-all duration-300" data-index="0"></div>
              <div class="w-2 h-2 rounded-full bg-white/30 dot-indicator transition-all duration-300" data-index="1"></div>
              <div class="w-2 h-2 rounded-full bg-white/30 dot-indicator transition-all duration-300" data-index="2"></div>
            </div>
          </div>

          {{-- CTA row --}}
          <div class="mt-6 lg:mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="docs/1.x/quickstart" class="group relative">
              <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
              <span class="relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-slate-900 border border-transparent rounded-lg group-hover:bg-slate-800 transition-colors">
                🚀 Get Started
              </span>
            </a>
            <a href="docs/1.x"
               class="inline-flex items-center font-semibold px-8 py-4 rounded-lg
                      text-slate-200 bg-white/5 border border-white/20 
                      hover:bg-white/10 backdrop-blur-sm
                      transition-all duration-200">
               📚 View Docs
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Styles for animations and mobile visibility --}}
<style>
  /* Visibility animation for mobile cards */
  .hiw-panel.is-visible {
    opacity: 1 !important;
    transform: translateY(0) !important;
  }

  /* Mobile stacking - hide lg transforms */
  @media (max-width: 1023px) {
    #hiw-track {
      display: block !important;
      width: 100% !important;
      transform: none !important;
      height: auto !important;
    }
    
    .hiw-panel {
      width: 100% !important;
      margin-bottom: 3rem;
      min-height: 400px;
      display: flex;
      align-items: center;
    }
    
    .hiw-panel:last-child {
      margin-bottom: 1rem;
    }
    
    /* Mobile phone frame adjustments */
    #hiw-wrapper {
      min-height: auto !important;
    }
    
    /* Keep mobile as phone-like, desktop as widescreen */
    .phone-frame {
      aspect-ratio: auto !important;
    }
  }

  /* Reduced motion preferences */
  @media (prefers-reduced-motion: reduce) {
    #hiw-track {
      transform: none !important;
    }
    
    .hiw-panel {
      opacity: 1 !important;
      transform: none !important;
      transition: none !important;
    }
    
    .cursor-blink {
      animation: none !important;
    }
    
    .progress-bar {
      animation: none !important;
      width: 100% !important;
    }
    
    .phone-frame {
      animation: none !important;
    }
  }

  /* Phone frame subtle animation */
  .phone-frame {
    animation: phone-glow 4s ease-in-out infinite alternate;
  }
  
  @keyframes phone-glow {
    0% { 
      box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.25),
        0 0 0 1px rgba(255, 255, 255, 0.05);
    }
    100% { 
      box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.25),
        0 0 0 1px rgba(255, 255, 255, 0.1),
        0 0 20px rgba(168, 85, 247, 0.15);
    }
  }
  
  /* Smooth scroll for mobile stack */
  @media (max-width: 1023px) {
    #hiw-track {
      scroll-behavior: smooth;
    }
  }

  /* Cursor blink animation */
  @keyframes cursor-blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0; }
  }
  .cursor-blink {
    animation: cursor-blink 1s infinite;
  }

  /* Progress bar now controlled by scroll - no animation needed */
</style>

@push('scripts')
<script>
(function(){
  const wrapper = document.getElementById('hiw-wrapper');
  const track = document.getElementById('hiw-track');
  const mq = window.matchMedia('(min-width: 1024px)');
  let ticking = false, active = true;
  let progressBarPhase = true; // New state to track if we're in progress bar control phase
  let progressBarValue = 0; // Track current progress bar progress
  const PROGRESS_BAR_THRESHOLD = 0.4; // 40% of first panel scroll controls progress bar

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function updateProgressBar(progress) {
    const progressBar = document.querySelector('.progress-bar');
    const percentageText = document.querySelector('.loading-percentage');
    const successMessage = document.querySelector('.success-message');

    if (progressBar && percentageText) {
      const percentage = Math.round(progress * 100);
      progressBar.style.width = `${percentage}%`;
      percentageText.textContent = `${percentage}%`;

      // Show success message when progress reaches 100%
      if (progress >= 1 && successMessage) {
        successMessage.style.opacity = '1';
        successMessage.style.transform = 'translateY(0)';
      }
    }
  }

  function updateMarkdownAnimations(slideProgress, activeIndex) {
    const markdownLines = [
      document.querySelector('.markdown-line-1'),
      document.querySelector('.markdown-line-2'),
      document.querySelector('.markdown-line-3'),
      document.querySelector('.markdown-line-4'),
      document.querySelector('.markdown-line-5'),
      document.querySelector('.markdown-line-6')
    ];

    if (activeIndex === 1) {
      // Calculate progress within the second slide (0-1)
      // Second slide now spans from 0.25 to 0.75 (50% of total scroll)
      let secondSlideProgress;
      if (slideProgress < 0.25) {
        secondSlideProgress = 0;
      } else if (slideProgress < 0.75) {
        // Map 0.25-0.75 range to 0-1
        secondSlideProgress = (slideProgress - 0.25) / 0.5;
      } else {
        secondSlideProgress = 1;
      }

      // Progressive animation thresholds for each line
      const thresholds = [0.1, 0.25, 0.4, 0.55, 0.7, 0.85];

      markdownLines.forEach((line, index) => {
        if (line) {
          if (secondSlideProgress >= thresholds[index]) {
            line.style.opacity = '1';
            line.style.transform = 'translateY(0)';
          } else {
            line.style.opacity = '0';
            line.style.transform = 'translateY(10px)';
          }
        }
      });
    } else if (activeIndex !== 1) {
      // Reset animations when not on second slide
      markdownLines.forEach(line => {
        if (line) {
          line.style.opacity = '0';
          line.style.transform = 'translateY(10px)';
        }
      });
    }
  }

  function onScroll(){
    if (!active || prefersReduced || !mq.matches) return;
    if (!ticking){
      window.requestAnimationFrame(() => {
        const rect = wrapper.getBoundingClientRect();
        const vh = window.innerHeight;
        const total = wrapper.offsetHeight - vh;
        const scrolled = Math.min(Math.max(-rect.top, 0), total);
        let progress = total > 0 ? (scrolled / total) : 0;

        // Ensure we never exceed 100% - this prevents the extra blank screen
        progress = Math.min(progress, 1);

        // If we're at or past 100%, force it to exactly 1
        if (progress >= 0.98) {
          progress = 1;
        }

        // NEW: Handle progress bar phase on first panel
        if (progressBarPhase && progress < PROGRESS_BAR_THRESHOLD) {
          // We're in the progress bar control phase
          const progressBarProgress = progress / PROGRESS_BAR_THRESHOLD;
          progressBarValue = progressBarProgress;
          updateProgressBar(progressBarProgress);

          // Stay on first panel
          track.style.transform = `translate3d(0%, 0, 0)`;

          // Update dots to show first panel active
          const dots = document.querySelectorAll('.dot-indicator');
          dots.forEach((dot, index) => {
            if (index === 0) {
              dot.className = 'w-2 h-2 rounded-full bg-white scale-125 dot-indicator transition-all duration-300';
            } else {
              dot.className = 'w-2 h-2 rounded-full bg-white/30 dot-indicator transition-all duration-300';
            }
          });

          // Panel highlighting - first panel bright
          const panels = document.querySelectorAll('.hiw-panel');
          panels.forEach((panel, index) => {
            if (index === 0) {
              panel.style.filter = 'brightness(1.1)';
            } else {
              panel.style.filter = 'brightness(0.9)';
            }
          });

          ticking = false;
          return;
        } else if (progressBarPhase && progress >= PROGRESS_BAR_THRESHOLD) {
          // Exit progress bar phase
          progressBarPhase = false;
          updateProgressBar(1); // Complete the progress bar
        }

        // Adjust progress for slide transitions (after progress bar phase)
        let slideProgress;
        if (progress < PROGRESS_BAR_THRESHOLD) {
          slideProgress = 0;
        } else {
          // Map remaining scroll distance to slide progression
          slideProgress = (progress - PROGRESS_BAR_THRESHOLD) / (1 - PROGRESS_BAR_THRESHOLD);
        }

        // Aggressive snap behavior to counteract macOS trackpad momentum
        if (slideProgress >= 0.2 && slideProgress <= 0.8) {
          // Create a very sticky zone for the middle panel
          const snapStart = 0.2;
          const snapEnd = 0.8;
          const snapRange = snapEnd - snapStart;
          const normalizedSnap = (slideProgress - snapStart) / snapRange;

          // Ultra-aggressive easing to create strong resistance against momentum scrolling
          const snapEased = Math.pow(normalizedSnap, 0.25); // Fourth root - much more aggressive
          slideProgress = snapStart + (snapEased * snapRange * 0.6); // Compress the range even more
        }

        // Correct transform mapping for 3 panels in 300% container:
        // Panel 1: 0% (shows first 100% of viewport)
        // Panel 2: -33.33% (shows second 100% of viewport)
        // Panel 3: -66.67% (shows third 100% of viewport)
        let translateX = slideProgress * -66.67;

        track.style.transform = `translate3d(${translateX}%, 0, 0)`;

        // Calculate active index with extended second slide duration
        let activeIndex;
        if (slideProgress < 0.25) {
          activeIndex = 0;
        } else if (slideProgress < 0.75) {
          activeIndex = 1;
        } else {
          activeIndex = 2;
        }

        // Panel highlighting
        const panels = document.querySelectorAll('.hiw-panel');

        panels.forEach((panel, index) => {
          if (index === activeIndex) {
            panel.style.filter = 'brightness(1.1)';
          } else {
            panel.style.filter = 'brightness(0.9)';
          }
        });

        // Update progress dots
        const dots = document.querySelectorAll('.dot-indicator');
        dots.forEach((dot, index) => {
          if (index === activeIndex) {
            dot.className = 'w-2 h-2 rounded-full bg-white scale-125 dot-indicator transition-all duration-300';
          } else {
            dot.className = 'w-2 h-2 rounded-full bg-white/30 dot-indicator transition-all duration-300';
          }
        });

        // Update second slide animations
        updateMarkdownAnimations(slideProgress, activeIndex);

        ticking = false;
      });
      ticking = true;
    }
  }
  
  function onResize(){
    // Reset transform when not in desktop pinned mode
    if (!mq.matches || prefersReduced){
      track.style.transform = 'none';
    } else {
      onScroll();
    }
  }
  
  // Event listeners
  window.addEventListener('scroll', onScroll, {passive: true});
  window.addEventListener('resize', onResize, {passive: true});
  onResize();

  // Intersection observer for fade-in animations
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      entry.target.classList.toggle('is-visible', entry.isIntersecting);
    });
  }, {
    root: null, 
    threshold: 0.25,
    rootMargin: '0px 0px -50px 0px'
  });
  
  // Observe all panels
  document.querySelectorAll('.hiw-panel').forEach(card => io.observe(card));
})();
</script>
@endpush
