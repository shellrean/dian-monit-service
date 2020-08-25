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
	 * Get data report
	 *
	 * @author shellrean <wandinak17@gamil.com>
	 * @since 1.0.0
	 * @return Collection
	 */
	public function getDataReports()
	{
		try {
			// $reports = Report::with('school')->whereDate('created_at',\Carbon\Carbon::now())->get();
			$reports = School::with(['report' => function($query){
				$query->whereDate('created_at', \Carbon\Carbon::today());
			}])->get();
			$this->reports = $reports;
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}
}