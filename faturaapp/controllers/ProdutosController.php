<?php
use ActiveRecord\RecordNotFound;
require_once './controllers/BaseController.php';

class ProdutosController  extends  BaseController

{
    public function index()
    {
        $produtos = Produto::all();
        $this->renderView("produtos/index", ['produtos' => $produtos]);
    }
    public  function  create()
    {
        $produto = Fatura::all();
        $this->renderView("produtos/create", ["produtos" => $produto]);
    }

    public function show()
    {
    }
}