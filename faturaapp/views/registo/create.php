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
                <form action="router.php?c=registo&a=store" method="post" >
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username ">
                    <?= isset($registo->errors) ? $registo->errors->on('username') : '' ?>
                    <br>
                    <br>
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                    <?= isset($registo->errors) ? $registo->errors->on('password') : '' ?>
                    <br>
                    <br>
                    <label for="Email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                    <?= isset($registo->errors) ? $registo->errors->on('email') : '' ?>
                    <br>
                    <br>
                    <label for="Telefone">Telefone</label>
                    <input class="form-control" type="number" id="telefone" name="telefone">
                    <?= isset($registo->errors) ? $registo->errors->on('telefone') : '' ?>
                    <br>
                    <br>
                    <label for="NIF">NIF</label>
                    <input class="form-control" type="number" id="nif" name="nif">
                    <?= isset($registo->errors) ? $registo->errors->on('nif') : '' ?>
                    <br>
                    <br>
                    <label for="Morada">Morada</label>
                    <input class="form-control" type="text" id="morada" name="morada">
                    <?= isset($registo->errors) ? $registo->errors->on('morada') : '' ?>
                    <br>
                    <br>
                    <label for="Postal">Postal</label>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal">
                    <?= isset($registo->errors) ? $registo->errors->on('codigopostal') : '' ?>
                    <br>
                    <br>
                    <label for="localidade">Localidade</label>
                    <input class="form-control" type="text" id="localidade" name="localidade">
                    <?= isset($registo->errors) ? $registo->errors->on('localidade') : '' ?>
                    <br>
                    <br>


                    <button class="btn btn-danger" type="submit">Registar Funcionario</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>