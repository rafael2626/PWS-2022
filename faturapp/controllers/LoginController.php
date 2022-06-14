<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class LoginController extends BaseController
{
    public function login()
    {
        if (isset($_POST['username'], $_POST['password'])) {
            $auth = new Auth();
            if ($auth->checkLogin($_POST['username'], $_POST['password']))

                switch ($auth->getRole()) {
                    case 'admin':
                        $this->redirectToRoute('admin', 'index');
                        break;
                    case 'funcionario':
                        $this->redirectToRoute('funcionario', 'index');
                        break;
                    case 'cliente':
                        $this->redirectToRoute('site', 'index');
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
    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute('site', 'index');
    }

}