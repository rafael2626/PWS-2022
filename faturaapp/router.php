<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/PlanoController.php';
require_once './controllers/BookController.php';
require_once './controllers/FaturaController.php';
require_once './controllers/ChapterController.php';
require_once './controllers/UserController.php';
require_once './controllers/ErrorController.php';

if(!isset($_GET['c'], $_GET['a']))
{
    // omissão, enviar para site
    $controller = new SiteController();
    $controller->index();
}
else
{
    // existem parametros definidos
    $c = $_GET['c'];
    $a = $_GET['a'];

    switch ($c)
    {
        case "registo":
            $controller = new UserController();
            switch ($a)
            {
                case "registo":
                    $controller->registo();
                    break;

                case "login":
                    $controller->login();
                    break;

                case "logout":
                    $controller->logout();

                default:
                    $controller->index();
            }
            break;

        case "fatura":
            $controller = new FaturaController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;
                case "create":
                    $controller->create();
                    break;
                default:
                    $controller->index();
            }
            break;

        case "site":
            $controller = new SiteController();
            $controller->index();
            break;

        case "book":
            $controller = new BookController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "show":
                    $controller->show($_GET['id']);
                    break;

                case "create":
                    $controller->create();
                    break;

                case "store":
                    $controller->store();
                    break;

                case "edit":
                    $controller->edit($_GET['id']);
                    break;

                case "update":
                    $controller->update($_GET['id']);
                    break;

                case "destroy":
                    $controller->delete($_GET['id']);
                    break;

                default:
                    $controller->index();
            }
            break;

        case "chapter":
            $controller = new ChapterController();
            switch($a)
            {
                case "index":
                    $controller->index($_GET['id']);
                    break;

                case "show":
                    $controller->show($_GET['id']);
                    break;

                case "create":
                    $controller->create($_GET['id']);
                    break;

                case "edit":
                    $controller->edit($_GET['id']);
                    break;

                case "update":
                    $controller->update($_GET['id']);
                    break;

                case "store":
                    $controller->store();
                    break;

                case "destroy":
                    $controller->destroy($_GET['id']);
                    break;
            }
            break;

        case "error":
            $controller = new ErrorController();
            switch($a)
            {
                case "index":
                    if(isset($_GET['callbackRoute']))
                    {
                        $controller->index($_GET['callbackRoute']);
                    }
                    else
                    {
                        $controller->index(null);
                    }
                    break;
            }
            break;

        default:
            $controller = new SiteController();
            $controller->index();
    }

}