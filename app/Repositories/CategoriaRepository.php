<?php


namespace App\Repositories;


use App\Interfaces\CategoriaRepositoryInterface;
use App\Models\Categoria;
use DB;
use Exception;
use Illuminate\Http\Request;
use stdClass;
use Validator;

class CategoriaRepository implements CategoriaRepositoryInterface
{

    public function DataGrid()
    {
        $categoria = Categoria::selectRaw('id, nome');
        return $categoria->get();
    }

    public function Insert(Request $request)
    {
        $std_class = new stdClass();

        try {
            DB::beginTransaction();

            if (($validacao = $this->Validacao($request)) != '')
                throw new Exception($validacao, 422);

            $categoria = new Categoria();
            $categoria->nome = $request->nome;
            $categoria->save();

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
            'nome' => 'required|min:1|max:255'
        ],
            [
                'nome.required' => 'Informe o nome da categoria!',
                'nome.min' => 'Nome da categoria tem que ter no mínimo um caracter!',
                'nome.max' => 'Nome da categoria tem que ter no máximo 255 caracteres!',
            ]);

        if ($validator->fails()) {
            return $validator->messages()->first();
        }

        return '';
    }

    public function Update($categoria_id, Request $request)
    {
        $std_class = new stdClass();

        try {
            DB::beginTransaction();

            if (($validacao = $this->Validacao($request)) != '')
                throw new Exception($validacao, 422);

            $categoria = Categoria::find($categoria_id);
            $categoria->nome = $request->nome;
            $categoria->save();

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

    public function Delete($categoria_id)
    {
        $std_class = new stdClass();

        try {
            DB::beginTransaction();

            $categoria = Categoria::find($categoria_id);

            if ($categoria->produto()->count() > 0)
                throw new Exception('Categoria tem produto!', 422);

            $categoria->delete();

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
