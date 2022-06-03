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
        $fatura = Fatura::all();
        $this->renderView("fatura/create", ["faturas" => $fatura]);
    }
}