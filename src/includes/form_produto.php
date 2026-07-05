<div class="card shadow-sm">
    <div class="card-header"><?= $produtoEdit ? 'Editar Produto' : 'Novo Produto' ?></div>
    <div class="card-body">
        <form method="POST" action="produtos.php">
            <?php if($produtoEdit): ?>
                <input type="hidden" name="id" value="<?= $produtoEdit['id'] ?>">
            <?php endif; ?>
            
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $produtoEdit['nome'] ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label>Descrição</label>
                <textarea name="descricao" class="form-control"><?= $produtoEdit['descricao'] ?? '' ?></textarea>
            </div>
            <div class="mb-3">
                <label>Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    <?php foreach($categorias as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= ($produtoEdit && $produtoEdit['categoria_id'] == $cat['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" value="<?= $produtoEdit['preco'] ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label>Disponibilidade</label><br>
                <?php $disp = $produtoEdit ? $produtoEdit['disponivel'] : 1; ?>
                <input type="radio" name="disponivel" value="1" <?= $disp ? 'checked' : '' ?>> Disponível
                <input type="radio" name="disponivel" value="0" <?= !$disp ? 'checked' : '' ?> class="ms-2"> Indisponível
            </div>
            <button type="submit" class="btn btn-<?= $produtoEdit ? 'warning' : 'success' ?> w-100">
                <?= $produtoEdit ? 'Atualizar' : 'Salvar' ?>
            </button>
            <?php if($produtoEdit): ?>
                <a href="produtos.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            <?php endif; ?>
        </form>
    </div>
</div>