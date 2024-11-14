<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProxyPayController extends Controller
{
	public function register($reference)
	{
		return  Http::withBody(
			'{}',
			'json'
		)
			->withHeaders([
				'Accept' => 'application/vnd.proxypay.v2+json',
				'Authorization' => 'Token 72n1duaeeaqiskfvkuukhfiff5o4qv7n',
				'Content-Type' => 'application/json',
			])
			->put("https://api.proxypay.co.ao/references/$reference");
	}


	public function newRegistrations()
	{
		$lastId = '' . trim(Storage::disk('local')->get('last-record.txt'));

		$query = DB::connection('sqlsrv')->table('Client')
			->select(['Id', 'Phone', 'Created'])
			->whereNotNull('Phone')
			->where('Created', '>=', $lastId)
			->limit(100)
			->get();
				
		if (!$query->count())
			return;

		$lastId = $query->last()->Created;
		$recordCreated = $query->count();
		$references = [];

		foreach ($query as $q) {
			$phone = substr(preg_replace("([^0-9])", "", $q->Phone), -9);
			$responses[] = $this->register($phone);
			$references[] = $phone;
		}

		$references = implode(', ', $references);

		$date = now()->format('Y-m-d');
		$now = now()->format('Y-m-d H:i:s');
		Storage::disk('local')->append("exported-$date.txt", "[$now]: New $recordCreated reference created.\nReferences: $references");
		Storage::disk('local')->put('last-record.txt', $lastId);
	}


	public function initiateRegistration()
	{
		$created = now()->subMinutes(15)->format('Y-m-d H:i:s');
		$query = DB::connection('sqlsrv')->table('Client')
			->select(['Phone', 'Created'])
			->whereNotNull('Phone')
			->where('Created', '>=', $created);
		$ids = $query->get()
			->pluck('Phone')
			->toArray();

		Log::info("New reference created", [
			'no' => count($ids),
			'references' => implode(', ', $ids),
			'date' => Carbon::now()->format('Y-m-d H:i:s.u e'),
			'sql' => $query->toSql(),
			'created' => $created,
		]);

		$responses = [];

		foreach ($ids as $id)
			$responses[] = $this->register(preg_replace('/' . preg_quote("244", '/') . '/', "", $id, 1));
	}
}
