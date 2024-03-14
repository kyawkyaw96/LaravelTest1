{{-- @if (auth()->user('name')->username == 'kyaw kyaw')
	<x-layout>
		<form action="">
			<h4>This is admin page</h4>
		</form>
	</x-layout>
@else
	{{ abort(403) }}
@endif --}}

<x-layout>
	<div class="col-md-5 mx-auto">
		<h3 class="text-primary my-2 text-center"> Create Blog Form</h3>
		<div class="card my-3 p-4 shadow-sm">
			<form method="POST" action="/admin/blogs/store" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<label for="category_id" class="form-label">Category</label>
					<select type="text" name="category_id" class="form-select @error('category_id') is-invalid @enderror"
						id="category_id" aria-describedby="emailHelp">
						@foreach ($categories as $category)
							<option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
								{{ $category->name }}
							</option>
						@endforeach
					</select>
					@error('category_id')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input value="{{ old('title') }}" type="text" required name="title"
						class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="titleHelp">
					@error('title')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="slug" class="form-label">Slug</label>
					<input value="{{ old('slug') }}" type="text" required name="slug"
						class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slugHelp">
					@error('slug')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="intro" class="form-label">Intro</label>
					<input value="{{ old('intro') }}" type="text" required name="intro"
						class="form-control @error('intro') is-invalid @enderror" id="intro" aria-describedby="introHelp">
					@error('intro')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="thumnails" class="form-label">Thumbmails</label>
					<input value="{{ old('thumbnails') }}" type="file" required name="thumbnails"
						class="form-control @error('thumbnails') is-invalid @enderror" id="thumbnails" aria-describedby="thumbnailsHelp">
					@error('thumbnails')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="body" class="form-label">Body</label>
					<textarea value="{{ old('body') }}" rows="5" type="text" required name="body"
					 class="form-control @error('body') is-invalid @enderror" id="body" aria-describedby="bodyHelp"></textarea>
					@error('body')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</x-layout>
