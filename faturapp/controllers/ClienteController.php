<?php
require_once './controllers/BaseController.php';
require_once './controllers/BaseAuthController.php';

class ClienteController extends  BaseAuthController
{
    public  function  index()
    {
        $cliente = User::all();
        $this->renderView("cliente/index", ['users' => $cliente]);
    }
}