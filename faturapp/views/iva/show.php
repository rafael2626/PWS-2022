<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <?php
                if(is_null($iva))
                {
                    ?>
                    <p>Taxa não encontrada</p>
                    <?php
                }
                else
                {
                    ?>
                    ID da Taxa: <?= $iva->id ?><br>
                    Percentagem<?= $iva->percentagem ?><br>
                    Descricao <?= $iva->descricao ?><br>
                    Vigor <?= $iva->vigor ?><br>
                    <?php
                }
                ?>
            </div>
        </div>
        <a href="./router.php?c=iva&a=index"><- Voltar</a>
    </div>
<?php require_once './views/layout/footer.php'; ?>