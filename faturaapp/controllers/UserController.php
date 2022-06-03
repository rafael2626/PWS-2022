<?php
require_once  'controllers/BaseController.php';
class UserController extends  BaseController
{
    public function registo()
    {

        $user = User::all();
        $this->renderView("login/registo", ['user' => $user]);
    }
}