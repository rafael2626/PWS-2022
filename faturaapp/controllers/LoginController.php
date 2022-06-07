<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class LoginController extends BaseController
{
    public function Login()
    {
        if (isset($_POST['username'], $_POST['password'])) {
            $auth = new Auth();
            if ($auth->checkLogin($_POST['username'], $_POST['password']))

                switch ($auth) {
                    case 'administrador':
                        $this->redirectToRoute('admin', 'index');
                        break;
                    case 'funcionario':
                        $this->redirectToRoute('funcionario', 'index');
                        break;
                    case 'cliente':
                        $this->redirectToRoute('cliente', 'index');
                        break;
                    default:
                        $this->redirectToRoute('login', 'getlogin');
                }
        }

    }
    public  function  index()
    {

        $login = User::all();
        $this->renderView("login/index", ['users' => $login]);
    }

}