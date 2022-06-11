<?php require_once './views/layout/adminheader.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">User Index</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Create a User</h3>
                <p>
                    <a href="router.php?c=registo&a=create" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h8>iduser</h8>
                    </th>
                    <th>
                        <h8>idempresa</h8>
                    </th>
                    <th>
                        <h8>Username</h8>
                    </th>
                    <th>
                        <h8>Password</h8>
                    </th>
                    <th>
                        <h8>Email</h8>
                    </th>
                    <th>
                        <h8>Telefone</h8>
                    </th>
                    <th>
                        <h8>Nif</h8>
                    </th>
                    <th>
                        <h8>Morada</h8>
                    </th>
                    <th>
                        <h8>CodigoPostal</h8>
                    </th>
                    <th>
                        <h8>Localidade</h8>
                    </th>
                    <th>
                        <h8>Role</h8>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) { ?>
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

                                <a href="router.php?c=admin&a=show&id=<?=$user->id ?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=admin&a=edit&id=<?=$user->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=admin&a=destroy&id=<?=$user->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>