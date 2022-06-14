<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <?php
                if(is_null($taxa))
                {
                    ?>
                    <p>Taxa não entcontrada</p>
                    <?php
                }
                else
                {
                    ?>
                    ID da Taxa: <?= $taxa->id ?><br>
                    Percentagem<?= $taxa->percentagem ?><br>
                    Descricao <?= $taxa->descricao ?><br>
                    Vigor <?= $taxa->vigor ?><br>
                    <?php
                }
                ?>
            </div>
        </div>
        <a href="./router.php?c=taxas&a=index"><- Voltar</a>
    </div>
<?php require_once './views/layout/footer.php'; ?>