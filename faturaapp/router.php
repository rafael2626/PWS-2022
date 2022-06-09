<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/FaturaController.php';
require_once './controllers/AdminController.php';
require_once './controllers/FuncionarioController.php';
require_once './controllers/RegistoController.php';
require_once './controllers/ProdutosController.php';

require_once './controllers/ErrorController.php';

if (!isset($_GET['c'], $_GET['a'])) {
    $controller = new SiteController();
    $controller->index();
} else {

    $c = $_GET['c'];
    $a = $_GET['a'];

    switch ($c) {
        case "login":
            $controller = new LoginController();
            switch ($a) {
                case "index":
                    $controller->index();
                    break;

                case "logout":
                    $controller->logout();
                    break;
                default:
                    $controller->index();
            }
            break;
        case "registo":
            $controller = new RegistoController();
            switch ($a) {
                case "create":
                    $controller->create();
                    break;

                case "store":
                    $controller->store();
                    break;
            }
            break;
        case "func":
            $controller = new FuncionarioController();
            switch ($a) {
                case "create":
                    $controller->create();
                    break;
                case "index":
                    $controller->index();
                    break;
            }
            break;
        case "fatura":
            $controller = new FaturaController();
            switch ($a) {
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

        case "admin":
            $controller = new AdminController();
            switch ($a) {
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



        case 'produtos':
            $controller = new  ProdutosController();
            switch ($a) {
                case "index":
                    $controller->index();
                    break;

                case "show":
                    $controller->show();
                    break;

                case "create":
                    $controller->create();
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
            switch ($a) {
                case "index":
                    if (isset($_GET['callbackRoute'])) {
                        $controller->index($_GET['callbackRoute']);
                    } else {
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
