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

                    <label for="telefone">Stock</label>
                    <input type="text" name="telefone" id="sttelefoneock" class="form-control"  value="<?= $empresa->telefone ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('telefone') : '' ?>


                    <label for="nif">Preço </label>
                    <input type="text" name="nif" id="nif" class="form-control"  value="<?= $empresa->nif ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('nif') : '' ?>

                    <label for="morada">Iva</label>
                    <input type="text" name="morada" id="morada" class="form-control"  value="<?= $empresa->morada ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('morada') : '' ?>

                    <label for="codigopostal">codigopostal</label>
                    <input type="text" name="codigopostal" id="codigopostal" class="form-control"  value="<?= $empresa->codigopostal ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('codigopostal') : '' ?>

                    <label for="localidade">localidade</label>
                    <input type="text" name="localidade" id="localidade" class="form-control"  value="<?= $empresa->localidade ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('localidade') : '' ?>


                    <label for="capital">capitalsocial</label>
                    <input type="text" name="capitalsocial" id="capitalsocial" class="form-control"  value="<?= $empresa->capitalsocial ?>"
                    <?= isset($empresa->errors) ? $empresa->errors->on('capitalsocial') : '' ?>


                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar empresa">
                </form>
                <br>
                <a href="./router.php?c=empresa&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>