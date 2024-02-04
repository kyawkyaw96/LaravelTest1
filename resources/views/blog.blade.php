<x-layout>
	<x-slot name='title'>{{ $blog->title }}</x-slot>
	<article>
		<h1>
			{{ $blog->title }}
		</h1>
		<p>Created at- {{ $blog->date }}</h4>
		<p>{{ $blog->body }}</p>
		<h4><a href="/">Go Back</a></h4>
	</article>
</x-layout>
