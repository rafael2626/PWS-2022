<?php
use ActiveRecord\RecordNotFound;

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

    public function edit($id)
    {
        try{
            $produtos = Produto::find([$id]);
            $this->renderView("produtos/edit", ['produtos' => $produtos]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("produtos/show", ['produtos' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function update($id)
    {
        try{
            $produtos = Produto::find([$id]);
            $produtos->update_attributes($_POST);

            if($produtos->is_valid())
            {
                $produtos->save();
                $this->redirectToRoute("produtos", "index");
            }

        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("produtos/show", ['produtos' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

} 