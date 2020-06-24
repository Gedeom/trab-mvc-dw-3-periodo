<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface ProdutoRepositoryInterface
{
    public function DataGrid();
    public function Insert(Request $request);
    public function Update($id, Request $request);
    public function Delete($id);
    public function Validacao(Request $request,$id);
}
