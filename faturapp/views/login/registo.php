<?php require_once './views/layout/header.php'; ?>
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
                <form action="../../router.php?c=login&a=login" method="post">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username"><br>
                    <?= isset($registo->errors) ? $registo->errors->on('username') : '' ?>

                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password"><br>
                    <?= isset($registo->errors) ? $registo->errors->on('password') : '' ?>


                    <label for="Email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                    <?= isset($registo->errors) ? $registo->errors->on('email') : '' ?>

                    <br>
                    <label for="Telefone">Telefone</label>
                    <input class="form-control" type="number" id="telefone" name="telefone">
                    <?= isset($registo->errors) ? $registo->errors->on('telefone') : '' ?>

                    <br>
                    <label for="NIF">NIF</label>
                    <input class="form-control" type="number" id="nif" name="nif">
                    <?= isset($registo->errors) ? $registo->errors->on('nif') : '' ?>

                    <br>
                    <label for="Morada">Morada</label>
                    <input class="form-control" type="text" id="morada" name="morada">
                    <?= isset($registo->errors) ? $registo->errors->on('morada') : '' ?>

                    <br>
                    <label for="Postal">Postal</label>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal">
                    <?= isset($registo->errors) ? $registo->errors->on('codigopostal') : '' ?>

                    <br>
                    <label for="localidade">Localidade</label>
                    <input class="form-control" type="text" id="localidade" name="localidade">
                    <?= isset($registo->errors) ? $registo->errors->on('localidade') : '' ?>

                    <br>
                    <input class="btn btn-primary" type="submit"
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>