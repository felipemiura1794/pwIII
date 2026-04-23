<link rel="stylesheet" href="public/style/components/import.css">
<link rel="stylesheet" href="public/style/pages/login.css">

<?php include "components/root/html_head_close.php"; ?>
<main class="row-container">
    <div class="container imagem-login" style="background-image: url('public/assets/img/placeholder/login.png');"></div>
    <div class="container main-dark-color">
        <div class="painel-login">
            <h1 class="titulo-login">Log In</h1>
            <input class="input-login" type="text" placeholder="RM (Registro de matrícula)">
            <input class="input-login" type="password" placeholder="Senha">
            <a class="esqueceu-senha" href="?">Esqueceu sua senha?</a>
            <button class="btn-entrar">Entrar</button>
            <div class="divisor">
                <hr><span>Ou</span><hr>
            </div>
            <p class="cadastro-link">Não possui conta? <a href="/site-interclasse/test/cadastro.html"><em>Cadastre-se</em></a></p>
        </div>
    </div>
</main>