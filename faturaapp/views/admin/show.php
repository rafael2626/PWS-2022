<?php require_once './views/layout/adminheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($admin))
            {
                ?>
                <p>Fatura não entcontrada</p>
                <?php
            }
            else
            {
                ?>
                ID do user: <?= $admin->id ?><br>
                Data da Fatura: <?= $admin->username ?><br>
                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=book&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
