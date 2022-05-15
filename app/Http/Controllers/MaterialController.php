<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsMaterial;
use App\Http\Requests\MaterialStoreRequest;
use Illuminate\Support\Facades\DB;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models_materials = modelsMaterial::latest()->paginate(10);
        return view('material.index')->with('models_materials',$models_materials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialStoreRequest $request)
    {
        $Material = ModelsMaterial::create([
            
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'quantidade'=>$request->quantidade,
            'preco'=>$request->preco,
            
        ]);

        if(!$Material){
            return redirect()->back()->with('Não foi possível cadastrar esse material!');
        }
        return redirect()->route('material.store')->with('Material cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models_materials = ModelsMaterial::findOrFail($id);

        return view('material.show', ['models_materials' => $models_materials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = ModelsMaterial::findOrFail($id);

        return view('material.edit', ['models_materials' => $material]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialStoreRequest $request, $id)
    {
        $material = ModelsMaterial::findOrFail($id);

        $material -> update([
            
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'quantidade'=>$request->quantidade,
            'preco'=>$request->preco,
            
        ]);

        return redirect('/admin/material/')->with('success', 'Material editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsMaterial::findOrFail($id)->delete();

        return redirect('/admin/material/')->with('msg', 'Material excluído com sucesso!');
    }
}
