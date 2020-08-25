<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ReportService
{
	/**
	 * Data report
	 * @var collection
	 */
	public $report;

	/**
	 * Collect data from rest api client school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param $school_url
	 * @param $school_key
	 * @return void
	 */
	public function collectDataFromSchool($school_url, $school_key, $date = '')
	{
		$response = Http::get($school_url.'/api/v1/report/today?key='.$school_key.'&q='.$date);
		$this->report = collect($response->json()['data']);
	}
}