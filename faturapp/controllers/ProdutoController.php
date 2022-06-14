<?php
use ActiveRecord\RecordNotFound;

class ProdutoController  extends  BaseController

{
    public function index()
    {
        $produtos = Produto::all();
        $this->renderView("produto/index", ['produtos' => $produtos]);
    }
    public  function  create()
    {
        $produto = new Produto();
        $this->renderView("produto/create", ["produto" => $produto]);
    }
    public function store()
    {
        $produto = new Produto();

        $produto->referencia = $_POST['referencia'];
        $produto->descricao = $_POST['descricao'];
        $produto->stock = $_POST['stock'];
        $produto->preco = $_POST['preco'];
        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute('produto','index');
        } else {
            $this->renderView("produto/create", ['produto' => $produto]);
        }



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

    public function update($id)
    {

        try{
            $produto = Produto::find([$id]);
            $produto->update_attributes($_POST);

            if($produto->is_valid())
            {
                $produto->save();
                $this->redirectToRoute("produto", "index");
            }
            else
            {

                $this->renderView("produto/edit", ["produto" => $produto]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("produto/show", ['produto' => null]);
        }
    }

    public function delete($id)
    {

        try{
            $produto = Produto::find([$id]);
            if($produto->delete())
            {
                $this->redirectToRoute("produto", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("produto/show", ['produto' => null]);
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
    public function show($id)
    {


        try{
            $produto = Produto::find([$id]);
            $this->renderView("produto/show", ['produto' => $produto]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'produto/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $produto = Produto::find([$id]);

            $produto = $produto->id;

            if($produto->delete())
            {
                $this->redirectToRoute("produto", "index", ["id" => $produto]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("produto/show", ["produto" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }

}