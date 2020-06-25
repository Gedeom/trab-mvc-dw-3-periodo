<?php


namespace App\Repositories;
use App\Interfaces\ProdutoRepositoryInterface;
use App\Models\Categoria;
use App\Models\Produto;
use DB;
use Exception;
use Illuminate\Http\Request;
use stdClass;
use Validator;

class ProdutoRepository implements ProdutoRepositoryInterface
{

    public function DataGrid()
    {
        $produto = Produto::
        join('categoria_produto as categoria', 'categoria.id', '=', 'produto.categoria_id')
            ->selectRaw('produto.id, produto.nome, format(vlr_padrao,2,\'de_DE\') as valor,
            categoria.nome as categoria, format(qnt_inicial,2,\'de_DE\') as qnt_inicial, categoria.id as categoria_id');
        return $produto->get();
    }

    public function Insert(Request $request)
    {
        $std_class = new stdClass();


        try {
            DB::beginTransaction();

            if (($validacao = $this->Validacao($request)) != '')
                throw new Exception($validacao, 422);

            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->categoria_id = $request->categoria;
            $produto->qnt_inicial = $request->qnt_inicial;
            $produto->vlr_padrao = $request->vlr_padrao;
            $produto->save();

            DB::commit();

            $std_class->msg = 'Cadastrado com sucesso!';
            $std_class->code = 200;
            $std_class->success = true;

        } catch (Exception $e) {
            DB::rollBack();
            $std_class->msg = 'Erro ao cadastrar: ' . $e->getMessage();
            $std_class->code = $e->getCode();
            $std_class->success = false;
        }

        return $std_class;
    }

    public function Validacao(Request $request, $id = 0)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'categoria' => 'required',
            'qnt_inicial' => 'required|numeric|min:0|not_in:0',
            'vlr_padrao' => 'required|numeric|min:0|not_in:0',
        ],
            [
                'nome.required' => 'Informe o nome do produto!',
                'categoria.required' => 'Informe a categoria!',
                'qnt_inicial.required' => 'Informe a quantidade inicial do produto!',
                'qnt_inicial.min' => 'Quantidade precisa ser maior que zero!',
                'qnt_inicial.not_in' => 'Quantidade precisa ser maior que zero!',
                'vlr_padrao.required' => 'Informe o valor padrão do produto!',
                'vlr_padrao.min' => 'Valor precisa ser maior que zero!',
                'vlr_padrao.not_in' => 'Valor precisa ser maior que zero!',
            ]);

        if ($validator->fails()) {
            return $validator->messages()->first();
        }

        return '';
    }

    public function GetCategoria(Request $request)
    {
        $query = $request->query_consulta;
        $categorias = Categoria::
        where('nome', 'like', "%{$query}%")
            ->selectRaw("id, nome as text")->get();

        return $categorias;
    }

    public function Update($produto_id, Request $request)
    {
        $std_class = new stdClass();


        try {
            DB::beginTransaction();

            if (($validacao = $this->Validacao($request)) != '')
                throw new Exception($validacao, 422);

            $produto = Produto::find($produto_id);
            $produto->nome = $request->nome;
            $produto->categoria_id = $request->categoria;
            $produto->qnt_inicial = $request->qnt_inicial;
            $produto->vlr_padrao = $request->vlr_padrao;
            $produto->save();

            DB::commit();

            $std_class->msg = 'Atualizado com sucesso!';
            $std_class->code = 200;
            $std_class->success = true;

        } catch (Exception $e) {
            DB::rollBack();
            $std_class->msg = 'Erro ao atualizar: ' . $e->getMessage();
            $std_class->code = $e->getCode();
            $std_class->success = false;
        }

        return $std_class;
    }

    public function Delete($produto_id)
    {
        $std_class = new stdClass();

        try {
            DB::beginTransaction();

            $produto = Produto::find($produto_id);
            $produto->delete();

            DB::commit();
            $std_class->msg = 'Deletado com sucesso!';
            $std_class->code = 200;
            $std_class->success = true;

        } catch (Exception $e) {
            DB::rollBack();
            $std_class->msg = 'Erro ao deletar: ' . $e->getMessage();
            $std_class->code = $e->getCode();
            $std_class->success = false;
        }

        return $std_class;
    }
}
