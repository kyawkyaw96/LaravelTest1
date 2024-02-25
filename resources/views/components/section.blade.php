@props(['blogs'])
<section class="container text-center" id="blogs">
	<h1 class="display-5 fw-bold mb-4">Blogs</h1>
	<x-category-dropdown />
	<form method="GET" action="/" class="my-3">
		<div class="input-group mb-3">
			@if (request('category'))
				<input type="hidden" name="category" value="{{ request('category') }}" />
			@endif
			@if (request('username'))
				<input type="hidden" name="username" value="{{ request('username') }}" />
			@endif
			<input type="text" name="search" value="{{ request('search') }}" class="form-control"
				placeholder="Search Blogs..." />
			<button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
				Search
			</button>
		</div>
	</form>

	{{-- blog section --}}

	<div class="row">
		@if ($blogs->count())
			@foreach ($blogs as $blog)
				<x-blog-card :blog="$blog" />
			@endforeach
			{{ $blogs->onEachSide(1)->links() }}
		@else
			<p class="text-center">No Blogs found</p>
		@endif
	</div>
</section>
