<?php
require_once './controllers/BaseController.php';
class FuncionarioController extends  BaseAuthController
{
    public  function  index()
    {
        $func = User::all();
        $this->renderView("func/index", ['funcionario' => $func]);
    }
    public  function  create()
    {
        $func = User::all();
        $this->renderView("func/create", ['func' => $func]);
    }
}