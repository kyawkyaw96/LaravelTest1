{{-- <x-layout>
	<x-slot name='title'>All Blogs</x-slot>
	@foreach ($blogs as $blog)
		<div class="{{ $loop->odd ? 'bg-yellow my-10' : ' my-10' }}">
			<h3>
				<a href="blogs/{{ $blog->slug }}">
					{{ $blog->title }}
				</a>
				<div>
					Author - <a href="/users/{{ $blog->user->username }}"> {{ $blog->user->name }}</a>
				</div>
			</h3>
			<p>
			<p> Created_at = {{ $blog->created_at->diffForHumans() }}</p>
			<a href="categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
			</p>
			{{ $blog->intro }}
		</div>
	@endforeach
</x-layout> --}}

<x-layout>
	<!-- hero section -->
	<x-hero />
	<!-- blogs section -->
	<x-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />
	<!-- subscribe new blogs -->
	<x-subscribe />

	<!-- footer -->

</x-layout>
