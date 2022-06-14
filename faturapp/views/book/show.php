<?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <?php
                    if(is_null($book))
                    {
                        ?>
                            Livro não encontrado
                        <?php
                    }
                    else
                    {
                        ?>
                        ID do livro: <?= $book->id ?><br>
                        Nome do livro: <?= $book->nome ?><br>
                        ISBN: <?= $book->isbn ?><br>

                        <?php
                    }
                ?>
            </div>
        </div>
        <a href="./router.php?c=book&a=index"><- Voltar</a>
    </div>
<?php require_once './views/layout/footer.php'; ?>
