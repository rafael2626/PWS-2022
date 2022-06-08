<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
        <div class="row">
            <div class="col mt-2">
                <?php
                    if(is_null($fatura))
                    {
                        ?>
                            <p>Fatura não entcontrada</p>
                        <?php
                    }
                    else
                    {
                        ?>
                        ID da Fatura: <?= $fatura->id ?><br>
                        Password<?= $fatura->password ?><br>
                        Email <?= $fatura->email ?><br>
                        Telefone <?= $fatura->telefone ?><br>
                        NIF <?= $fatura->nif ?>
                        Morada: <?= $fatura->morada ?>
                        Codigopostal <?= $fatura->codigopostal ?>
                        Localidade <?= $fatura->localidade ?>
                        Role <?= $fatura->role ?>

                        <?php
                    }
                ?>
            </div>
        </div>
        <a href="./router.php?c=book&a=index"><- Voltar</a>
    </div>
<?php require_once './views/layout/footer.php'; ?>
