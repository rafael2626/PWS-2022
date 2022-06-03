<?php
require_once './controllers/BaseController.php';
require_once './models/Auth.php';

class BaseAuthController extends BaseController
{
    protected function loginFilter()
    {
        $auth = new Auth();

        if(!$auth->isLoggedIn())
        {
            header('Location: ./router.php?' . INVALID_ACCESS_ROUTE);
        }
    }
}