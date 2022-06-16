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



                            <h1>E-Fatura</h1>
                        ID da Fatura: <?= $fatura->id ?><br>
                        Valor: <?= $fatura->valor?><br>
                        Total : <?= $fatura->total?><br>
                        Iva Total:  <?= $fatura->ivatotal?><br>
                        Data:<?= $fatura->data?><br>
                        Estado:<?= $fatura->estado?><br>
                        <?php
                    }
                ?>
            </div>
        </div>
        <a href="./router.php?c=fatura&a=index"><- Voltar</a>
    </div>
<?php require_once './views/layout/footer.php'; ?>
