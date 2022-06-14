<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">fatura Index</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Cria Nova Fatura</h3>
                <p>
                    <a href="router.php?c=fatura&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                        <th>
                            <h6>idfatura</h6>
                        </th>
                        <th>
                            <h6>valor</h6>
                        </th>
                        <th>
                            <h6>total</h6>
                        </th>
                        <th>
                            <h6>IVATotal</h6>
                        </th>
                        <th>
                            <h6>Data</h6>
                        </th>
                        <th>
                            <h6>estado</h6>
                        </th>
                    </thead>
                    <tbody>
                    <?php foreach ($faturas as $fatura) { ?>
                        <tr>

                            <td><?=$fatura->id?></td>
                            <td><?=$fatura->valor?></td>
                            <td><?=$fatura->total?></td>
                            <td><?=$fatura->ivatotal?></td>
                            <td><?=$fatura->data?></td>
                            <td><?=$fatura->estado?></td>
                            <td>


                                <a href="router.php?c=fatura&a=index&id=<?=$fatura->id?>" class="btn btn-info" role="button">Faturas</a>
                                <a href="router.php?c=fatura&a=show&id=<?=$fatura->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=fatura&a=edit&id=<?=$fatura->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=fatura&a=destroy&id=<?=$fatura->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>