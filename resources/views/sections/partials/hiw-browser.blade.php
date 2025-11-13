{{-- Browser Infographic: Ship Step --}}
<div class="relative h-full flex flex-col">
  {{-- Step indicator --}}
  <div class="flex items-center justify-between mb-4">
    <h3 class="text-xl font-bold text-white">Ship</h3>
    <div class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium
                bg-green-500/20 text-green-300 border border-green-500/30">
      Static & fast
    </div>
  </div>

  {{-- Build command --}}
  <div class="mb-4 bg-black/60 rounded-lg border border-slate-600/50 backdrop-blur-sm p-3">
    <div class="flex items-center text-sm font-mono">
      <span class="text-green-400 mr-2">$</span>
      <span class="text-slate-200 build-command">php hyde build</span>
      <div class="ml-auto flex items-center text-xs text-green-400 build-success opacity-0">
        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        Built
      </div>
    </div>
  </div>

  {{-- Browser window --}}
  <div class="flex-1 bg-white/95 rounded-xl border border-slate-300 overflow-hidden shadow-lg">
    {{-- Browser header --}}
    <div class="flex items-center px-4 py-3 bg-slate-100 border-b border-slate-200">
      <div class="flex space-x-2 mr-4">
        <div class="w-3 h-3 rounded-full bg-red-500"></div>
        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
        <div class="w-3 h-3 rounded-full bg-green-500"></div>
      </div>
      
      {{-- URL bar --}}
      <div class="flex-1 bg-white rounded-md px-3 py-1 text-sm text-slate-600 border border-slate-300">
        myhydesite.com
      </div>
      
      {{-- Navigation --}}
      <div class="ml-4 flex space-x-3 text-xs text-slate-500">
        <span class="hover:text-slate-700 cursor-pointer">Home</span>
        <span class="hover:text-slate-700 cursor-pointer">About</span>
      </div>
    </div>

    {{-- Browser content --}}
    <div class="p-6 bg-gradient-to-br from-slate-50 to-white">
      {{-- Site header --}}
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800 mb-1">My Hyde Site</h1>
        <div class="flex items-center text-sm text-slate-500">
          <span>→</span>
          <span class="ml-2 font-medium text-slate-700">Hello World</span>
        </div>
      </div>

      {{-- Content blocks --}}
      <div class="space-y-4">
        {{-- Real content that appears progressively --}}
        <div class="browser-content-1">
          <p class="text-slate-700 text-sm leading-relaxed">
            This page was built with <strong class="text-purple-600">HydePHP</strong>.
          </p>
        </div>

        <div class="browser-content-2">
          <p class="text-slate-600 text-sm">
            It takes just <em class="text-green-600 font-medium">minutes</em> to get started.
          </p>
        </div>

        <div class="browser-content-3">
          <div class="bg-slate-100 border border-slate-200 rounded-lg p-3 text-xs font-mono">
            <div class="text-slate-500 mb-1">Build command:</div>
            <div class="text-slate-700">$ php hyde build</div>
          </div>
        </div>

        <div class="browser-content-4">
          <div class="flex items-center space-x-2 text-sm">
            <div class="flex items-center text-green-600">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              Build complete
            </div>
            <span class="text-slate-400">•</span>
            <span class="text-slate-600">Ready to ship!</span>
          </div>
        </div>

        {{-- Performance metrics --}}
        <div class="browser-content-5">
          <div class="bg-gradient-to-r from-green-50 to-blue-50 border border-green-200 rounded-lg p-3">
            <div class="text-xs font-semibold text-green-800 mb-2">Performance</div>
            <div class="grid grid-cols-3 gap-2 text-xs">
              <div class="text-center">
                <div class="font-bold text-green-600">100</div>
                <div class="text-slate-600">Speed</div>
              </div>
              <div class="text-center">
                <div class="font-bold text-blue-600">0ms</div>
                <div class="text-slate-600">Build</div>
              </div>
              <div class="text-center">
                <div class="font-bold text-purple-600">0kb</div>
                <div class="text-slate-600">Runtime</div>
              </div>
            </div>
          </div>
        </div>

        {{-- Deploy options --}}
        <div class="browser-content-6">
          <div class="text-xs text-slate-600 mb-2">Deploy anywhere:</div>
          <div class="flex space-x-2">
            <span class="px-2 py-1 bg-slate-800 text-white text-xs rounded">Netlify</span>
            <span class="px-2 py-1 bg-orange-500 text-white text-xs rounded">Vercel</span>
            <span class="px-2 py-1 bg-gray-600 text-white text-xs rounded">GitHub</span>
          </div>
        </div>
      </div>
    </div>

    {{-- Browser footer --}}
    <div class="px-4 py-2 bg-slate-50 border-t border-slate-200">
      <div class="flex items-center justify-between text-xs text-slate-500">
        <span>✓ Static HTML • Fast loading</span>
        <div class="flex items-center space-x-1">
          <div class="w-2 h-2 bg-green-500 rounded-full"></div>
          <span>Live</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Supporting text --}}
  <p class="mt-4 text-center text-sm text-slate-400">
    Instant pages. Laravel power, Markdown simplicity.
  </p>
</div>

<style>
  /* Browser content animations now controlled by scroll */
  .hiw-panel .browser-content-1,
  .hiw-panel .browser-content-2,
  .hiw-panel .browser-content-3,
  .hiw-panel .browser-content-4,
  .hiw-panel .browser-content-5,
  .hiw-panel .browser-content-6,
  .hiw-panel .build-success {
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease-out;
  }
</style>
