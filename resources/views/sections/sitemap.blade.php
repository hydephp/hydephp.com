@php
$pages= array_merge(
    BladePage::files(),
    MarkdownPage::files(),
);

// sort alphabetically
usort($pages, function($a, $b) {
    return strcmp($a, $b);
});

// unset 404
unset ($pages[array_search('404', $pages)]);

@endphp

<div class="flex flex-wrap">
	<section class="pr-20 lg:pr-32">
		<h2>Main Pages</h2>
	
		<ul>
			@foreach($pages as $page)
			<li><a href="{{ $page }}">{{ Hyde::makeTitle($page) }}</a></li>
			@endforeach
		</ul>
	</section>
	
	
	<section class="pr-20 lg:pr-32">
		<h2>Documentation Pages</h2>
	
		<ul>
			@foreach(DocumentationPage::files() as $page)
			<li><a href="{{ $page }}">{{ Hyde::makeTitle($page) }}</a></li>
			@endforeach
		</ul>
	</section>
</div>
