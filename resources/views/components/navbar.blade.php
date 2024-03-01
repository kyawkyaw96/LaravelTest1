<!-- navbar -->
<nav class="navbar navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="/">Creative Coder</a>
		<div class="d-flex">
			<a href="/#blogs" class="nav-link">Blogs</a>
			@auth
				<a href="" class="nav-link">{{ auth()->user()->name }}</a>
				<form action="/logout" method="POST">
					@csrf
					<button type="submit" href="/logout" class="btn btn-link">Logout</button>
				</form>
			@else
				<a href="/register" class="nav-link">Register</a>
			@endauth

			<a href="#subscribe" class="nav-link">Subscribe</a>
		</div>
	</div>
</nav>
