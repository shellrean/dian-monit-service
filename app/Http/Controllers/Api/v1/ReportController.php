<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\ReportRepository;
use App\Repositories\SchoolRepository;
use App\Http\Controllers\Controller;
use App\Services\ReportService;
use App\Actions\SendResponse;
use Illuminate\Http\Request;
use PDF;

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
        $date = isset(request()->q) && request()->q
                ? request()->q
                : '';
        if($date != '') {
            $date = \Carbon\Carbon::parse($date);
        }
    	$reportRepository->getDataReports($date);
    	return SendResponse::acceptData($reportRepository->getReports());
    }

    /**
     * Collect data report from url school client
     *
     * @author shelrlean <wandinak17@gmail.com>
     * @param \App\Repositories\ReportRepository
     * @param \App\Services\ReportService
     * @return \App\Actions\SendResponse
     */
    public function collect($school_id, SchoolRepository $schoolRepository, ReportRepository $reportRepository, ReportService $reportService) 
    {
        $schoolRepository->getDataSchool($school_id);
        $school = $schoolRepository->getSchool();

        $date = isset(request()->q) && request()->q
                ? request()->q
                : '';
        $reportService->collectDataFromSchool($school->url, $school->key, $date);
        if($date != '') {
            $date = \Carbon\Carbon::parse($date);
        }
        $reportRepository->createDataReports($school->id, 'abcent', $reportService->report, $date);
        return SendResponse::accept('report collected');
    }

    /**
     * Get data pdf from id_school
     *
     * @author shellrean <wandinak17@gmail.coM.
     * @param \App\Repositories\ReportRepository
     * @param \App\Services\ReportService
     * @return \App\Actions\SendResponse
     */
    public function getPdf($school_id, SchoolRepository $schoolRepository, ReportService $reportService, ReportRepository $reportRepository)
    {
        $reportRepository->getDataReport($school_id);
        $data = $reportRepository->getReport();
        $pdf = PDF::loadView('report', $data)->setPaper('a4', 'landscape');
        return $pdf->download($data->name.'-'.now()->format('d/m/Y').'.pdf');
    }
}
