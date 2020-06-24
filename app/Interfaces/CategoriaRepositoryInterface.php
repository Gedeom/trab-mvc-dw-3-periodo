<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface CategoriaRepositoryInterface
{
    public function DataGrid();
    public function Insert(Request $request);
    public function Update($id,Request $request);
    public function Validacao(Request $request,$id = 0);
    public function Delete($id);
}
