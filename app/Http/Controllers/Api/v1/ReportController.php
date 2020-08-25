<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\ReportRepository;
use App\Http\Controllers\Controller;
use App\Actions\SendResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Get get school list report
     *
     * @author shellrean <wandinak17@gmail.com>
     * @param \App\Repositories\ReportRepository
     * @return \App\Actions\SendResponse
     */
    public function index(ReportRepository $reportRepository)
    {
    	$reportRepository->getDataReports();
    	return SendResponse::acceptData($reportRepository->getReports());
    }
}
