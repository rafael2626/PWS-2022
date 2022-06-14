<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($linhafatura))
            {
                ?>
                <p>Produto não entcontrado</p>
                <?php
            }
            else
            {
                ?>
                ID da linha Fatura: <?= $linhafatura->id ?><br>
                Quantidade<?= $linhafatura->quantidade ?><br>
                Valor <?= $linhafatura->valor ?><br>
                ValorIVA <?= $linhafatura->valorIVA ?><br>

                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=linhafaturax&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
