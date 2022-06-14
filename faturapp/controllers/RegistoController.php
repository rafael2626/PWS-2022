<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class RegistoController extends  BaseController
{
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
        $user->role = $_POST['role'];
            if ($user->is_valid()) {
                $user->save();
                $this->redirectToRoute('login','index');
            } else {
                $this->renderView("registo/create", ['registo' => $user]);
            }

    }


    public function create()
    {
        $registo = new User();
        $this->renderView("registo/create", ['registo' => $registo]);
    }

}