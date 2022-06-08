<?php require_once './views/layout/adminheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($user))
            {
                ?>
                <p>Fatura não entcontrada</p>
                <?php
            }
            else
            {
                ?>
                ID do user: <?= $user->id ?><br>
                Data da Fatura: <?= $user->data ?><br>
                Valor Total: <?= $user->total ?><br>
                Iva Total: <?= $user->ivatotal ?>
                Estado: <?= $user->estado ?>
                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=book&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
