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
        {{-- Text content skeleton --}}
        <div class="space-y-2">
          <div class="h-3 bg-slate-300 rounded w-4/5"></div>
          <div class="h-3 bg-slate-300 rounded w-3/5"></div>
        </div>
        
        {{-- Visual blocks --}}
        <div class="flex space-x-4 mt-6">
          {{-- Dark content block --}}
          <div class="w-20 h-16 bg-slate-700 rounded-lg shadow-sm flex items-center justify-center">
            <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
            </svg>
          </div>
          
          {{-- Gradient block (Hyde colors) --}}
          <div class="w-20 h-16 bg-gradient-to-r from-purple-500 via-pink-500 to-cyan-400 rounded-lg shadow-sm"></div>
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
  /* Animation for browser content when visible */
  .hiw-panel .bg-gradient-to-r {
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.6s ease-out;
  }
  
  .hiw-panel.is-visible .bg-gradient-to-r {
    animation: scale-in 0.6s ease-out 1.2s forwards;
  }
  
  @keyframes scale-in {
    0% { 
      opacity: 0; 
      transform: scale(0.8); 
    }
    100% { 
      opacity: 1; 
      transform: scale(1); 
    }
  }
  
  /* Build command typing effect */
  .hiw-panel.is-visible .build-command {
    animation: type-command 1s ease-out 0.3s forwards;
  }
  
  @keyframes type-command {
    0% { 
      width: 0;
      overflow: hidden;
    }
    100% { 
      width: auto;
      overflow: visible;
    }
  }
  
  /* Success checkmark animation */
  .hiw-panel.is-visible .build-success {
    animation: fade-in 0.4s ease-out 1s forwards;
  }
  
  @keyframes fade-in {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }
</style>
