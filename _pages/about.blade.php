@extends('hyde::layouts.app')
@section('content')
@php($title = 'About HydePHP')
<style>
	mark {
		background: linear-gradient(-100deg, #fece2f2f, #fddf47a4 95%, #fece2f27);
		border-radius: 1em 0;
		padding: 0.125rem 0.5rem;
	}
	.dark mark {
		background: linear-gradient(-100deg, #fece2fbe, #fddf47a4 95%, #fece2fbd);
	}
	/* Gradients by https://uigradients.com/ */
	.dark .app-gradient {
		/* Royal */
		background: #141E30; /* fallback for old browsers */
		background: -webkit-linear-gradient(to left bottom, #243B55, #141E30); /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to left bottom, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	#main-navigation {
		z-index: 10;
	}
</style>

@include('sections.features')

<section id="features">
@include('sections.interactive')
</section>


<style> html, body { scroll-behavior: smooth; } </style>
@push('footer')
<div>
	<small>
		About page components from <a href="https://devdojo.com/tails" rel="noopener noreferrer nofollow">Tails</a>
		with illustrations by <a href="https://icons8.com/illustrations" rel="noopener noreferrer nofollow">Ouch!</a>.
		See full list of attributions on the <a href="legal">legal page</a>.
	</small>
</div>
@endpush
@endsection
