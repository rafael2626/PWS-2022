<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class RegistoController extends  BaseAuthController
{
    public function store()
    {
        $user = new User();
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
//        if (isset($_POST['username'], $_POST['password'],$_POST['email'],
//            $_POST['telefone'],$_POST['nif'],$_POST['morada'],$_POST['codigopostal'],$_POST['localidade']))

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