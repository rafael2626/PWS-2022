<?php require_once './views/layout/funcheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">Book Index</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Create a new Book</h3>
                <p>
                    <a href="router.php?c=funcionario&a=create" class="btn btn-info" role="button">New</a>
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
                            <h6>empresa_id</h6>
                        </th>
                        <th>
                            <h6>username</h6>
                        </th>
                        <th>
                            <h6>password</h6>
                        </th>
                        <th>
                            <h6>email</h6>
                        </th>
                        <th>
                            <h6>telefone</h6>
                        </th>
                        <th>
                            <h6>nif</h6>
                        </th>
                        <th>
                            <h6>morada</h6>
                        </th>
                    </thead>
                    <tbody>
                    <?php foreach ($funcionario as $user) { ?>
                        <tr>

                            <td><?=$user->id?></td>
                            <td><?=$user->empresa_id?></td>
                            <td><?=$user->username?></td>
                            <td><?=$user->password?></td>
                            <td><?=$user->email?></td>
                            <td><?=$user->telefone?></td>
                            <td><?=$user->nif?></td>
                            <td><?=$user->morada?></td>
                            <td><?=$user->codigopostal?></td>
                            <td><?=$user->localidade?></td>
                            <td><?=$user->role?></td>
                        <td>


                                <a href="router.php?c=funcionario&a=index&id=<?=$user->id?>" class="btn btn-info" role="button">Chapters</a>
                                <a href="router.php?c=funcionario&a=show&id=<?=$user->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=funcionario&a=edit&id=<?=$user->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=funcionario&a=destroy&id=<?=$user->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>