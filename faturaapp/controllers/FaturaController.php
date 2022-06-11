<?php
use ActiveRecord\RecordNotFound;

class FaturaController  extends  BaseController

{
    public function index()
    {

        $faturas = Fatura::all();
        $this->renderView("fatura/index", ['faturas' => $faturas]);
    }
    public  function  create()
    {
        $fatura = new Fatura();
        $this->renderView("fatura/create", ["faturas" => $fatura]);
    }
    public function store()
    {


        $fatura = new Fatura($_POST);

        if($fatura->is_valid())
        {
            $fatura->save();
            $this->redirectToRoute("fatura", "index");
        }
        else
        {
            $fatura =Fatura::all();
            $this->renderView("fatura/create", ["users" => $fatura]);
        }
    }

    public function edit($id)
    {

        try{
            $fatura = Fatura::find([$id]);

            $this->renderView("fatura/edit", ['fatura' => $fatura]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("fatura/show", ['fatura' => null]);
        }
    }

    public function update($id)
    {

        try{
            $fatura = Fatura::find([$id]);
            $fatura->update_attributes($_POST);

            if($fatura->is_valid())
            {
                $fatura->save();
                $this->redirectToRoute("fatura", "index");
            }
            else
            {

                $this->renderView("fatura/edit", ["fatura" => $fatura]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("fatura/show", ['fatura' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function delete($id)
    {

        try{
            $fatura = Fatura::find([$id]);
            if($fatura->delete())
            {
                $this->redirectToRoute("fatura", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("fatura/show", ['fatura' => null]); // usar o “show” porque mostra o erro
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
    public function show($id)
    {


        try{
            $fatura = Fatura::find([$id]);
            $this->renderView("fatura/show", ['fatura' => $fatura]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'fatura/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $fatura =Fatura::find([$id]);

            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $fatura = $fatura->id;

            if($fatura->delete())
            {
                $this->redirectToRoute("fatura", "index", ["id" => $fatura]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("fatura/show", ["fatura" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }

}