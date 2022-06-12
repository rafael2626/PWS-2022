<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Registar nova taxa</h3>
                <br>
                <label for="percentagem">Percentagem</label>
                <input type="text" name="percentagem" id="percentagem" class="form-control" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura->errors->on('percentagem') : '' ?>

                <label for="total">Descrição </label>
                <input type="text" name="descricao" id="descricao" class="form-control" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura ->errors->on('descricao') : '' ?>

                <label for="preco">Vigor: </label>
                <input type="text" name="vigor" id="vigor" class="form-control" maxlength="13" autocomplete="false">
                <?= isset($fatura->errors) ? $fatura->errors->on('vigor') : '' ?>

                <br>
                <br>
                <br>
                <br>
                <input type="submit" class="btn btn-success mt-2" value="Criar taxa">

                <a href="./router.php?c=taxas&a=index"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>