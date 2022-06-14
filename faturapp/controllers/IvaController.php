<?php
use ActiveRecord\RecordNotFound;

class IvaController  extends  BaseController

{
    public function index()
    {

        $taxa = Iva::all();
        $this->renderView("iva/index", ['iva' => $taxa]);
    }
    public  function  create()
    {
        $taxa = new Iva();
        $this->renderView("iva/create", ["iva" => $taxa]);
    }
    public function store()
    {


        $taxa = new Iva($_POST);

        if($taxa->is_valid())
        {
            $taxa->save();
            $this->redirectToRoute("iva", "index");
        }
        else
        {
            $taxa =Iva::all();
            $this->renderView("iva/create", ["iva" => $taxa]);
        }
    }

    public function edit($id)
    {

        try{
            $taxa = Iva::find([$id]);

            $this->renderView("iva/edit", ['iva' => $taxa]);
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
            $taxa = Iva::find([$id]);
            $taxa->update_attributes($_POST);

            if($taxa->is_valid())
            {
                $taxa->save();
                $this->redirectToRoute("iva", "index");
            }
            else
            {

                $this->renderView("iva/edit", ["iva" => $taxa]);
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
            $taxa = Iva::find([$id]);
            if($taxa->delete())
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
            $taxa = Iva::find([$id]);
            $this->renderView("iva/show", ['iva' => $taxa]);
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
            $taxa =Iva::find([$id]);


            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $taxa = $taxa->id;

            if($taxa->delete())
            {
                $this->redirectToRoute("iva", "index", ["id" => $taxa]);
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