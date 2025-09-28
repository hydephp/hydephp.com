{{-- How It Works Section --}}
<section id="how-it-works" 
         class="relative w-full bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800"
         aria-labelledby="how-it-works-title"
         role="region"
         aria-roledescription="carousel">
  
  {{-- Background grid pattern --}}
  <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px] pointer-events-none"></div>
  
  {{-- Wrapper that provides scroll distance on desktop --}}
  <div id="hiw-wrapper" class="relative lg:min-h-[300svh] min-h-screen">
    
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

        {{-- Phone window container --}}
        <div class="mx-auto w-full max-w-[400px] lg:max-w-[420px]">
          <div class="relative">
            {{-- Glow effect --}}
            <div class="absolute -inset-4 rounded-[48px] bg-gradient-to-r
                        from-purple-600/30 via-pink-600/30 to-cyan-500/30 blur opacity-40"></div>
            
            {{-- Phone frame --}}
            <div class="relative rounded-[42px] border border-white/20 bg-black/40 backdrop-blur-xl
                        shadow-2xl overflow-hidden phone-frame">
              
              {{-- Notch --}}
              <div class="h-4 w-24 mx-auto mt-3 rounded-full bg-black/70 border border-white/10"></div>

              {{-- Track container (desktop pinned slider or mobile stack) --}}
              <div id="hiw-track"
                   class="relative mt-3 overflow-hidden
                          lg:flex lg:w-[300%] lg:h-[70vh] will-change-transform
                          mobile:space-y-0">

                {{-- PANEL 1: Install --}}
                <article class="hiw-panel lg:w-1/3 p-6 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 1 of 3: Install">
                  @include('sections.partials.hiw-terminal')
                </article>

                {{-- PANEL 2: Create --}}
                <article class="hiw-panel lg:w-1/3 p-6 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 2 of 3: Create Content">
                  @include('sections.partials.hiw-markdown')
                </article>

                {{-- PANEL 3: Ship --}}
                <article class="hiw-panel lg:w-1/3 p-6 h-full flex flex-col justify-center
                               opacity-0 translate-y-4 transition-all duration-700 ease-out"
                         aria-label="Step 3 of 3: Ship">
                  @include('sections.partials.hiw-browser')
                </article>
              </div>
            </div>
          </div>

          {{-- CTA row --}}
          <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
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

  /* Progress bar animation */
  @keyframes progress-fill {
    0% { width: 0%; }
    100% { width: 100%; }
  }
  .progress-bar {
    animation: progress-fill 2s ease-in-out 0.5s forwards;
  }
</style>

@push('scripts')
<script>
(function(){
  const wrapper = document.getElementById('hiw-wrapper');
  const track = document.getElementById('hiw-track');
  const mq = window.matchMedia('(min-width: 1024px)');
  let ticking = false, active = true;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  
  function onScroll(){
    if (!active || prefersReduced || !mq.matches) return;
    if (!ticking){
      window.requestAnimationFrame(() => {
        const rect = wrapper.getBoundingClientRect();
        const vh = window.innerHeight;
        const total = wrapper.offsetHeight - vh;
        const scrolled = Math.min(Math.max(-rect.top, 0), total);
        const progress = total > 0 ? (scrolled / total) : 0;
        
        // Smooth transform across three panels (-200% for three slides)
        const clampedProgress = Math.min(Math.max(progress, 0), 1);
        track.style.transform = `translate3d(${-clampedProgress * 200}%, 0, 0)`;
        
        // Add subtle glow to active panel based on progress
        const panels = document.querySelectorAll('.hiw-panel');
        let activeIndex = Math.floor(clampedProgress * 3);
        if (activeIndex >= 3) activeIndex = 2;
        
        panels.forEach((panel, index) => {
          if (index === activeIndex) {
            panel.style.filter = 'brightness(1.1)';
          } else {
            panel.style.filter = 'brightness(0.9)';
          }
        });
        
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
