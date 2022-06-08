<?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Registar novo capitulo</h3>
                <br>
                <form action="./router.php?c=chapter&a=store" method="post">
                    <input type="hidden" name="book_id" value="<?=$book_id?>">

                    <label for="name">Nome do Capitulo: </label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="false">
                    <?= isset($chapter->errors) ? $chapter->errors->on('name') : '' ?>

                    <input type="submit" class="btn btn-success mt-2" value="Guardar Capitulo">
                </form>
                <a href="./router.php?c=chapter&a=index&id=<?=$book_id?>"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>