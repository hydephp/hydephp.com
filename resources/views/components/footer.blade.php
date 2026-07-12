<footer class="border-t border-[rgba(164,156,186,.16)] py-[34px] text-[.85rem] text-[#a49cba]">
  <div class="mx-auto flex max-w-[1160px] flex-wrap items-center gap-6 px-7">
    <span>Site proudly built with HydePHP 🎩</span>
    <div class="ml-auto flex gap-5">
      <a class="text-[#a49cba] no-underline hover:text-white" href="https://github.com/hydephp/hyde">GitHub</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="https://discord.hydephp.com">Discord</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="{{ Hyde::url('feed.xml') }}">RSS</a>
      <a class="text-[#a49cba] no-underline hover:text-white" href="{{ \Hyde\Foundation\Facades\Routes::get('license') ?? '/license' }}">Legal</a>
    </div>
  </div>
</footer>
