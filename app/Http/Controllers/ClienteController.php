<?php

namespace App\Http\Controllers;

use App\Models\ModelsCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'oláaaaaaaaaaaaaa';
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
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsCliente $modelsCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelsCliente  $modelsCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsCliente $modelsCliente)
    {
        //
    }
}
