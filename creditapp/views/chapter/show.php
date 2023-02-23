<?php require_once './views/layout/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <?php
            if(is_null($chapter))
            {
                ?>
                Capitulo não encontrado
                <?php
            }
            else
            {
                ?>
                ID do capitulo: <?= $chapter->id ?><br>
                Nome do capitulo: <?= $chapter->name ?><br>
                Livro: <?= $chapter->book->nome ?><br>
                Genero do livro: <?= $chapter->book->genre->name ?>
                <?php
            }
            ?>
        </div>
    </div>
    <a href="./router.php?c=chapter&a=index&id=<?= $chapter->book->id ?>"><- Voltar</a>
</div>
<?php require_once './views/layout/footer.php'; ?>
