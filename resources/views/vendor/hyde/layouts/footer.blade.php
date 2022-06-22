<footer aria-label="Page footer" class="flex py-4 px-6 w-full text-center mt-auto bg-offset relative">
	<div class="prose dark:prose-invert text-center mx-auto prose-p:mb-2 dark:prose-a:text-indigo-400">
		{!! Hyde\Framework\Actions\ConvertsFooterMarkdown::execute() !!}
		@include('components.footer-links')
		@stack('footer')
	</div>
	<a href="#app" aria-label="Go to top of page" class="float-right bottom-4 right-4 absolute">
		<button title="Scroll to top">
			<svg role="presentation" class="fill-current text-gray-500 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
				<path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
			</svg>
		</button>
	</a>
</footer>
