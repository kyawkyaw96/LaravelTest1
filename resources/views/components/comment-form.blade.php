<section class="container">
	<div class="col-md-8 mx-auto">
		<div class="card d-flex my-2 px-3 py-2 shadow-sm">
			<form action="/blogs/{{ $blog->slug }}/comment" method="POST">
				@csrf
				<div class="mb-2">
					<label for="exampleInputEmail1" class="form-label">Comment</label>
					<textarea type="" required class="form-control" name="body" id="exampleInputEmail1" aria-describedby="emailHelp"
					 placeholder="@auth Comment here
                        @else Login first @endauth"></textarea>
					@error('body')
						<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" @guest
disabled @endguest class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</section>
