<html>
<head>
    <title><?= APP_NAME ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./router.php"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./router.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($username))
                    {
                        ?>
                        <a class="nav-link" href="./router.php?c=login&a=logout">Logout (<?= $username ?>)</a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a class="nav-link" href="./router.php?c=fatura&a=index">Cliente</a>
                        <?php
                    }
                    ?>
                </li>
                <?php
                if(isset($username))
                {
                    ?>
                    <li>
                    </li>
                    <li>

                    </li>
                    <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestao de Funcinários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./router.php?c=registo&a=create">Criar Funcionários</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>