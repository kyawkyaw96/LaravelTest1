@props(['blogs', 'categories', 'currentCategory'])
<section class="container text-center" id="blogs">
	<h1 class="display-5 fw-bold mb-4">Blogs</h1>
	<div class="">
		<div class="dropdown">
			<button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
				{{ isset($currentCategory) ? $currentCategory->name : 'Filter by category' }}
			</button>
			<ul class="dropdown-menu">
				@foreach ($categories as $category)
					<li><a class="dropdown-item" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
		</div>
		{{-- <select name="" id="" class="rounded-pill mx-3 p-1">
			<option value="">Filter by Tag</option>
		</select> --}}
	</div>
	<form action="" class="my-3">
		<div class="input-group mb-3">
			<input type="text" autocomplete="false" class="form-control" placeholder="Search Blogs..." />
			<button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
				Search
			</button>
		</div>
	</form>

	{{-- blog section  --}}

	<div class="row">
		@foreach ($blogs as $blog)
			<x-blog-card :blog="$blog" />
		@endforeach

	</div>
</section>
