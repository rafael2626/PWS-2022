<?php require_once './views/layout/adminheader.php'; ?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <?php
            if(isset($erro))
            {
                echo "Erro: " . $erro;
            }
            ?>
            <br>
            <br>
            <form action="router.php?c=login&a=login" method="post">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username"><br>
                <?= isset($registo->errors) ? $registo->errors->on('username') : '' ?>

                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password"><br>
                <?= isset($registo->errors) ? $registo->errors->on('password') : '' ?>
                <br>
               <button type="submit" class="btn btn-danger">Entrar</button>

            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php require_once './views/layout/footer.php'; ?>