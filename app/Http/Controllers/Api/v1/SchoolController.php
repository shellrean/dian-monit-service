<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\SchoolRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolStore;
use App\Actions\SendResponse;

class SchoolController extends Controller
{
    /**
     * Get data schools
     *
     * @author shellrean <wandinak17@gmail.com>
     * @param \App\Repositories\SchoolRepository
     * @return \App\Actions\SendResponse
     */
    public function index(SchoolRepository $schoolRepository)
    {
        $schoolRepository->getDataSchools();
        return SendResponse::acceptData($schoolRepository->getSchools());
    }

    /**
     * Create data school
     *
     * @author shellrean <wandinak17@gamil.com>
     * @param \App\Repositories\SchoolRepository
     * @param  \App\Http\Requets\SchoolStore $request
     * @return \App\Actions\SendResponse
     */
    public function store(SchoolStore $request, SchoolRepository $schoolRepository)
    {
        $schoolRepository->createDataSchool($request);
        return SendResponse::acceptData($schoolRepository->getSchool());
    }

    /**
     * Display the specified resource.
     *
     * @author shellrean <wandinak17@gmail.com>
     * @param  int  $id
     * @param \App\Repositories\SchoolRepository
     * @return \Illuminate\Http\Response
     */
    public function show($id, SchoolRepository $schoolRepository)
    {
        $schoolRepository->getDataSchool($id);
        return SendResponse::acceptData($schoolRepository->getSchool());
    }

    /**
     * Update the specified resource in storage.
     *
     * @author shellrean <wandinak17@gmail.com>
     * @param \App\Repositories\SchoolRepository
     * @param \App\Http\Requests\SchoolStore $request
     * @return \App\Actions\SendResponse
     */
    public function update(SchoolStore $request, $id, SchoolRepository $schoolRepository)
    {
        $schoolRepository->updateDataSchool($request, $id);
        return SendResponse::acceptData($schoolRepository->getSchool());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, SchoolRepository $schoolRepository)
    {
        $schoolRepository->deleteDataSchool($id);
        return SendResponse::accept('school deleted');
    }
}
