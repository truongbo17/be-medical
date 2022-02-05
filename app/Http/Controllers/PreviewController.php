<?php

namespace App\Http\Controllers;

use App\Models\Preview;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Preview::orderBy('updated_at', 'desc')->take(3)->get();
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
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function show(Preview $preview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function edit(Preview $preview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preview $preview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preview $preview)
    {
        //
    }
}
