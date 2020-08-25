<?php

namespace App\Repositories;

use App\Report;
use App\School;

class ReportRepository
{
	/**
	 * Data report
	 * @var Report
	 */
	private $report;

	/**
	 * Data reports
	 * @var Collection
	 */
	private $reports;

	/**
	 * Retreive data report
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return App\Report
	 */
	public function getReport()
	{
		return $this->report;
	}

	/**
	 * Retreive data reports
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return Collection
	 */
	public function getReports()
	{
		return $this->reports;
	}

	/**
	 * Get data reports
	 *
	 * @author shellrean <wandinak17@gamil.com>
	 * @since 1.0.0
	 * @return void
	 */
	public function getDataReports($date = '')
	{
		try {
			if($date == '') {
				$date = \Carbon\Carbon::today();
			}
			$reports = School::with(['report' => function($query) use ($date) {
				$query->whereDate('created_at', $date);
			}])->get();
			$this->reports = $reports;
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Get data report
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return void
	 */
	public function getDataReport($school_id)
	{
		try {
			$report = School::with(['report' => function($query){
				$query->whereDate('created_at', \Carbon\Carbon::today());
			}])->where('id', $school_id)->first();
			$this->report = $report;
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Store dta report
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param json
	 * @return vod
	 */
	public function createDataReports($school_id, $name, $data, $date):void
	{
		try {
			if($date == '') {
				$date = \Carbon\Carbon::today();
			}
			$report = Report::where(['school_id' => $school_id, 'name' => $name, 'created_at' => $date])->first();
			if($report) {
				$report->update([
					'name'	=> $name,
					'school_id' => $school_id,
					'data'	=> $data,
					'created_at' => $date,
					'updated_at' => $date
				]);
				return;
			}
			Report::create([
				'name'	=> $name,
				'school_id' => $school_id,
				'data'	=> $data,
				'created_at' => $date,
				'updated_at' => $date
			]);
		} catch (Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}
}