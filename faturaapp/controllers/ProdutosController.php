<?php
use ActiveRecord\RecordNotFound;
require_once './controllers/BaseController.php';

class ProdutosController  extends  BaseAuthController

{
    public function index()
    {
        $produto = Produto::all();
        $this->renderView("produtos/index", ['produtos' => $produto]);
    }
    public  function  create()
    {
        $produto = Produto::all();
        $this->renderView("produtos/create", ["produtos" => $produto]);
    }

    public function show()
    {
    }
}