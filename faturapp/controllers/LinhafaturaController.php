<?php
use ActiveRecord\RecordNotFound;
class LinhafaturaController extends  BaseController
{

    public function index()
    {

        $linhafatura = LinhaFatura::all();
        $this->renderView("linhafatura/index", ['linhafaturas' => $linhafatura]);
    }

    public function create($id)
    {
        $linhafatura = new LinhaFatura();
        $this->renderView("linhafatura/create", ["linhafatura" => $linhafatura, 'id' => $id]);
    }
    public function store($id)
    {

      $linhafatura = new Linhafatura();
      $linhafatura->quantidade = $_POST ['quantidade'];

        $r = $_POST['referencia'];

       // $subtotal = $_POST[]


        $produto = Produto::find('first', array('conditions' => array('referencia = ?', $r)));
        if($produto == null)
        {
            $this->renderView("linhafatura/create", ["linhafatura" => $linhafatura, 'id' => $id]);
        }

        $linhafatura->produto_id = $produto->id;

        $linhafatura->quantidade = $_POST ['quantidade'];

        $linhafatura->valorIVA =   $produto->preco *  $produto->iva->percentagem;



        $linhafatura->total =  $linhafatura->quantidade * $produto->preco;


         if($linhafatura->is_valid())
         {
             $linhafatura->save();
             $this->redirectToRoute("linhafatura", "index");
         }
         else
         {
             $linhafatura = Linhafatura::all();
             $this->renderView("linhafatura/create", ["linhafatura" => $linhafatura, 'id' => $id]);
         }
     }


}