@props(['blog'])
<div class="col-md-4 mb-4">
	<div class="card">
		<img src="/storage/{{ $blog->thumbnail }}" class="card-img-top" alt="..." />
		<div class="card-body">
			<h3 class="card-title">{{ $blog->title }}</h3>
			<h5 class="fs-6">
				Author - <a href="/?username={{ $blog->user->username }}">{{ $blog->user->name }}</a>
			</h5>
			<span class="table-responsive">{{ $blog->created_at->diffForHumans() }}</span>
			<div class="tags my-3">
				<a href="/?category={{ $blog->category->slug }}" class="badge bg-primary">{{ $blog->category->name }}</a>
				{{-- <span class="badge bg-secondary">Css</span>
				<span class="badge bg-success">Php</span>
				<span class="badge bg-danger">Javascript</span>
				<span class="badge bg-warning text-dark">Frontend</span> --}}
			</div>
			<p class="card-text">
				{{ $blog->body }}
			</p>
			<a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
		</div>
	</div>
</div>
