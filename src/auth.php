<?php
// 1. Inicia a sessão se ela ainda não existir
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Verifica se o usuário NÃO está logado
if (!isset($_SESSION['usuario_id'])) {
    
    // Método 1: Tenta o redirecionamento nativo do PHP (só funciona se nenhum HTML/espaço foi enviado antes)
    if (!headers_sent()) {
        header("Location: login.php");
    }
    
    // Método 2 e 3: Fallback de segurança usando HTML (Meta Refresh) e JavaScript puro
    echo '<!DOCTYPE html>';
    echo '<html><head>';
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
    echo '<script type="text/javascript">window.location.href = "login.php";</script>';
    echo '</head><body></body></html>';
    
    // 3. O comando EXIT é obrigatório. Ele "mata" o carregamento do restante da página (produtos.php)
    exit;
}
?>