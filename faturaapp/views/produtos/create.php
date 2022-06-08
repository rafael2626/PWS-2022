<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Registar novo produto</h3>
                <br>
                <label for="refencia">Referencia</label>
                <input type="text" name="refencia" id="refencia" class="form-control" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura->errors->on('refencia') : '' ?>

                <label for="total">Descrição </label>
                <input type="text" name="descricao" id="descricao" class="form-control" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura ->errors->on('descricao') : '' ?>

                <label for="preco">Preço: </label>
                <input type="text" name="preco" id="preco" class="form-control" maxlength="13" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura->errors->on('preco') : '' ?>


                <label for="data">Stock:</label>
                <input type="text" name="stock" id="stock" class="form-control" maxlength="13" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura->errors->on('stock') : '' ?>
                <br>
                <br>
                <br>
                <br>
                <input type="submit" class="btn btn-success mt-2" value="Criar Produto">

                <a href="./router.php?c=produto&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>