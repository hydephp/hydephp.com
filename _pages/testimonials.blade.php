@extends('hyde::layouts.app')
@section('content')
@php($title = "Testimonials")

{{-- 
	Note for editors:

	To add a testimonial, first create the embed widget through Twitter's tool:
	https://publish.twitter.com/?dnt=1&hideConversation=on&theme=dark&widget=Tweet
	Enter the link to the Tweet, please opt out of tailoring twitter, and set the theme to dark to be consistent
	Then create a new file in the _data/testimonials/twitter directory, paste the embed code without the script tag, and save the file with the .md extension. 
	Hyde will automatically add the testimonial to the testimonials page when compiling the site. Thank you for contributing!
 --}}

<main class="mx-auto max-w-7xl py-16 px-8">
	<header>
		<h1 class="text-center text-3xl font-bold">Testimonials & Mentions</h1>
		<p class="text-center prose dark:prose-invert mx-auto mt-4">
			<strong>We are proud to hear that so many people use Hyde to build their websites.</strong><br>
			Here are some of our favourite mentions. 
			<small>Want your own testimonial here? Want to remove yours? This <a href="https://github.com/hydephp/hydephp.com/blob/master/_pages/testimonials.blade.php">page is open source</a>.</small>
		</p>
	</header>

	<section class="py-8 flex flex-row flex-wrap justify-center">
		@foreach(MarkdownCollection::get('testimonials/twitter') as $twitterTestimonial)
		<article class="prose dark:prose-invert m-4 twitterTestimonial">
			{!! $twitterTestimonial->body !!}
		</article>
		@endforeach
	</section>

	<footer class="prose dark:prose-invert mx-auto text-center">
		<small>
			We have instructed Twitter to not track you via the embeds.
			<a href="https://developer.twitter.com/en/docs/twitter-for-websites/privacy" rel="nofollow">See Twitter's Policy</a>
		</small>
	</footer>

	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<style>
		.twitterTestimonial {
			max-width: 500px;
		}
		.twitter-tweet.twitter-tweet-rendered {
			border-radius: 1rem;
			overflow: hidden;
		}
	</style>
</main>

@endsection
