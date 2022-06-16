<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <form action="router.php?c=produto&a=store" method="post" >
                <h3>Registar novo produto</h3>
                <br>
                <label for="referencia">Referencia</label>
                <input  type="text" name="referencia" id="referencia" class="form-control"
                <?= isset($produto->errors) ? $produto->errors->on('referencia') : '' ?>

                <label for="total">Descrição </label>
                <input type="text" name="descricao" id="descricao" class="form-control"
                <?= isset($produto->errors) ? $produto ->errors->on('descricao') : '' ?>

                <label for="preco">Preço: </label>
                <input type="text" name="preco" id="preco" class="form-control" maxlength="13"
                <?= isset($produto->errors) ? $produto->errors->on('preco') : '' ?>


                <label for="data">Stock:</label>
                <input type="text" name="stock" id="stock" class="form-control"
                <?= isset($produto->errors) ? $produto->errors->on('stock') : '' ?>
                <br>
                <br>
                <br>
                <br>

                    <input type="submit" class="btn btn-success mt-2" value="Criar Produto">
                    <a href="./router.php?c=produto&a=index" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>