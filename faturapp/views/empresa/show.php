<?php require_once './views/layout/funcheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($empresa))
            {
                ?>
                <p>Empresa não encontrada</p>
                <?php
            }
            else
            {
                ?>
                Id do produto: <?= $empresa->id ?><br>
                Designação Social: <?= $empresa->designacaosocial ?><br>
                Email: <?= $empresa->email ?><br>
                Telefone: <?= $empresa->telefone ?><br>
                Nif: <?= $empresa->nif ?>
                Morada: <?= $empresa->morada ?><br>
                Código Postal: <?= $empresa->codigopostal ?><br>
                Localidade: <?= $empresa->localidade ?><br>
                Capital Social: <?= $empresa->capitalsocial ?>
                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=empresa&a=index"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
