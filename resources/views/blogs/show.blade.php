<x-layout>
	{{-- <x-slot name='title'>{{ $blog->title }}</x-slot>
	<article>
		<h3>
			{{ $blog->title }}
		</h3>
		<p style="color: red">slug = {{ $blog->slug }}</p>
		<p>Created at- {{ $blog->created_at->diffForHumans() }}</h4>
		<p>{{ $blog->body }}</p>
		<h4><a href="/">Go Back</a></h4>
	</article> --}}
	@props(['blog'])
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto text-center">
				<img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
					class="card-img-top" alt="..." />
				<h3 class="my-3">{{ $blog->title }}</h3>
				<p class="lh-md">
					{{ $blog->body }}
				</p>
			</div>
		</div>
	</div>

	<x-subscribe />

	<x-you-may-like :randomBlog="$randomBlog" />

</x-layout>
