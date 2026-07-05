<?php
require_once 'auth.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = filter_var($_POST['preco'], FILTER_VALIDATE_FLOAT);
    $categoria_id = filter_var($_POST['categoria_id'], FILTER_VALIDATE_INT);
    $disponivel = $_POST['disponivel'];
    $id = $_POST['id'] ?? null;

    if ($nome && $preco !== false && $categoria_id !== false) {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE produtos SET nome=:n, descricao=:d, preco=:p, disponivel=:disp, categoria_id=:c WHERE id=:id");
            $stmt->execute(['n'=>$nome, 'd'=>$descricao, 'p'=>$preco, 'disp'=>$disponivel, 'c'=>$categoria_id, 'id'=>$id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, disponivel, categoria_id) VALUES (:n, :d, :p, :disp, :c)");
            $stmt->execute(['n'=>$nome, 'd'=>$descricao, 'p'=>$preco, 'disp'=>$disponivel, 'c'=>$categoria_id]);
        }
        header("Location: produtos.php");
        exit;
    }
}

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->execute(['id' => $_GET['delete']]);
    header("Location: produtos.php");
    exit;
}

$produtoEdit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->execute(['id' => $_GET['edit']]);
    $produtoEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
$produtos = $pdo->query("SELECT p.*, c.nome as cat_nome FROM produtos p JOIN categorias c ON p.categoria_id = c.id ORDER BY p.id DESC")->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php'; 
?>

<div class="row">
    <div class="col-md-4">
        <?php include 'includes/form_produto.php'; ?>
    </div>
    
    <div class="col-md-8">
        <?php include 'includes/lista_produto.php'; ?>
    </div>
</div>

<?php 
require_once 'footer.php';
?>
