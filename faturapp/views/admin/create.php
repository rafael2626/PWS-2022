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
                <form action="router.php?c=admin&a=store" method="post">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?=$registo->username?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('username') : '' ?>

                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password"value="<?= $registo->password ?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('password') : '' ?>


                    <label for="Email">Email</label>
                    <input class="form-control" type="text" id="email" name="email"value="<?= $registo->email ?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('email') : '' ?>

                    <br>
                    <label for="Telefone">Telefone</label>
                    <input class="form-control" type="number" id="telefone" name="telefone"value="<?= $registo->telefone ?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('telefone') : '' ?>

                    <br>
                    <label for="NIF">NIF</label>
                    <input class="form-control" type="number" id="nif" name="nif" value="<?= $registo->nif ?>"<br>
                    <?= isset($registo->errors) ? $registo->errors->on('nif') : '' ?>

                    <br>
                    <label for="Morada">Morada</label>
                    <input class="form-control" type="text" id="morada" name="morada"value="<?= $registo->morada ?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('morada') : '' ?>

                    <br>
                    <label for="Postal">Postal</label>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal"value="<?= $registo->codigopostal ?>"<br>
                    <?= isset($registo->errors) ? $registo->errors->on('codigopostal') : '' ?>

                    <br>
                    <label for="localidade">Localidade</label>
                    <input class="form-control" type="text" id="localidade" name="localidade"value="<?= $registo->localidade ?>"<br>
                    <?= isset($users->errors) ? $users->errors->on('localidade') : '' ?>

                    <br>
                   <button type="submit" class="btn btn-success">Registar Funcionario</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>