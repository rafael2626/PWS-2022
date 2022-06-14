<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <form action="router.php?c=linhafatura&a=store&id=<?=$id?>" method="post" >

                <h3>Criar nova linha de fatura</h3>
                <br>
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="quantidade" class="form-control" value="<?=$linhafatura->quantidade?>">
                <?= isset($linhafatura->errors) ? $linhafatura->errors->on('quantidade') : '' ?>


                <label for="referencia">Referencia Produto </label>
                <input type="text" name="referencia" id="referencia" class="form-control">
                <?= isset($linhafatura->errors) ? $linhafatura->errors->on('referencia') : '' ?>



                    <button type="submit" class="btn btn-primary">Registar linha fatura</button>
            </div>
        </div>
    </div>
                </form>

<?php require_once './views/layout/footer.php'; ?>