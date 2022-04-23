<?php
use core\Classes\Store;
?>

<div class="container-fluid navegacao">
	<div class="row">
	<div class="col 6 p-3">
        <h3><?= APP_NAME?>
    </div>
	    <div class="col-6 text-end p-3">
        <a href="/" class="nav-item">Ínicio</a> 
            <a href="/loja" class="nav-item">Loja</a>
            
            <!--Vai verificar se existe cliente na sessão-->

            <?php if(Store::clientLog()):?>
                <a href="/minha_conta" class="nav-item">Minha conta</a>
                <a href="/logout" class="nav-item">Logout</a>
            <?php else:?>
                <a href="/login"class="nav-item">Login</a>
                <a href="/cadastro" class="nav-item">Criar Conta</a>
            <?php endif;?>


            <a href="/carrinho"><i class="fa-solid fa-cart-shopping"></i></a>

            <span class="badge bg-warning">10</span>
	    </div>
	</div>
</div>


