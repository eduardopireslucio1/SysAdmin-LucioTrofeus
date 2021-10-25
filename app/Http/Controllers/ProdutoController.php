<?php

namespace App\Http\Controllers;

use App\Models\ModelsProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'aolooodoasda';
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
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsProduto $modelsProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsProduto $modelsProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsProduto $modelsProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsProduto $modelsProduto)
    {
        //
    }
}
