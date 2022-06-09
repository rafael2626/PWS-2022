<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">Book Index</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Cria Novo Produto</h3>
                <p>
                    <a href="router.php?c=produtos&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h6>idproduto</h6>
                    </th>
                    <th>
                        <h6>referencia</h6>
                    </th>
                    <th>
                        <h6>descricao</h6>
                    </th>
                    <th>
                        <h6>stock</h6>
                    </th>
                    <th>
                        <h6>preco</h6>
                    </th>
                    <th>
                        <h6>iva_id</h6>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>

                            <td><?=$produto->id?></td>
                            <td><?=$produto->referencia?></td>
                            <td><?=$produto->descricao?></td>
                            <td><?=$produto->stock?></td>
                            <td><?=$produto->preco?></td>
                            <td><?=$produto->iva_id?></td>
                            <td>


                                <a href="router.php?c=produtos&a=index&id=<?=$produto->id?>" class="btn btn-info" role="button">Produtos</a>
                                <a href="router.php?c=produtos&a=show&id=<?=$produto->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=produtos&a=edit&id=<?=$produto->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=produtos&a=destroy&id=<?=$produto->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>