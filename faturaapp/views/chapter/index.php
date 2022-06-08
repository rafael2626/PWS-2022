<?php require_once './views/layout/funcheader.php'; ?>
    <table class="table tablestriped"><thead><th><h3>Id</h3></th><th><h3>Name</h3></th><th><h3>Use
            r Actions</h3></th></thead>
    <tbody>
    <?php foreach ($book->chapters as $chapter) { ?>
        <tr>
            <td><?=$chapter->id?></td>
            <td><?=$chapter->name?></td>
            <td>
                <a href="router.php?c=chapter&a=show&id=<?=$chapter->id
                ?>" class="btn btn-info" role="button">Show</a>
                <a href="router.php?c=chapter&a=edit&id=<?=$chapter->id
                ?>" class="btn btn-info" role="button">Edit</a>
                <a href="router.php?c=chapter&a=destroy&id=<?=$chapter->id ?>" class="btn btn-warning" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>

<?php require_once './views/layout/footer.php'; ?>