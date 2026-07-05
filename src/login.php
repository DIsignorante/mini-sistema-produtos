<?php
session_start();
require 'config.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $senha = trim($_POST['senha']);

    if (empty($username) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {
        $stmt = $pdo->prepare("SELECT id, senha FROM usuarios WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            $erro = "Credenciais inválidas.";
        }
    }
}
require 'header.php';
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center mb-4">Acesso ao Sistema</h3>
                <?php if ($erro): ?> <div class="alert alert-danger"><?= $erro ?></div> <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Usuário</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>