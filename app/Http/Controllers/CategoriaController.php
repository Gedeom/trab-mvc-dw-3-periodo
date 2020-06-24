<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoriaRepositoryInterface;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoria;

    //aqui eu passo somente a interface, mas o laravel avisa o controller que tem uma classe implementando essa interface, ai ja pega os metodos delas para essa variavel, la em AppServiceProvider
    public function __construct(CategoriaRepositoryInterface $categoria)
    {
        $this->categoria = $categoria;
    }

    //pegar view principal
    public function GetView()
    {
        return view('categorias.cad_categoria');
    }

    //pegar dados grid
    public function DataGrid()
    {
        return $this->categoria->DataGrid();
    }

    //deletar categoria
    public function Delete($categoria_id)
    {
        $retorno = $this->categoria->Delete($categoria_id);
        return response()->json(['message'=> $retorno->msg,'success'=> $retorno->success],$retorno->code);
    }

    //inserir categoria
    public function Insert(Request $request)
    {
        $retorno = $this->categoria->Insert($request);
        return response()->json(['message'=> $retorno->msg,'success'=> $retorno->success],$retorno->code);
    }

    //atualizar categoria
    public function Update($categoria_id, Request $request)
    {
        $retorno = $this->categoria->Update($categoria_id,$request);
        return response()->json(['message'=> $retorno->msg,'success'=> $retorno->success],$retorno->code);
    }
}
