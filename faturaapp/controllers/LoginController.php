<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class LoginController extends BaseController
{
    public function doLogin()
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
       public function fazRegisto()
        {


            $user = new User(Post::getAll());
       'fazer de todos os dados'


                if ($user->is_valid()) {
                    $user->save();
                    $this->redirectToRoute('login','getlogin');
                } else {
                    $this->redirectToRoute('login','getregisto', ['user' => $user]);
                 }

        }
    }