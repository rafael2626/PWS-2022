<?php
use ActiveRecord\RecordNotFound;

class EmpresaController  extends  BaseController

{
    public function index()
    {
        $empresa = Empresa::all();
        $this->renderView("empresa/index", ['empresa' => $empresa]);
    }
    public  function  create()
    {
        $empresa = new Empresa();
        $this->renderView("empresa/create", ["empresa" => $empresa]);
    }
    public function store()
    {
        $empresa = new Empresa();

        $empresa->designacaosocial = $_POST['designacaosocial'];
        $empresa->email = $_POST['email'];
        $empresa->telefone = $_POST['telefone'];
        $empresa->nif = $_POST['nif'];
        $empresa->morada = $_POST['morada'];
        $empresa->codigopostal = $_POST['codigopostal'];
        $empresa->localidade = $_POST['localidade'];
        $empresa->capitalsocial = $_POST['capitalsocial'];
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute('empresa','index');
        } else {
            $this->renderView("empresa/create", ['empresa' => $empresa]);
        }



    }

    public function edit($id)
    {

        try{
            $empresa = Empresa::find([$id]);

            $this->renderView("empresa/edit", ['empresa' => $empresa]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("empresa/show", ['empresa' => null]);
        }
    }

    public function update($id)
    {

        try{
            $empresa = Empresa::find([$id]);
            $empresa->update_attributes($_POST);

            if($empresa->is_valid())
            {
                $empresa->save();
                $this->redirectToRoute("empresa", "index");
            }
            else
            {

                $this->renderView("empresa/edit", ["empresa" => $empresa]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("empresa/show", ['empresa' => null]);
        }
    }

    public function delete($id)
    {

        try{
            $empresa = Empresa::find([$id]);
            if($empresa->delete())
            {
                $this->redirectToRoute("empresa", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("empresa/show", ['empresa' => null]);
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
    public function show($id)
    {
        try{
            $empresa = Empresa::find([$id]);
            $this->renderView("empresa/show", ['empresa' => $empresa]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'empresa/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $empresa = Produto::find([$id]);

            $empresa = $empresa->id;

            if($empresa->delete())
            {
                $this->redirectToRoute("empresa", "index", ["id" => $empresa]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("empresa/show", ["empresa" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }

}