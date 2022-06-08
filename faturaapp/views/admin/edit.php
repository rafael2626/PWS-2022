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
                    <input type="text" name="password" id="password" class="form-control" maxlength="13" value="<?= $admin->password ?>" autocomplete="false">
                    <?= isset($admin->errors) ? $admin->errors->on('password') : '' ?>

                    <label for="genre_id">email</label>
                    <select name="genre_id" id="genre_id" class="form-control">


                        <input type="submit" class="btn btn-success mt-2" value="Guardar Livro">
                </form>
                <br>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>