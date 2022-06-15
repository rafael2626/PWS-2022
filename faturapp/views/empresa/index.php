<?php require_once './views/layout/funcheader.php'; ?>
        <style>
            table {

                width: 320px;
                padding: 10px;
                border: 5px solid gray;
                margin: 0;
            }
        </style>

    <div class="container">

        <h2 class="text-left top-space">Empresa</h2>
        <h2 class="top-space"></h2>
        <div class="row">

            <div class="col-sm-6">
                <h3>Criar Novo Produto</h3>
                <p>
                    <a href="router.php?c=empresa&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h6>Designação Social</h6>
                    </th>
                    <th>
                        <h6>Email</h6>
                    </th>
                    <th>
                        <h6>Telefone</h6>
                    </th>
                    <th>
                        <h6>Nif</h6>
                    </th>
                    <th>
                        <h6>Morada</h6>
                    </th>
                    <th>
                        <h6>Código Postal</h6>
                    </th>
                    <th>
                        <h6>localidade</h6>
                    </th>
                    <th>
                        <h6>Capital Social</h6>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($empresa as $empresa) { ?>
                        <tr>

                            <td><?=$empresa->designacaosocial?></td>
                            <td><?=$empresa->email?></td>
                            <td><?=$empresa->telefone?></td>
                            <td><?=$empresa->nif?></td>
                            <td><?=$empresa->morada?></td>
                            <td><?=$empresa->codigopostal?></td>
                            <td><?=$empresa->localidade?></td>
                            <td><?=$empresa->capitalsocial?></td>
                            <td>


                                <a href="router.php?c=empresa&a=index&id=<?=$empresa->id?>" class="btn btn-info" role="button">empresa</a>
                                <a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=empresa&a=destroy&id=<?=$empresa->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>