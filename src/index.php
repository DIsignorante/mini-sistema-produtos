<?php
// Inclusão dos ficheiros de controle e segurança no topo absoluto
require_once 'auth.php';
require_once 'header.php';
?>

<div class="p-5 mb-4 bg-light rounded-3 shadow-sm border">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bem-vindo ao Painel de Controle!</h1>
        <p class="col-md-8 fs-4">O sistema está agora totalmente protegido por sessões e modularizado com diretivas include/require.</p>
    </div>
</div>

<?php 
// Inclusão do fechamento do layout
require_once 'footer.php'; 
?>