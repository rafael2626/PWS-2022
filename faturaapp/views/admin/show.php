<?php require_once './views/layout/adminheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($admin))
            {
                ?>
                <p>Funcionário não entcontrado</p>
                <?php
            }
            else
            {
                ?>
                ID do user: <?= $admin->id ?><br>
                Username: <?= $admin->username ?><br>
                Password: <?= $admin->password ?><br>
                Email: <?= $admin->email?><br>
                Telefone: <?= $admin->telefone?><br>
                NIF:<?= $admin->nif?><br>
                Morada:<?= $admin->morada?><br>
                Codigo-Postal: <?= $admin->codigopostal?><br>
                Localidade: <?= $admin->localidade?><br>
                Role:<?= $admin->role?><br>

                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=admin&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
