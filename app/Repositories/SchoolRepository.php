<?php

namespace App\Repositories;

use App\School;

class SchoolRepository
{
	/**
	 * Data schools
	 * @var Collection
	 */
	private $schools;

	/**
	 * Data school
	 * @var App\School
	 */
	private $school;

	/**
	 * Retreive data schools
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return Collection
	 */
	public function getSchools()
	{
		return $this->schools;
	}

	/**
	 * Retreive data school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return App\School
	 */
	public function getSchool()
	{
		return $this->school;
	}

	/**
	 * Set data school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param $school
	 * @return void
	 */
	public function setSchool($school)
	{
		$this->school = $school;
	}

	/** 
	 * Get data schools
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @return void
	 */
	public function getDataSchools()
	{
		try {
			$schools = School::orderBy('name');
			$this->schools = $schools->get();
		} catch (\Exception $e){
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Get data school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param $school_id
	 * @return void
	 */
	public function getDataSchool($school_id)
	{
		try {
			$school = School::where('id',$school_id)->first();
			if(!$school) {
				throw new \App\Exceptions\ModelNotFoundException('school not found');
			}
			$this->setSchool($school);
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Create data school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param \App\Http\SchoolPost $request
	 * @return void
	 */
	public function createDataSchool($request)
	{
		try {
			$data = [
				'name'	=> $request->name,
				'npsn'	=> $request->npsn,
				'key'	=> uniqid(),
				'url'	=> $request->url
			];
			$school = School::create($data);
			$this->setSchool($school);
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Update data school
	 *
	 * @author shellrean <wandinak17@gamil.com>
	 * @since 1.0.0
	 * @param \App\Http\SchoolPost $request
	 * @return void
	 */
	public function updateDataSchool($request, $school_id)
	{
		try {
			$this->getDataSchool($school_id);
			$data = [
				'name'	=> $request->name,
				'npsn'	=> $request->npsn,
				'url'	=> $request->url
			];
			$this->school->update($data);
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}

	/**
	 * Delete data school
	 *
	 * @author shellrean <wandinak17@gmail.com>
	 * @since 1.0.0
	 * @param $schooL_id
	 * @return void
	 */
	public function deleteDataSchool($school_id)
	{
		try {
			School::where('id', $school_id)->delete();
		} catch (\Exception $e) {
			throw new \App\Exceptions\ModelException($e->getMessage());
		}
	}
}