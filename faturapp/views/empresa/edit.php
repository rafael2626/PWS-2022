<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar empresa</h3>
                <form action="./router.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">
                    <label for="designacaosocial">Designação social </label>
                    <input type="text" name="designacaosocial" id="designacaosocial" class="form-control" value="<?= $empresa->designacaosocial ?>"
                    <?= isset($empresa->errors) ? ($empresa->errors)->on('designacaosocial') : '' ?>

                    <label for="email">email: </label>
                    <input type="text" name="email" id="email" class="form-control"  value="<?= $empresa->email ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('email') : '' ?>

                    <label for="Stock">Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control"  value="<?= $empresa->stock ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('stock') : '' ?>


                    <label for="preco">Preço </label>
                    <input type="text" name="preco" id="preco" class="form-control"  value="<?= $empresa->preco ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('preco') : '' ?>

                    <label for="iva_id">Iva</label>
                    <input type="text" name="iva_id" id="iva_id" class="form-control"  value="<?= $empresa->iva_id ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('iva_id') : '' ?>


                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar empresa">
                </form>
                <br>
                <a href="./router.php?c=empresa&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>