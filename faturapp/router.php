<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/FaturaController.php';
require_once './controllers/AdminController.php';
require_once './controllers/FuncionarioController.php';
require_once './controllers/RegistoController.php';
require_once './controllers/ProdutoController.php';
require_once './controllers/LinhafaturaController.php';
require_once './controllers/IvaController.php';
require_once './controllers/ClienteController.php';

require_once './controllers/EmpresaController.php';
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
                case "login":
                    $controller->login();
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
        case "funcionario":
            $controller = new FuncionarioController();
            switch ($a) {
                case "create":
                    $controller->create();
                    break;
                case "index":
                    $controller->index();
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

                case "show":
                    $controller->show($_GET['id']);
                    break;

                case "destroy":
                    $controller->delete($_GET['id']);
                    break;
                default:
                    $controller->index();
            }
            break;

        case "linhafatura":
            $controller = new LinhafaturaController();
            switch ($a) {
                case "create":
                    $controller->create($_GET['id']);
                    break;
                case "index":
                    $controller->index();
                    break;
                case "store":
                    $controller->store($_GET['id']);
                    break;
                case "edit":
                    $controller->edit($_GET['id']);
                    break;

                case "update":
                    $controller->update($_GET['id']);
                    break;

                case "show":
                    $controller->show($_GET['id']);
                    break;

                case "destroy":
                    $controller->delete($_GET['id']);
                    break;
            }
            break;
        case "cliente":
            $controller = new ClienteController();
            switch ($a) {
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



        case 'produto':
            $controller = new  ProdutoController();
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

        case 'iva':
            $controller = new  IvaController();
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

        case 'empresa':
            $controller = new  EmpresaController();
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
