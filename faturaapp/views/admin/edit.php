<?php require_once './views/layout/adminheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar User</h3>


                <form action="./router.php?c=book&a=update&id=<?= $admin->iduser ?>" method="post">


                    <label for="nome">Username</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $admin->username ?>" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('nome') : '' ?>


                    <label for="isbn">Password</label>
                    <input type="text" name="password" id="password" class="form-control" maxlength="13" value="<?= $admin->isbn ?>" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('isbn') : '' ?>

                    <label for="genre_id">email</label>
                    <select name="genre_id" id="genre_id" class="form-control">


                        <?php
                        foreach($genre as $g)
                        {
                            if($book->genre_id == $g->id)
                            {
                                echo "<option value='" . $g->id . "' selected>" . $g->name . "</option>";
                            }
                            else
                            {
                                echo "<option value='" . $g->id . "'>" . $g->name . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Livro">
                </form>
                <br>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>