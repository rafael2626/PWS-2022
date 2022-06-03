<?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Registarsss novo livro</h3>
                <br>
                <form action="./router.php?c=book&a=store" method="post">
                    <label for="nome">Nome do Livro: </label>
                    <input type="text" name="nome" id="nome" class="form-control" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('nome') : '' ?>

                    <label for="isbn">ISBN: </label>
                    <input type="text" name="isbn" id="isbn" class="form-control" maxlength="13" autocomplete="false">
                    <?= isset($book->errors) ? $book->errors->on('isbn') : '' ?>

                    <label for="genre_id">Genero</label>
                    <select name="genre_id" id="genre_id" class="form-control">

                        <?php
                        foreach($genre as $g)
                        {
                            echo "<option value='" . $g->id . "'>" . $g->name . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success mt-2" value="Criar Fatura">



                </form>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>