<div class="container">
    <div class="row my-5">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Registro De Novo Cliente</h3>

            <form action="/criar_conta" method="post">

            <!--Email -->
            <div class="my-3">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>

            <!--Senha -->
            <div class="my-3">
                <label for="">Senha</label>
                <input type="password" name="senha" placeholder="Password" class="form-control" required>
            </div>

            <!--Confirme Senha -->
            <div class="my-3">
                <label for="">Confirme a Senha</label>
                <input type="password" name="confirm_senha" placeholder="Password" class="form-control" required>
            </div>

            <!--Nome Completo -->
             <div class="my-3">
                <label for="">Nome Completo</label>
                <input type="text" name="name_completo" placeholder="Name Completo" class="form-control" required>
            </div>

            <!--Cidade -->
            <div class="my-3">
                <label for="">Cidade</label>
                <input type="text" name="cidade" placeholder="Cidade" class="form-control" required>
            </div>

            <!--Estado -->
            <div class="Estado">
                <label for="">Estado</label>
                <input type="text" name="estado" placeholder="Estado" class="form-control" required>
            </div>

            <!--Telefone -->
            <div class="form-group">
                <label for="">Telefone</label>
                <input type="text" name="telefone" placeholder="Telefone" class="form-control">
            </div>

            <!--Botão para enviar formulário -->
            <div class="my-4">
                <input type="submit" value="Criar conta" class="btn btn-primary">
            </div>

            <?php if(isset($_SESSION['erro'])):?>
                <div class="alert aler-danger text-center p2">
                    <?=$_SESSION['erro']; ?>
                    <?php unset($_SESSION['erro']);?>
                </div>
            <?php endif;?>


            </form>

        </div>
    </div>
</div>