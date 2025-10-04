{{-- Terminal Infographic: Install Step --}}
<div class="relative h-full flex flex-col">
  {{-- Step indicator --}}
  <div class="flex items-center justify-between mb-4">
    <h3 class="text-xl font-bold text-white">Install</h3>
    <div class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium
                bg-orange-500/20 text-orange-300 border border-orange-500/30">
      Composer
    </div>
  </div>

  {{-- Terminal window --}}
  <div class="flex-1 bg-black/60 rounded-xl border border-slate-700/50 backdrop-blur-sm overflow-hidden">
    {{-- Terminal header --}}
    <div class="flex items-center px-4 py-3 bg-slate-800/50 border-b border-slate-700/50">
      <div class="flex space-x-2">
        <div class="w-3 h-3 rounded-full bg-red-500"></div>
        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
        <div class="w-3 h-3 rounded-full bg-green-500"></div>
      </div>
      <div class="flex-1 text-center">
        <div class="text-xs text-slate-400 font-mono">Terminal</div>
      </div>
    </div>

    {{-- Terminal content --}}
    <div class="p-4 font-mono text-sm">
      {{-- Command line --}}
      <div class="flex items-center text-green-400 mb-3">
        <span class="text-slate-400 mr-2">$</span>
        <span class="text-slate-200">composer create-project hyde/hyde</span>
        <span class="cursor-blink ml-1 text-cyan-400">|</span>
      </div>

      {{-- Progress indicator --}}
      <div class="mb-3">
        <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
          <span>Installing dependencies...</span>
          <span class="loading-percentage">0%</span>
        </div>
        <div class="w-full bg-slate-700/50 rounded-full h-1.5">
          <div class="progress-bar h-1.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full w-0"></div>
        </div>
      </div>

      {{-- Success message --}}
      <div class="flex items-center text-green-400 text-sm opacity-0 success-message">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        Project ready. Let's build.
      </div>
    </div>
  </div>

  {{-- Supporting text --}}
  <p class="mt-4 text-center text-sm text-slate-400">
    Zero config. One command.
  </p>
</div>

<style>
  /* Progress animation */
  @keyframes progress-fill {
    0% { width: 0%; }
    100% { width: 100%; }
  }
  
  @keyframes fade-in-success {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  
  /* Progress bar controlled by scroll, no auto-animation */
  
  .hiw-panel.is-visible .success-message {
    animation: fade-in-success 0.5s ease-out 2.5s forwards;
  }
  
  /* Percentage counter */
  .hiw-panel.is-visible .loading-percentage {
    animation: count-text 2s ease-in-out 0.8s forwards;
  }
  
  @keyframes count-text {
    0% { 
      opacity: 0.7;
    }
    50% { 
      opacity: 1;
    }
    100% { 
      opacity: 0.7;
    }
  }
</style>
