<?php

namespace App\Http\Controllers;

use App\Models\MedicalDepartment;
use Illuminate\Http\Request;

class MedicalDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicalDepartment::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalDepartment  $medicalDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalDepartment $medicalDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalDepartment  $medicalDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalDepartment $medicalDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalDepartment  $medicalDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalDepartment $medicalDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalDepartment  $medicalDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalDepartment $medicalDepartment)
    {
        //
    }
}
