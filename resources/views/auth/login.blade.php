<x-layout>
	<div class="form container">
		<div class="row">
			<div class="col-md-5 mx-auto">
				<h3 class="text-primary my-2 text-center">Login Form</h3>
				<div class="card my-3 p-4 shadow-sm">
					<form method="POST">
						@csrf
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input value="{{ old('email') }}" type="email" required name="email"
								class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
							@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" required name="password" class="form-control @error('password') is-invalid @enderror"
								id="exampleInputPassword1">
							@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-layout>
