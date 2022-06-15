<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">Taxas</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Cria Nova Taxa</h3>
                <p>
                    <a href="router.php?c=iva&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h6>id</h6>
                    </th>
                    <th>
                        <h6>percentagem</h6>
                    </th>
                    <th>
                        <h6>descricao</h6>
                    </th>
                    <th>
                        <h6>vigor</h6>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($iva as $iva) { ?>
                        <tr>

                            <td><?=$iva->id?></td>
                            <td><?=$iva->percentagem?></td>
                            <td><?=$iva->descricao?></td>
                            <td><?=$iva->vigor?></td>
                            <td>


                                <a href="router.php?c=iva&a=index&id=<?=$iva->id?>" class="btn btn-info" role="button">Taxas</a>
                                <a href="router.php?c=iva&a=show&id=<?=$iva->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=iva&a=destroy&id=<?=$iva->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>