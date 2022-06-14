<?php require_once './views/layout/adminheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar User</h3>


                <form action="./router.php?c=admin&a=update&id=<?= $admin->id ?>" method="post">


                    <label for="nome">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $admin->username ?>" autocomplete="false">
                    <?= isset($admin->errors) ? $admin->errors->on('username') : '' ?>


                    <label for="isbn">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="<?= $admin->password ?>" autocomplete="false">
                    <?= isset($admin->errors) ? $admin->errors->on('password') : '' ?>


                    <label for="Email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $admin->email ?>" autocomplete="false">
                    <?= isset($admin->errors) ? $admin->errors->on('email') : '' ?>



                    <label for="isbn">Telefone</label>
                    <input type="number" name="telefone" id="telefone" class="form-control" value="<?= $admin->telefone ?>"
                    <?= isset($admin->errors) ? $admin->errors->on('telefone') : '' ?>



                    <label for="nif">NIF</label>
                    <input type="number" name="nif" id="nif" class="form-control" value="<?= $admin->nif ?>"
                    <?= isset($admin->errors) ? $admin->errors->on('nif') : '' ?>





                    <label for="morada">Morada</label>
                    <input type="text" name="morada" id="morada" class="form-control" value="<?= $admin->morada ?>"
                    <?= isset($admin->errors) ? $admin->errors->on('morada') : '' ?>

                    <label for="codigopostal">CodigoPostal</label>
                    <input type="text" name="codigopostal" id="codigopostal" class="form-control" value="<?= $admin->codigopostal ?>"
                    <?= isset($admin->errors) ? $admin->errors->on('codigopostal') : '' ?>


                    <label for="localidade">Localidade</label>
                    <input type="text" name="localidade" id="localidade" class="form-control" value="<?= $admin->localidade ?>"
                    <?= isset($admin->errors) ? $admin->errors->on('localidade') : '' ?>

                </form>
                <input type="submit" class="btn btn-success mt-2" value="Guardar Funcionário">
                <br>
                <br>
                <a href="./router.php?c=admin&a=index"><button class="btn btn-info">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>