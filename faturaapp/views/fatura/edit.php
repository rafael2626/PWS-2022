<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar Fatura</h3>
                <form action="./router.php?c=fatura&a=update&id=<?= $fatura->id ?>" method="post">
                    <label for="data">Data da Fatura </label>
                    <input type="text" name="data" id="data" class="form-control" value="<?= $fatura->data ?>"
                    <?= isset($fatura->errors) ? ($fatura->errors)->on('data') : '' ?>



                    <label for="total">Total</label>
                    <input type="text" name="total" id="total" class="form-control"  value="<?= $fatura->total ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('total') : '' ?>
                    <br>

                    <label for="ivatotal">Valor IVA: </label>
                    <input type="text" name="ivatotal" id="ivatotal" class="form-control"  value="<?= $fatura->ivatotal ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('ivatotal') : '' ?>
                    <br>
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control"  value="<?= $fatura->estado ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('estado') : '' ?>
                    <br>




                </form>
                <a href="./router.php?c=fatura&a=index"><button class="btn btn-info">Guardar Fatura</button></a>
                <br>
                <br>
                <a href="./router.php?c=fatura&a=index"><button class="btn btn-info">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>