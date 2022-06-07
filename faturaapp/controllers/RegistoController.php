<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class RegistoController extends  BaseAuthController
{
    public function fazRegisto()
    {
        $user = new User;
        if (isset($_POST['username'], $_POST['password'],$_POST['email'],
            $_POST['telefone'],$_POST['nif'],$_POST['morada'],$_POST['codigopostal'],$_POST['localidade']))

            if ($user->is_valid()) {
                $user->save();
                $this->redirectToRoute('login','getlogin');
            } else {
                $this->redirectToRoute('login','getregisto', ['user' => $user]);
            }

    }


    public function getRegisto()
    {

        $this->redirectToRoute('login','registo');
    }

    public function create()
    {

        $registo = User::all();
        $this->renderView("registo/create", ['registo' => $registo]);
    }
}