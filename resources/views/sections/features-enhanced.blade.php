<style>
  .flip-card {
    perspective: 1000px;
    min-height: 220px;
  }

  .flip-card-inner {
    position: relative;
    width: 100%;
    min-height: 220px;
    transition: transform 0.6s;
    transform-style: preserve-3d;
  }

  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }

  .flip-card-front,
  .flip-card-back {
    position: absolute;
    width: 100%;
    min-height: 220px;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border-radius: 1rem;
    inset: 0;
  }

  .flip-card-back {
    transform: rotateY(180deg);
  }
</style>

<!-- Features Section (dark, hero-matched) -->
<section id="features" class="relative w-full py-16 sm:py-20 lg:py-24 overflow-hidden
  bg-gradient-to-br from-[#0B1220] via-[#141A2A] to-[#1B1230]">
  <!-- subtle star/circuit specks -->
  <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.06)_1px,transparent_1px)]
              [background-size:28px_28px] opacity-20"></div>

  <div class="container relative z-10 max-w-7xl px-4 sm:px-8 mx-auto">
    <!-- Section Header -->
    <div class="text-center mb-14 sm:mb-16">
      <div class="inline-flex items-center px-3 py-1.5 mb-5 text-xs font-medium
                  text-cyan-200/90 bg-cyan-400/10 border border-cyan-300/20 rounded-full
                  backdrop-blur-sm">
        <span class="mr-2">✨</span> Features & Benefits
      </div>

      <h2 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-100 mb-4">
        Why Choose
        <span class="bg-clip-text text-transparent
                     bg-gradient-to-r from-[#B1368F] via-[#D94E6B] to-[#F15A4A]">
          HydePHP?
        </span>
      </h2>

      <p class="text-base sm:text-lg text-slate-300/90 max-w-3xl mx-auto leading-relaxed">
        Hyde is packed with quality features. Here are the highlights that make it a great choice for your next project.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
      <!-- Left Column - Feature Cards -->
      <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

        <!-- Card 1: Easy Content Creation -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <!-- Front -->
            <article class="flip-card-front rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 space-y-2.5">
              <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl grid place-items-center text-white
                            bg-gradient-to-br from-[#7C3AED] to-[#06B6D4]">
                  <!-- icon -->
                  <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold tracking-tight text-slate-100">Easy Content Creation</h3>
              </div>

              <div class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium
                          text-purple-200 bg-purple-400/10 border border-purple-300/20">
                Markdown, Blade, both? It's up to you.
              </div>

              <div class="text-[15px] leading-relaxed text-slate-300 max-w-[38ch]">
                <p>Create content with Markdown and let Hyde do the heavy lifting. Sprinkle in some Front Matter for extra credit.</p>
              </div>
            </article>

            <!-- Back -->
            <article class="flip-card-back rounded-2xl border border-white/10 bg-gradient-to-br from-[#1a1f35] to-[#0f1219] backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 flex flex-col justify-center">
              <div class="text-xs text-slate-400 mb-2 font-mono">Front Matter Example</div>
              <pre class="text-xs leading-relaxed font-mono overflow-auto"><code><span class="text-slate-400">---</span>
<span class="text-cyan-400">title</span><span class="text-slate-400">:</span> <span class="text-emerald-300">My Blog Post</span>
<span class="text-cyan-400">category</span><span class="text-slate-400">:</span> <span class="text-emerald-300">tutorials</span>
<span class="text-cyan-400">author</span><span class="text-slate-400">:</span> <span class="text-emerald-300">Jane Doe</span>
<span class="text-slate-400">---</span>

<span class="text-purple-400"># Write in Markdown</span>
<span class="text-slate-300">Hyde transforms it to HTML!</span></code></pre>
            </article>
          </div>
        </div>

        <!-- Card 2: Built-in Frontend -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <!-- Front -->
            <article class="flip-card-front rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 space-y-2.5">
              <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl grid place-items-center text-white
                            bg-gradient-to-br from-[#2563EB] to-[#38BDF8]">
                  <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold tracking-tight text-slate-100">Built-in Frontend</h3>
              </div>

              <div class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium
                          text-cyan-200 bg-cyan-400/10 border border-cyan-300/20">
                Batteries (and more) Included
              </div>

              <div class="text-[15px] leading-relaxed text-slate-300 max-w-[38ch]">
                Hyde ships with a full-featured Tailwind frontend and customizable Blade templates.
              </div>
            </article>

            <!-- Back -->
            <article class="flip-card-back rounded-2xl border border-white/10 bg-gradient-to-br from-[#1a2235] to-[#0f1219] backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 flex flex-col justify-center">
              <div class="text-xs text-slate-400 mb-2 font-mono">Tailwind CSS Example</div>
              <pre class="text-xs leading-relaxed font-mono overflow-auto"><code><span class="text-slate-400">&lt;</span><span class="text-pink-400">div</span> <span class="text-cyan-400">class</span><span class="text-slate-400">=</span><span class="text-emerald-300">"bg-gradient-to-r
     from-purple-500
     to-pink-500
     rounded-lg p-6"</span><span class="text-slate-400">&gt;</span>
  <span class="text-slate-300">Beautiful by default</span>
<span class="text-slate-400">&lt;/</span><span class="text-pink-400">div</span><span class="text-slate-400">&gt;</span></code></pre>
            </article>
          </div>
        </div>

        <!-- Card 3: The Power of Laravel -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <!-- Front -->
            <article class="flip-card-front rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 space-y-2.5">
              <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl grid place-items-center text-white
                            bg-gradient-to-br from-[#FF2D20] to-[#F15A4A]">
                  <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 10V3L4 14h7v7l9-11h-7z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold tracking-tight text-slate-100">The Power of Laravel</h3>
              </div>

              <div class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium
                          text-rose-200 bg-rose-400/10 border border-rose-300/20">
                Artisan CLI • Blade • Ecosystem
              </div>

              <div class="text-[15px] leading-relaxed text-slate-300 max-w-[38ch]">
                Laravel developers feel at home with an Artisan-based CLI and Blade templating.
              </div>
            </article>

            <!-- Back -->
            <article class="flip-card-back rounded-2xl border border-white/10 bg-gradient-to-br from-[#2a1818] to-[#0f1219] backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 flex flex-col justify-center">
              <div class="text-xs text-slate-400 mb-2 font-mono">Artisan Commands</div>
              <pre class="text-xs leading-relaxed font-mono overflow-auto"><code><span class="text-purple-400">php</span> <span class="text-cyan-400">hyde</span> <span class="text-slate-300">make:post</span> <span class="text-emerald-300">"My Post"</span>
<span class="text-purple-400">php</span> <span class="text-cyan-400">hyde</span> <span class="text-slate-300">build</span>
<span class="text-purple-400">php</span> <span class="text-cyan-400">hyde</span> <span class="text-slate-300">serve</span></code></pre>
            </article>
          </div>
        </div>

        <!-- Card 4: Customizable to the Core -->
        <div class="flip-card">
          <div class="flip-card-inner">
            <!-- Front -->
            <article class="flip-card-front rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 space-y-2.5">
              <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl grid place-items-center text-white
                            bg-gradient-to-br from-emerald-500 to-emerald-400">
                  <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold tracking-tight text-slate-100">Customizable to the Core</h3>
              </div>

              <div class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium
                          text-emerald-200 bg-emerald-400/10 border border-emerald-300/20">
                Convention over configuration
              </div>

              <div class="text-[15px] leading-relaxed text-slate-300 max-w-[38ch]">
                Hyde is pre-configured for most use cases—override anything when you need to.
              </div>
            </article>

            <!-- Back -->
            <article class="flip-card-back rounded-2xl border border-white/10 bg-gradient-to-br from-[#1a2a1f] to-[#0f1219] backdrop-blur-sm
                            shadow-[0_10px_30px_rgba(0,0,0,.35)] p-5 flex flex-col justify-center">
              <div class="text-xs text-slate-400 mb-2 font-mono">Config Example</div>
              <pre class="text-xs leading-relaxed font-mono overflow-auto"><code><span class="text-slate-400">// config/hyde.php</span>
<span class="text-purple-400">return</span> <span class="text-slate-300">[</span>
  <span class="text-emerald-300">'name'</span> <span class="text-slate-400">=&gt;</span> <span class="text-emerald-300">'My Site'</span><span class="text-slate-300">,</span>
  <span class="text-emerald-300">'url'</span> <span class="text-slate-400">=&gt;</span> <span class="text-emerald-300">'example.com'</span><span class="text-slate-300">,</span>
  <span class="text-emerald-300">'generate_sitemap'</span> <span class="text-slate-400">=&gt;</span> <span class="text-cyan-400">true</span><span class="text-slate-300">,</span>
<span class="text-slate-300">];</span></code></pre>
            </article>
          </div>
        </div>
      </div>

      <!-- Right Column - Stats Card -->
      @php($stats = \App\Support\HydeStats::fetch())
      <div class="lg:col-span-1 flex items-center justify-center">
        <div class="relative group w-full max-w-md">
          {{-- gradient bezel --}}
          <div class="absolute -inset-[1px] rounded-[20px]
                      bg-gradient-to-r from-purple-500/50 via-pink-500/40 to-cyan-400/40 opacity-70"></div>

          <div class="relative rounded-2xl bg-white/5 backdrop-blur-sm
                      border border-white/10 shadow-[0_18px_60px_rgba(0,0,0,.55)] p-5 sm:p-6">
            <div class="pointer-events-none absolute inset-0 rounded-2xl
                        shadow-[inset_0_1px_0_rgba(255,255,255,.06)]"></div>

            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-semibold text-slate-100">Hyde by the Numbers</h3>
              {{-- <span class="text-[11px] text-slate-400">Updated {{ \Carbon\Carbon::parse($stats['fetched_at'])->diffForHumans() }}</span> --}}
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
              {{-- Stars --}}
              <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                <div class="text-[11px] uppercase tracking-wide text-slate-400">GitHub Stars</div>
                <div class="mt-1 text-2xl font-semibold text-slate-100">
                  {{ \App\Support\HydeStats::short($stats['stars']) }}
                </div>
              </div>

              {{-- Packagist installs --}}
              <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                <div class="text-[11px] uppercase tracking-wide text-slate-400">Packagist Installs</div>
                <div class="mt-1 text-2xl font-semibold text-slate-100">
                  {{ \App\Support\HydeStats::short($stats['packagist_installs']) }}
                </div>
              </div>

              {{-- Total views --}}
              <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                <div class="text-[11px] uppercase tracking-wide text-slate-400">GitHub Views</div>
                <div class="mt-1 text-2xl font-semibold text-slate-100">
                  {{ \App\Support\HydeStats::short($stats['github_views']) }}
                </div>
              </div>

              {{-- Total clones --}}
              <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                <div class="text-[11px] uppercase tracking-wide text-slate-400">GitHub Clones</div>
                <div class="mt-1 text-2xl font-semibold text-slate-100">
                  {{ \App\Support\HydeStats::short($stats['github_clones']) }}
                </div>
              </div>
            </div>

            {{-- Footer chips --}}
            <div class="mt-4 flex flex-wrap gap-2 text-[11px]">
              <span class="px-2.5 py-1 rounded-full bg-purple-500/10 text-purple-200 border border-purple-300/20">Open Source</span>
              <span class="px-2.5 py-1 rounded-full bg-cyan-500/10 text-cyan-200 border border-cyan-300/20">Laravel Powered</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Wave transition -->
  <svg class="absolute bottom-0 w-full fill-white/0" viewBox="0 0 1400 74"
       xmlns="http://www.w3.org/2000/svg" style="margin-bottom:-1px;">
    <path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z"/>
  </svg>
</section>