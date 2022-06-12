<?php
use ActiveRecord\RecordNotFound;

class TaxasController extends  BaseController

{
    public function index()
    {
        $taxa = Produto::all();
        $this->renderView("taxas/index", ['taxas' => $taxa]);
    }
    public  function  create()
    {
        $taxa = Produto::all();
        $this->renderView("taxas/create", ["taxas" => $taxa]);
    }

    public function show()
    {
    }

    public function edit($id)
    {
        try{
            $taxa = Produto::find([$id]);
            $this->renderView("taxas/edit", ['produtos' => $taxa]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("taxas/show", ['taxas' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function update($id)
    {
        try{
            $taxa = Produto::find([$id]);
            $taxa->update_attributes($_POST);

            if($taxa->is_valid())
            {
                $taxa->save();
                $this->redirectToRoute("taxas", "index");
            }

        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("taxas/show", ['taxas' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

}