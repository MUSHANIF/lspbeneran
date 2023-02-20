<?php

namespace App\Http\Controllers;

use App\Models\validation;
use App\Http\Requests\StorevalidationRequest;
use App\Http\Requests\UpdatevalidationRequest;

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorevalidationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevalidationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function show(validation $validation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function edit(validation $validation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevalidationRequest  $request
     * @param  \App\Models\validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevalidationRequest $request, validation $validation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function destroy(validation $validation)
    {
        //
    }
}
