<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($produto))
            {
                ?>
                <p>Produto não encontrado</p>
                <?php
            }
            else
            {
                ?>
                Id do produto: <?= $produto->id ?><br>
                Referência: <?= $produto->referencia ?><br>
                Descrição: <?= $produto->descricao ?><br>
                Stock: <?= $produto->stock ?><br>
                Preço: <?= $produto->preco ?>

                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=produto&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
