<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pensiunan</title>
	<style>
		body {
			margin-left: 15%;
			margin-right: 15%;
		}
	</style>
</head>

<body>
	<h1>Anggota Pensiunan</h1>

	<div>
		<strong>import data</strong>
	</div>
	<form method="POST" action="{{ route('anggota.import') }}" enctype="multipart/form-data">
		@csrf
		@method('POST')
		{{ csrf_field() }}
		<input name="_token" type="hidden" value="{{ csrf_token() }}" />
		<input type="file" name="file" required>
		<input type="submit" name="submit" value="import">
	</form>

	<br>

	<div>
		<strong>create data</strong>
	</div>
	<form method="POST" action="{{ route('anggota.create') }}">
		@csrf
		@method('POST')
		{{ csrf_field() }}
		<input name="_token" type="hidden" value="{{ csrf_token() }}" />
		<div>
			<input type="text" name="branch_code" placeholder="branch code" required>
		</div>
		<div>
			<input type="text" name="branch_location" placeholder="branch location" required>
		</div>
		<div>
			<input type="text" name="loan_type" placeholder="loan type" required>
		</div>
		<div>
			<input type="number" name="deal_ref" placeholder="deal ref" required>
		</div>
		<div>
			<input type="text" name="short_name" placeholder="short name" required>
		</div>
		<div>
			<input type="date" name="start_date" placeholder="start date" required>
		</div>
		<div>
			<input type="number" name="os" placeholder="os" required>
		</div>
		<div>
			<input type="submit" name="submit" value="create">
		</div>
	</form>

	<br>

	<table border=1>
		<div><strong>Daftar Anggota</strong></div>
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
</body>

</html>
