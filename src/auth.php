<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    
    if (!headers_sent()) {
        header("Location: login.php");
    }
    
    echo '<!DOCTYPE html>';
    echo '<html><head>';
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
    echo '<script type="text/javascript">window.location.href = "login.php";</script>';
    echo '</head><body></body></html>';
    
    exit;
}
?>
