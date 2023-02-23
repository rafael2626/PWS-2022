<?php require_once './views/layout/header.php'; ?>
    <div class="container">
        <h2 class="text-left top-space">Book Index</h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-6">
                <h3>Create a new Chapter</h3>
                <p>
                    <a href="router.php?c=chapter&a=create&id=<?=$book->id ?>" class="btn btn-info" role="button">New</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped"><thead><th><h3>Id</h3></th><th><h3>Name</h3></th><th><h3>User Actions</h3></th></thead>
                    <tbody>
                    <?php foreach ($book->chapters as $chapter) { ?>
                        <tr>
                            <td><?=$chapter->id?></td>
                            <td><?=$chapter->name?></td>
                            <td>
                                <a href="router.php?c=chapter&a=show&id=<?=$chapter->id?>" class="btn btn-info" role="button">Show</a>
                                <a href="router.php?c=chapter&a=edit&id=<?=$chapter->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?c=chapter&a=destroy&id=<?=$chapter->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>