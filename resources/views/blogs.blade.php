<x-layout>
	<x-slot name='title'>All Blogs</x-slot>

	@foreach ($blogs as $blog)
		<div class="{{ $loop->odd ? 'bg-yellow' : '' }}">
			<h1>
				<a href="blogs/{{ $blog->slug }}">
					{{ $blog->title }}
				</a>
			</h1>
			<p>
				<a href="categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
			</p>
			{{-- <p>Slug= {{ $blog->slug }}</p> --}}
			{{ $blog->intro }}
		</div>
	@endforeach
</x-layout>
