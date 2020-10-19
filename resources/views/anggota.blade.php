@extends('main')

@section('title', 'Anggota')
@section('anggota', 'active')

@section('content')
<div class="row">
	<div class="col-xl-6 col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Create Anggota</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('create') }}">
					@csrf
					<div class="form-group">
						<input class="form-control" type="text" name="branch_code" placeholder="branch code" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="branch_location" placeholder="branch location" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="loan_type" placeholder="loan type" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="number" name="deal_ref" placeholder="deal ref" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="short_name" placeholder="short name" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="date" name="start_date" placeholder="start date" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="number" name="os" placeholder="os" required>
					</div>
					<div class="form-group">
						<input class="form-control btn btn-primary" type="submit" name="submit" value="create">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Import Data</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')
					{{ csrf_field() }}
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />
					<div class="form-group">
						<input class="form-control-file" type="file" name="file" required>
					</div>
					<div class="form-group">
						<input class="form-control btn btn-primary" type="submit" name="import" value="import">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
			</div>
			<div class="card-body">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							<th colspan="2">Branch</th>
							<th rowspan="2">Loan Type</th>
							<th rowspan="2">Deal Ref</th>
							<th rowspan="2">Short Name</th>
							<th rowspan="2">Start Data</th>
							<th rowspan="2">OS</th>
						</tr>
						<tr>
							<th>Code</th>
							<th>Location</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $data)
						<tr>
							<td>{{$data->branch_code}}</td>
							<td>{{$data->branch_location}}</td>
							<td>{{$data->loan_type}}</td>
							<td>{{$data->deal_ref}}</td>
							<td>{{$data->short_name}}</td>
							<td>{{$data->start_date}}</td>
							<td>{{$data->os}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
