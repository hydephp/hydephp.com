<section id="posts" class="mx-auto max-w-7xl py-16 px-8 lg:mt-8">
	<header class="lg:mb-12 xl:mb-16">
		<h2 class="text-3xl text-left opacity-75 dark:opacity-90 leading-10 tracking-tight font-extrabold sm:leading-none mb-8 md:text-4xl md:text-center lg:text-5xl">
		Latest Posts
	</h2>
	<p class="text-center text-lg mx-auto">
		Here are the latest posts from the Hyde Blog! Fully made with Hyde, of course!
	</p>
</header>
<div class="max-w-xl mx-auto">
	@foreach(\Hyde\Framework\Models\MarkdownPost::getLatestPosts() as $post)
	@include('hyde::components.article-excerpt')
	@endforeach
</div>
</section>