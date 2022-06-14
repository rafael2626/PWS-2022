<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($produto))
            {
                ?>
                <p>Produto não entcontrado</p>
                <?php
            }
            else
            {
                ?>
                ID da Fatura: <?= $produto->id ?><br>
                Password<?= $produto->password ?><br>
                Email <?= $produto->email ?><br>
                Telefone <?= $produto->telefone ?><br>
                NIF <?= $produto->nif ?>
                Morada: <?= $produto->morada ?>
                Codigopostal <?= $produto->codigopostal ?>
                Localidade <?= $produto->localidade ?>
                Role <?= $produto->role ?>

                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=produtos&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
