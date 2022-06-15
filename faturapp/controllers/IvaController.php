<?php
use ActiveRecord\RecordNotFound;

class IvaController  extends  BaseController

{
    public function index()
    {

        $iva = Iva::all();
        $this->renderView("iva/index", ['iva' => $iva]);
    }
    public  function  create()
    {
        $iva = new Iva();
        $this->renderView("iva/create", ["iva" => $iva]);
    }
    public function store()
    {


        $iva = new Iva($_POST);

        if($iva->is_valid())
        {
            $iva->save();
            $this->redirectToRoute("iva", "index");
        }
        else
        {
            $iva =Iva::all();
            $this->renderView("iva/create", ["iva" => $iva]);
        }
    }

    public function edit($id)
    {

        try{
            $iva = Iva::find([$id]);

            $this->renderView("iva/edit", ['iva' => $iva]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("iva/show", ['iva' => null]);
        }
    }

    public function update($id)
    {

        try{
            $iva = Iva::find([$id]);
            $iva->update_attributes($_POST);

            if($iva->is_valid())
            {
                $iva->save();
                $this->redirectToRoute("iva", "index");
            }
            else
            {

                $this->renderView("iva/edit", ["iva" => $iva]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("iva/show", ['iva' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function delete($id)
    {

        try{
            $iva = Iva::find([$id]);
            if($iva->delete())
            {
                $this->redirectToRoute("iva", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("iva/show", ['iva' => null]); // usar o “show” porque mostra o erro
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
    public function show($id)
    {
        try{
            $iva = Iva::find([$id]);
            $this->renderView("iva/show", ['iva' => $iva]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "iva", ['callbackRoute' => 'iva/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $iva =Iva::find([$id]);


            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $taxa = $iva->id;

            if($iva->delete())
            {
                $this->redirectToRoute("iva", "index", ["id" => $iva]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("iva/show", ["iva" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }

}