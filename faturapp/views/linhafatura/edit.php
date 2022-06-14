<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar linha fatura</h3>
                <form action="./router.php?c=linhafatura&a=update&id=<?= $linhafatura->id ?>" method="post">
                    <label for="referencia">Quantidade</label>
                    <input type="text" name="linhafatura" id="linhafatura" class="form-control" value="<?= $linhafatura->quantidade ?>"
                    <?= isset($linhafatura->errors) ? ($linhafatura->errors)->on('referencia') : '' ?>

                    <label for="descricao">Valor: </label>
                    <input type="text" name="valor" id="valor" class="form-control"  value="<?= $linhafatura->descricao ?>"
                    <?= isset($linhafatura->errors) ? $linhafatura->errors->on('valor') : '' ?>

                    <label for="Stock">ValorIVA</label>
                    <input type="text" name="ValorIVA" id="ValorIVA" class="form-control"  value="<?= $linhafatura->ValorIVA ?>"
                    <?= isset($linhafatura->errors) ? $linhafatura->errors->on('valorIVA') : '' ?>




                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Linha de Fatura">
                </form>
                <br>
                <a href="./router.php?c=linhafatura&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>