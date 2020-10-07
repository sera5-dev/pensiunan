<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
	public function index()
	{
		$anggota = Http::get('https://sera5.id/pensiunan/api/anggota')->body();
		$data = json_decode($anggota)->data;

		return view('anggota', ['data' => $data]);
	}

	public function import(Request $request)
	{
		if ($request->hasFile('file')) {
			Http::attach('file', fopen($request->file, 'r'))->post('https://sera5.id/pensiunan/api/anggota/import');
		}

		$anggota = Http::get('https://sera5.id/pensiunan/api/anggota')->body();
		$data = json_decode($anggota)->data;

		return view('anggota', ['data' => $data]);
	}

	public function create(Request $request)
	{
		Http::post('https://sera5.id/pensiunan/api/anggota', [
			'branch_code' 			=> $request->input('branch_code'),
			'branch_location' 	=> $request->input('branch_location'),
			'loan_type' 				=> $request->input('loan_type'),
			'deal_ref' 					=> $request->input('deal_ref'),
			'short_name' 				=> $request->input('short_name'),
			'start_date' 				=> $request->input('start_date'),
			'os' 								=> $request->input('os')
		]);

		$anggota = Http::get('https://sera5.id/pensiunan/api/anggota')->body();
		$data = json_decode($anggota)->data;

		return view('anggota', ['data' => $data]);
	}
}
