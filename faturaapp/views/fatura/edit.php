<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar livro</h3>
                <form action="./router.php?c=book&a=update&id=<?= $book->id ?>" method="post">
                    <label for="nome">Nome do Livro: </label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $book->nome ?>" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('nome') : '' ?>

                    <label for="isbn">ISBN: </label>
                    <input type="text" name="isbn" id="isbn" class="form-control" maxlength="13" value="<?= $book->isbn ?>" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('isbn') : '' ?>

                    <label for="genre_id">Genero</label>
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