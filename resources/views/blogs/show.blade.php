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
				<h5 class="text-secondary my-3">Author - {{ $blog->user->username }}</h5>
				<div class="text-secondary my-3">
					@auth
						<form action="/blogs/{{ $blog->slug }}/subscription" method="post">
							@csrf
							@if (auth()->user()->isSubscribed($blog))
								<button class="btn btn-sm btn-danger text-white">unSubscribe</button>
							@else
								<button class="btn btn-sm btn-warning text-white">Subscribe</button>
							@endif
						</form>
					@endauth
				</div>

				<p class="lh-md">
					{{ $blog->body }}
				</p>
			</div>
		</div>
	</div>
	{{-- @dd($blog->comments) --}}
	<x-comment-form :blog="$blog" />
	<x-comments :comments="$blog->comments()->latest()->paginate(3)" />

	<x-you-may-like :randomBlog="$randomBlog" />

</x-layout>
