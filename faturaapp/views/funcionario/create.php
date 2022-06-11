<?php require_once './views/layout/funcheader.php'; ?>
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
                <form action="router.php?c=funcionario&a=store" method="post" >

                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?=$funcionario->username?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('username') : '' ?>
                    <br>
                    <br>
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" value="<?=$funcionario->password?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('password') : '' ?>
                    <br>
                    <br>
                    <label for="Email">Email</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?=$funcionario->email?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('email') : '' ?>
                    <br>
                    <br>
                    <label for="Telefone">Telefone</label>
                    <input class="form-control" type="number" id="telefone" name="telefone" value="<?=$funcionario->telefone?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('telefone') : '' ?>
                    <br>
                    <br>
                    <label for="NIF">NIF</label>
                    <input class="form-control" type="number" id="nif" name="nif" value="<?=$funcionario->nif?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('nif') : '' ?>
                    <br>
                    <br>
                    <label for="Morada">Morada</label>
                    <input class="form-control" type="text" id="morada" name="morada" value="<?=$funcionario->morada?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('morada') : '' ?>
                    <br>
                    <br>
                    <label for="Postal">Postal</label>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal" value="<?=$funcionario->codigopostal?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('codigopostal') : '' ?>
                    <br>
                    <br>
                    <label for="localidade">Localidade</label>
                    <input class="form-control" type="text" id="localidade" name="localidade" value="<?=$funcionario->localidade?>">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('localidade') : '' ?>
                    <br>
                    <br>


                    <button class="btn btn-danger" type="submit">Registar Funcionario</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>