<?php
use ActiveRecord\RecordNotFound;

class FaturaController  extends  BaseController

{
    public function index()
    {

        $faturas = Fatura::all();
        $this->renderView("fatura/index", ['faturas' => $faturas]);
    }

/*    public function index()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);
            $faturas = null;

            if ($user->role == "cliente") {
                $faturas = Fatura::find_all_by_cliente_id_and_estado($user->id, 'emitido');
            } else {
                if (isset($_POST['filter'])) {
                    switch ($_POST['filter']) {
                        case '' :
                            $faturas = Fatura::all();
                            break;
                        case 'emitidas' :
                            $faturas = Fatura::find_all_by_estado('emitido');
                            break;
                        case 'por emitir' :
                            $faturas = Fatura::find_all_by_estado('por emitir');
                            break;
                        case 'anuladas' :
                            $faturas = Fatura::find_all_by_estado('anulado');
                            break;
                    }
                } else {
                    $faturas = Fatura::all();
                }
            }
            $this->renderView('fatura/index', ["faturas" => $faturas]);
        }
    }
*/
    public  function  create()
    {
        $fatura = new Fatura();
        $this->renderView("fatura/create", ["faturas" => $fatura]);
    }

    /*public function create()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                if (!isset($_GET['cliente_id'])) {
                    $this->getuser();
                } else {
                    $newCliente = User::find_by_id($_GET['cliente_id']);

                    $fatura = new Fatura();
                    $fatura->data = date_format(Carbon::now(), "Y-m-d");
                    $fatura->valortotal = 0;
                    $fatura->ivatotal = 0;
                    $fatura->estado = "por emitir";
                    $fatura->cliente_id = $newCliente->id;
                    $fatura->funcionario_id = $_SESSION['userID'];

                    if ($fatura->save()) {
                        $this->show($fatura->id);
                    } else {
                        $this->index();
                    }
                }
            }
        }
    */

    public function store()
    {
        $fatura = new Fatura($_POST);

        $fatura->valor = $_POST['valor'];
        $fatura->total = $_POST['total'];
        $fatura->ivatotal = $_POST['ivatotal'];
        $fatura->data = $_POST['data'];
        $fatura->estado = $_POST['estado'];
        $fatura->funcionario_id = $_POST['funcionario_id'];




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

  /*  public function show($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $fatura = Fatura::find_by_id($id);
            $cliente = User::find_by_id($fatura->cliente_id);
            $empresa = Empresa::find_by_id(1);
            $funcionario = User::find_by_id($fatura->funcionario_id);
            $linhasFatura = Linhafatura::find_all_by_fatura_id($fatura->id);

            $this->renderView('fatura/show', ['fatura' => $fatura, 'cliente' => $cliente, 'empresa' => $empresa, 'funcionario' => $funcionario, 'linhasFatura' => $linhasFatura]);

        }
    }
  */

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