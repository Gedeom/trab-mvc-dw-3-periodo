<?php

namespace App\Http\Controllers;

use App\Interfaces\ProdutoRepositoryInterface;
use App\Models\Fornecedor;
use App\Models\Pessoa;
use App\Models\Produto;
use DB;
use Exception;
use Illuminate\Http\Request;
use Validator;

class ProdutoController extends Controller
{
    private $produto;

    //aqui eu passo somente a interface, mas o laravel avisa o controller que tem uma classe implementando essa interface, ai ja pega os metodos delas para essa variavel, la em AppServiceProvider
    public function __construct(ProdutoRepositoryInterface $produto)
    {
        $this->produto = $produto;
    }

    public function GetView()
    {
        return view('produtos.cad_produto');
    }

    public function DataGrid()
    {

        return $this->produto->DataGrid();
    }


    public function Delete($produto_id)
    {
        $retorno = $this->produto->Delete($produto_id);
        return response()->json(['message' => $retorno->msg, 'success' => $retorno->success], $retorno->code);
    }

    public function Insert(Request $request)
    {

        $retorno = $this->produto->Insert($request);
        return response()->json(['message' => $retorno->msg, 'success' => $retorno->success], $retorno->code);

    }


    public function GetCategoria(Request $request)
    {
        return json_encode(['results' => $this->produto->GetCategoria($request)]);
    }

    public function Update($produto_id, Request $request)
    {
        $retorno = $this->produto->Update($produto_id,$request);
        return response()->json(['message' => $retorno->msg, 'success' => $retorno->success], $retorno->code);

    }
}
