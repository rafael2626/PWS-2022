<?php
require_once './controllers/BaseController.php';
require_once './controllers/BaseAuthController.php';

class FuncionarioController extends  BaseController
{

    public  function  index()
    {
        $funcionario = User::all();
        $this->renderView("funcionario/index", ['users' => $funcionario]);
    }
    public  function  create()
    {
        $funcionario = new User();
        $this->renderView("funcionario/create", ['funcionario' => $funcionario]);
    }
    public function store()
    {
        $user = new User();
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->email = $_POST['email'];
        $user->telefone = $_POST['telefone'];
        $user->nif = $_POST['nif'];
        $user->morada = $_POST['morada'];
        $user->codigopostal = $_POST['codigopostal'];
        $user->localidade = $_POST['localidade'];
        $user->role = 'cliente';
        if ($user->is_valid()) {
            $user->save();
            $this->redirectToRoute('login','index');
        } else {
            $this->renderView("funcionario/create", ['funcionario' => $user]);
        }

    }


    public function edit($id)
    {

        try{
            $funcionario = User::find([$id]);

            $this->renderView("funcionario/edit", ['funcionario' => $funcionario]);
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("funcionario/show", ['funcionario' => null]);
        }
    }

    public function update($id)
    {
        $this->loginFilter();
        try{
            $funcionario = User::find([$id]);
            $funcionario->update_attributes($_POST);

            if($funcionario->is_valid())
            {
                $funcionario->save();
                $this->redirectToRoute("funcionario", "index");
            }
            else
            {

                $this->renderView("funcionario/edit", ["funcionario" => $funcionario]);
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("funcionario/show", ['funcionario' => null]); // usar mesmo o do “show” porque faz a mesma coisa
        }
    }

    public function delete($id)
    {
        try{
            $funcionario = User::find([$id]);
            if($funcionario->delete())
            {
                $this->redirectToRoute("funcionario", "index");
            }
            else
            {
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.1 404 Not Found");
            $this->renderView("funcionario/show", ['func' => null]); // usar o “show” porque mostra o erro
        }
        catch(Exception $other)
        {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }
    public function show($id)
    {


        try{
            $funcionario = User::find([$id]);
            $this->renderView("funcionario/show", ['funcionario' => $funcionario]);
        }
        catch (RecordNotFound $ex)
        {
            $this->redirectToRoute("error", "index", ['callbackRoute' => 'funcionario/index']);
        }
    }
    public function destroy($id)
    {

        try
        {
            $funcionario =User::find([$id]);

            // Obter o id do livro associado para depois poder enviar o utilizador para a lista de capítulos correta
            $funcionario = $funcionario->id;

            if($funcionario->delete())
            {
                $this->redirectToRoute("funcionario", "index", ["id" => $funcionario]);
            }
            else
            {
                // Erro ao apagar
            }
        }
        catch (RecordNotFound $ex)
        {
            header("HTTP/1.0 404 Not Found");
            $this->renderView("funcionario/show", ["funcionario" => null]);
        }
        catch (Exception $other)
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }
}
