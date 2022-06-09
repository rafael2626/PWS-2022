<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar produto</h3>
                <form action="./router.php?c=produtos&a=update&id=<?= $produtos->id ?>" method="post">
                    <label for="referencia">Referencia do produto </label>
                    <input type="text" name="referencia" id="referencia" class="form-control" value="<?= $produtos->referencia ?>"
                    <?= isset($produtos->errors) ? ($produtos->errors)->on('referencia') : '' ?>

                    <label for="descricao">Descricao: </label>
                    <input type="text" name="descricao" id="descricao" class="form-control"  value="<?= $produtos->descricao ?>"
                    <?= isset($produtos->errors) ? $produtos->errors->on('descricao') : '' ?>

                    <label for="Stock">Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control"  value="<?= $produtos->stock ?>"
                    <?= isset($produtos->errors) ? $produtos->errors->on('stock') : '' ?>


                    <label for="preco">Preço </label>
                    <input type="text" name="preco" id="preco" class="form-control"  value="<?= $produtos->preco ?>"
                    <?= isset($produtos->errors) ? $produtos->errors->on('preco') : '' ?>

                    <label for="iva_id">Iva</label>
                    <input type="text" name="iva_id" id="iva_id" class="form-control"  value="<?= $produtos->iva_id ?>"
                    <?= isset($produtos->errors) ? $produtos->errors->on('iva_id') : '' ?>


                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Produto">
                </form>
                <br>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>