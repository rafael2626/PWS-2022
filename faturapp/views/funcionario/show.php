<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($funcionario))
            {
                ?>
                <p>Funcionário não entcontrado</p>
                <?php
            }
            else
            {
                ?>
                ID do user: <?= $funcionario->id ?><br>
                Username: <?= $funcionario->username ?><br>
                Password: <?= $funcionario->password ?><br>
                Email: <?= $funcionario->email?><br>
                Telefone: <?= $funcionario->telefone?><br>
                NIF:<?= $funcionario->nif?><br>
                Morada:<?= $funcionario->morada?><br>
                Codigo-Postal: <?= $funcionario->codigopostal?><br>
                Localidade: <?= $funcionario->localidade?><br>
                Role:<?= $funcionario->role?><br>

                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=funcionario&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
