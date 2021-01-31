@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<h5 class="card-header">
					Card title
				</h5>
				<div class="card-body">
					<p class="card-text">
						Card content
					</p>
				</div>
				<div class="card-footer">
					Card footer
				</div>
			</div>

		</div>
		<div class="col-md-8">
			<div class="card">
				<h5 class="card-header">
					Gallery
				</h5>
				<div class="card-body">
					<p class="card-text">
                        Gallery content</br>

                        @foreach ($images as $image)

                        <a data-fancybox="gallery" href="{{asset('images')}}/{{ object_get($image,"image") }}">
                            <img src="{{asset('images')}}/{{ object_get($image,"image") }}" width="10" height="10"></a>

                        @endforeach

					</p>
				</div>
				<div class="card-footer">
					Card footer
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<h5 class="card-header">
							Content
						</h5>
						<div class="card-body">
							<p class="card-text">
								Card content
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<h5 class="card-header">
							Extras
						</h5>
						<div class="card-body">
							<p class="card-text">
								Card content
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
