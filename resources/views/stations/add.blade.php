@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Station</div>

				<div class="panel-body">

					<form class="form-group" method="post" action="{{ route('stations.add') }}">
						<div class="row">
							<div class="col-md-6">
								<label>System Name</label>
								<input class="form-control" type="text" name="system_name" />
							</div>

							<div class="col-md-6">
								<label>Station Name</label>
								<input class="form-control" type="text" name="station_name" />
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label>Please Copy &amp; Paste CSV content into the text area</label>
								<textarea class="form-control"  name="csv_content" rows="25"></textarea>
								<!-- <div class="alert alert-danger" role="alert">Invalid CSV</div> -->
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-default pull-right">Add Station</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
