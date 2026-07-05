<table class="table table-bordered table-hover bg-white shadow-sm">
    <thead class="table-dark">
        <tr><th>Nome</th><th>Categoria</th><th>Preço</th><th>Status</th><th>Ações</th></tr>
    </thead>
    <tbody>
        <?php foreach($produtos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= htmlspecialchars($p['cat_nome']) ?></td>
            <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td>
                <span class="badge bg-<?= $p['disponivel'] ? 'success' : 'danger' ?>">
                    <?= $p['disponivel'] ? 'Disponível' : 'Indisponível' ?>
                </span>
            </td>
            <td>
                <a href="?edit=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="?delete=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir este produto?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>