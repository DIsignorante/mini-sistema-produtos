<?php
require_once 'auth.php';
require_once 'config.php';

// Criar / Editar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $id = $_POST['id'] ?? null;
    
    if (!empty($nome)) {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE categorias SET nome = :nome WHERE id = :id");
            $stmt->execute(['nome' => $nome, 'id' => $id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
            $stmt->execute(['nome' => $nome]);
        }
        header("Location: categorias.php");
        exit;
    }
}

// Excluir
if (isset($_GET['delete'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM categorias WHERE id = :id");
        $stmt->execute(['id' => $_GET['delete']]);
    } catch (PDOException $e) {
        $erro = "Não é possível excluir categorias vinculadas a produtos.";
    }
}

// Listar
$categorias = $pdo->query("SELECT * FROM categorias ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php';
?>
<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header">Nova Categoria</div>
            <div class="card-body">
                <?php if(isset($erro)): ?> <div class="alert alert-danger"><?= $erro ?></div> <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Nome da Categoria</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-dark"><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>
            <tbody>
                <?php foreach($categorias as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td>
                        <a href="?delete=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'footer.php'; ?>