<div class="">
	<div class="dropdown">
		<button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			{{ isset($currentCategory) ? $currentCategory->name : 'Filter by category' }}
		</button>
		<ul class="dropdown-menu">
			<li><a class="dropdown-item" href="/">all</a>
			</li>
			@foreach ($categories as $category)
				<li><a class="dropdown-item"
						href="/?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : null }}{{ request('username') ? '&username=' . request('username') : null }}">{{ $category->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
	{{-- <select name="" id="" class="rounded-pill mx-3 p-1">
        <option value="">Filter by Tag</option>
    </select> --}}
</div>
