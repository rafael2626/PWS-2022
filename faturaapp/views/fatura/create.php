<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Registar nova Fatura</h3>
                <br>
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" class="form-control" autocomplete="false">
                    <?= isset($fatura->errors) ? $fatura->errors->on('valor') : '' ?>

                    <label for="total">Total: </label>
                    <input type="text" name="total" id="total" class="form-control" maxlength="13" autocomplete="false">
                    <?= isset($fatura->errors) ? $fatura ->errors->on('total') : '' ?>

                   <label for="IVATotal">IVATotal: </label>
                    <input type="text" name="IVATotal" id="IVATotal" class="form-control" maxlength="13" autocomplete="false">
                    <?= isset($fatura->errors) ? $fatura->errors->on('IVATotal') : '' ?>


                    <label for="data">data:</label>
                    <input type="text" name="data" id="data" class="form-control" maxlength="13" autocomplete="false">
                    <?= isset($fatura->errors) ? $fatura->errors->on('data') : '' ?>


                    <label for="estado">estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <?php
                        foreach($estados as $e)
                        {
                            echo "<option value='" . $e->id . "'>" . $e->estado . "</option>";
                        }
                        ?>
                    </select>
                <br>
                <br>
                <br>
                <br>
                    <input type="submit" class="btn btn-success mt-2" value="Criar Fatura">

                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>