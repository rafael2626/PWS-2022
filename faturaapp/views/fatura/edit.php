<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Editar livro</h3>
                <form action="./router.php?c=fatura&a=update&id=<?= $fatura->id ?>" method="post">
                    <label for="data">Data da Fatura </label>
                    <input type="text" name="data" id="data" class="form-control" value="<?= $fatura->data ?>"
                    <?= isset($fatura->errors) ? ($fatura->errors)->on('data') : '' ?>

                    <label for="iva">Valor IVA: </label>
                    <input type="text" name="iva" id="iva" class="form-control"  value="<?= $fatura->isbn ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('iva') : '' ?>

                    <label for="total">Total</label>
                    <input type="text" name="total" id="total" class="form-control"  value="<?= $fatura->total ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('total') : '' ?>


                    <label for="ivatotal">Valor IVA: </label>
                    <input type="text" name="ivatotal" id="ivatotal" class="form-control"  value="<?= $fatura->ivatotal ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('ivatotal') : '' ?>

                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control"  value="<?= $fatura->estado ?>"
                    <?= isset($fatura->errors) ? $fatura->errors->on('estado') : '' ?>

                        <?php
                        foreach($genre as $g)
                        {
                            if($book->genre_id == $g->id)
                            {
                                echo "<option value='" . $g->id . "' selected>" . $g->name . "</option>";
                            }
                            else
                            {
                                echo "<option value='" . $g->id . "'>" . $g->name . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-success mt-2" value="Guardar Livro">
                </form>
                <br>
                <a href="./router.php?c=book&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>