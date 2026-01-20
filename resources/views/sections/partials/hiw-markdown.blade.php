{{-- Markdown Infographic: Create Content Step --}}
<div class="relative h-full flex flex-col">
  {{-- Step indicator --}}
  <div class="flex items-center justify-between mb-4">
    <h3 class="text-xl font-bold text-white">Create Content</h3>
    <div class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium
                bg-purple-500/20 text-purple-300 border border-purple-500/30">
      Markdown or Blade
    </div>
  </div>

  {{-- Document window --}}
  <div class="flex-1 bg-white/95 rounded-xl border border-slate-300 overflow-hidden shadow-lg">
    {{-- Document header --}}
    <div class="flex items-center px-4 py-3 bg-slate-50 border-b border-slate-200">
      <div class="flex items-center space-x-2">
        {{-- Page icon --}}
        <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
        </svg>
        <span class="text-sm font-medium text-slate-700">hello-world.md</span>
      </div>
      
      {{-- Front matter chip --}}
      <div class="ml-auto">
        <div class="inline-flex items-center px-2 py-1 rounded text-xs font-mono
                    bg-yellow-100 text-yellow-800 border border-yellow-200">
          --- title: Hello World ---
        </div>
      </div>
    </div>

    {{-- Document content --}}
    <div class="p-4 font-mono text-sm">
      {{-- Markdown content --}}
      <div class="space-y-3">
        <div class="text-slate-800 markdown-line-1">
          <span class="text-blue-600 font-bold"># Hello World</span>
        </div>
        <div class="text-slate-600 markdown-line-2">
          This page was built with <strong class="text-purple-600">**HydePHP**</strong>.
        </div>
        <div class="text-slate-600 markdown-line-3">
          It takes just <em class="text-green-600">*minutes*</em> to get started.
        </div>
        <div class="text-slate-600 markdown-line-4">
          Write content, not code.
        </div>

        {{-- Code block that appears --}}
        <div class="mt-4 markdown-line-5">
          <div class="bg-slate-100 border border-slate-200 rounded p-3">
            <div class="text-xs text-slate-500 mb-2">```bash</div>
            <div class="text-slate-700">php hyde build</div>
            <div class="text-xs text-slate-500">```</div>
          </div>
        </div>

        {{-- Final line --}}
        <div class="text-slate-600 markdown-line-6">
          <strong class="text-orange-600">Ready to ship!</strong> 🚀
        </div>
      </div>
    </div>

    {{-- Document footer hint --}}
    <div class="px-4 py-2 bg-slate-50 border-t border-slate-200">
      <div class="flex items-center text-xs text-slate-500">
        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        Markdown • Front Matter • Laravel Blade
      </div>
    </div>
  </div>

  {{-- Supporting text --}}
  <p class="mt-4 text-center text-sm text-slate-400">
    Write in Markdown. Sprinkle Front Matter for control.
  </p>
</div>

<style>
  /* Text animations now controlled by scroll */
  .hiw-panel .markdown-line-1,
  .hiw-panel .markdown-line-2,
  .hiw-panel .markdown-line-3,
  .hiw-panel .markdown-line-4,
  .hiw-panel .markdown-line-5,
  .hiw-panel .markdown-line-6 {
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease-out;
  }
</style>
