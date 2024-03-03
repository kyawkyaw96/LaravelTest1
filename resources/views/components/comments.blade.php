<section class="container">
	<div class="col-md-8 mx-auto">
		<h5 class="text-secondary my-3">Comments (4)</h5>
		@foreach (range(1, 4) as $item)
			<x-single-comment />
		@endforeach
	</div>
</section>
