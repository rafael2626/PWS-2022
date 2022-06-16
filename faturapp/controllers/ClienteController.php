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
    public function edit($id)
    {

        try{
            $produto = Produto::find([$id]);

            $this->renderView("produto/edit", ['produto' => $produto]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("produto/show", ['produto' => null]);
        }
    }

}