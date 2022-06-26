@php
use Hyde\Framework\Services\CollectionService;
$pages = array_merge(
    CollectionService::getBladePageList(),
    CollectionService::getMarkdownPageList(),
);

// sort alphabetically
usort($pages, function($a, $b) {
    return strcmp($a, $b);
});

// unset 404
unset ($pages[array_search('404', $pages)]);

@endphp

<h2>Main Pages</h2>

<ul>
	@foreach($pages as $page)
	<li><a href="{{ $page }}">{{ Hyde::titleFromSlug($page) }}</a></li>
	@endforeach
</ul>


<h2>Documentation Pages</h2>

<ul>
	@foreach(CollectionService::getDocumentationPageList() as $page)
	<li><a href="{{ $page }}">{{ Hyde::titleFromSlug($page) }}</a></li>
	@endforeach
</ul>
