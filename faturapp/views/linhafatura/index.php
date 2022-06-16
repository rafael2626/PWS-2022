<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">Produtos</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Criar Novo Produto</h3>
                <p>
                                <a href="router.php?c=linhafatura&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h6>Quantidade</h6>
                    </th>
                    <th>
                        <h6>Valor</h6>
                    </th>
                    <th>
                        <h6>ValorIVA</h6>
                    </th>
                    <th>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($linhafaturas as $linhafatura) { ?>
                        <tr>

                            <td><?=$linhafatura->id?></td>
                            <td><?=$linhafatura->quantidade?></td>

                            <td><?=$linhafatura->valor?></td>
                            <td><?=$linhafatura->valorIVA?></td>

                            <td>


                                <a href="router.php?c=linhafatura&a=show&id=<?=$linhafatura->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=linhafatura&a=edit&id=<?=$linhafatura->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=linhafatura&a=destroy&id=<?=$linhafatura->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>