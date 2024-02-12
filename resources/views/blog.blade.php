<x-layout>
	<x-slot name='title'>{{ $blog->title }}</x-slot>
	<article>
		<h1>
			{{ $blog->title }}
		</h1>
		<p style="color: red">slug = {{ $blog->slug }}</p>
		<p>Created at- {{ $blog->created_at->diffForHumans() }}</h4>
		<p>{{ $blog->body }}</p>
		<h4><a href="/">Go Back</a></h4>
	</article>
</x-layout>
