<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = $this->livro->all();
        return response()->json($livros, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //incluir no header accept application/json
        $request->validate($this->livro->rules(), $this->livro->feedback());

        $livro = $this->livro;
        $livro->nome = $request->input('nome');
        $livro->categoria = $request->input('categoria');
        $livro->codigo = $request->input('codigo');
        $livro->autor = $request->input('autor');

        if ($request->input('ebook') !== "true" && $request->input('ebook') !== "false") {
            return response()->json(['msg' => 'Ebook deve ser do tipo boolean'], 422);
        } else if ($request->input('ebook') === "true" ) {
            $livro->ebook = true;
        } else {
            $livro->ebook = false;
        }
        $livro->tamanho = $request->input('tamanho');
        $livro->peso = $request->input('peso');
        $livro->save();
        return response()->json($livro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = $this->livro->find($id);

        if (!$livro) {
            return response()->json([], 404);
        }

        return response()->json($livro, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $livro = $this->livro->find($id);

        if (!$livro) {
            return response()->json([], 404);
        }

        
        if ($request->method() === 'PATCH') {
            $regrasdinamicas = [];
            foreach ($livro->rules() as $input => $regra) {
                if (array_key_exists($input, $request->all())) {
                    $regrasdinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasdinamicas, $livro->feedback());
        } else {
            $request->validate($this->livro->rules(), $livro->feedback());
        }

        $livro->nome = $request->input('nome');
        $livro->categoria = $request->input('categoria');
        $livro->codigo = $request->input('codigo');
        $livro->autor = $request->input('autor');

        if ($request->input('ebook') !== "true" && $request->input('ebook') !== "false") {
            return response()->json(['msg' => 'Ebook deve ser do tipo boolean'], 422);
        } else if ($request->input('ebook') === "true" ) {
            $livro->ebook = true;
        } else {
            $livro->ebook = false;
        }
        $livro->tamanho = $request->input('tamanho');
        $livro->peso = $request->input('peso');
        
        $livro->update();
        return response()->json($livro, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = $this->livro->find($id);

        if (!$livro) {
            return response()->json([], 404);
        }

        $livro->delete();
        return response()->json([], 200);
    }
}
