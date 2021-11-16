<?php

namespace App\Http\Controllers;

use App\Models\ModelsProduto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoStoreRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models_produtos = modelsProduto::latest()->paginate(10);
        return view('produtos.index')->with('models_produtos',$models_produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoStoreRequest $request)
    {
        $imagem_path = '';
        if($request->hasFile('imagem')){
            $imagem_path = $request->file('imagem')->store('models_produtos');
        }

        $modelsProduto = ModelsProduto::create([

            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'imagem'=>$imagem_path,
            'preco'=>$request->preco,
            'status'=>$request->status,
            'material'=>$request->material

        ]);

        if(!$modelsProduto){
            return redirect()->back()->with('Não foi possível cadastrar esse produto!');
        }
        return redirect()->route('produtos.store')->with('Produto cadastrado com sucesso!');
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
    public function edit($id)
    {
        $produto = ModelsProduto::findOrFail($id);

        return view('produtos.edit', ['models_produtos' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = ModelsProduto::findOrFail($id);

        $produto->update([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'imagem'=>$request->imagem,
            'preco'=>$request->preco,
            'status'=>$request->status,
            'material'=>$request->material
        ]);

        return redirect('/admin/produtos/')->with('msg', 'Produto editado com sucesso!');

        // ModelsProduto::findOrFail($request->id)->update($request->all());

        // return redirect('/admin/produtos/')->with('msg', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelsProduto  $modelsProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsProduto::findOrFail($id)->delete();

        return redirect('/admin/produtos/')->with('msg', 'Produto excluído com sucesso!');
    }
}
