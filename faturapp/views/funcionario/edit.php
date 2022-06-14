<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar User</h3>


                <form action="./router.php?c=admin&a=update&id=<?= $funcionario->id ?>" method="post">


                    <label for="nome">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $funcionario->username ?>" autocomplete="false">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('username') : '' ?>


                    <label for="isbn">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="<?= $funcionario->password ?>" autocomplete="false">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('password') : '' ?>


                    <label for="Email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $funcionario->email ?>" autocomplete="false">
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('email') : '' ?>



                    <label for="isbn">Telefone</label>
                    <input type="number" name="telefone" id="telefone" class="form-control" value="<?= $funcionario->telefone ?>"
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('telefone') : '' ?>



                    <label for="nif">NIF</label>
                    <input type="number" name="nif" id="nif" class="form-control" value="<?= $funcionario->nif ?>"
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('nif') : '' ?>





                    <label for="morada">Morada</label>
                    <input type="text" name="morada" id="morada" class="form-control" value="<?= $funcionario->morada ?>"
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('morada') : '' ?>

                    <label for="codigopostal">CodigoPostal</label>
                    <input type="text" name="codigopostal" id="codigopostal" class="form-control" value="<?= $funcionario->codigopostal ?>"
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('codigopostal') : '' ?>


                    <label for="localidade">Localidade</label>
                    <input type="text" name="localidade" id="localidade" class="form-control" value="<?= $funcionario->localidade ?>"
                    <?= isset($funcionario->errors) ? $funcionario->errors->on('localidade') : '' ?>

                </form>
                <input type="submit" class="btn btn-success mt-2" value="Guardar Funcionário">
                <br>
                <br>
                <a href="./router.php?c=admin&a=index"><button class="btn btn-info">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>