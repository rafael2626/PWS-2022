<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar taxas</h3>
                <form action="./router.php?c=taxas&a=update&id=<?= $taxas->id ?>" method="post">
                    <label for="percentagem">Percentagem </label>
                    <input type="text" name="percentagem" id="percentagem" class="form-control" value="<?= $taxas->percentagem ?>"
                    <?= isset($taxas->errors) ? ($taxas->errors)->on('percentagem') : '' ?>

                    <label for="descricao">Descricao: </label>
                    <input type="text" name="descricao" id="descricao" class="form-control"  value="<?= $taxas->descricao ?>"
                    <?= isset($taxas->errors) ? $taxas->errors->on('descricao') : '' ?>

                    <label for="vigor">Vigor</label>
                    <input type="text" name="vigor" id="vigor" class="form-control"  value="<?= $taxas->vigor ?>"
                    <?= isset($taxas->errors) ? $taxas->errors->on('vigor') : '' ?>

                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Produto">
                </form>
                <br>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>