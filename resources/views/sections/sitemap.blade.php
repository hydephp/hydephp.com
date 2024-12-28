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
	
		@php
			$docs = DocumentationPage::files();
			$categories = [];
			
			// Group pages by directory
			foreach($docs as $page) {
				$dir = dirname($page);
				if ($dir === '.') continue;
				
				$categories[$dir][] = $page;
			}
			
			// Sort categories alphabetically
			ksort($categories);
		@endphp

		<ul>
			@foreach($categories as $category => $pages)
				<li>
					<strong>{{ Hyde::makeTitle($category) }}</strong>
					<ul>
						@foreach($pages as $page)
							<li>
								<a href="{{ DocumentationPage::$outputDirectory.'/'.basename($page) }}">
									{{ Hyde::makeTitle(basename($page)) }}
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</section>
</div>
