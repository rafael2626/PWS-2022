<?php require_once './views/layout/adminheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <?php
            if(isset($erro))
            {
                echo "Erro: " . $erro;
            }
            ?>
            <br>
            <br>
            <form action="router.php?c=admin&a=index" method="post">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username"><br>
                <?= isset($registo->errors) ? $registo->errors->on('username') : '' ?>

                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password"><br>
                <?= isset($registo->errors) ? $registo->errors->on('password') : '' ?>
                <br>
                <a href="router.php?c=admin&a=index"><button class="btn btn-danger">Registar Funcionario</button></a>

            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php require_once './views/layout/footer.php'; ?>