<?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar Capitulo</h3>
                <form action="./router.php?c=chapter&a=update&id=<?= $chapter->id ?>" method="post">
                    <label for="name">Nome do Capitulo: </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $chapter->name ?>" autocomplete="false">
                    <?= isset($chapter->errors) ? $chapter->errors->on('name') : '' ?>
                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Capitulo">
                </form>
                <br>
                <a href="./router.php?c=book&a=index&id=<?= $chapter->book->id ?>"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>