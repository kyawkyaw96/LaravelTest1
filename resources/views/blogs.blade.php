<x-layout>
	<x-slot name='title'>All Blogs</x-slot>

	@foreach ($blogs as $blog)
		<div class="{{ $loop->odd ? 'bg-yellow' : '' }}">
			<h1>
				<a href="blogs/{{ $blog->slug }}">
					{{ $blog->title }}
				</a>
			</h1>
			{{ $blog->intro }}
		</div>
	@endforeach
</x-layout>
