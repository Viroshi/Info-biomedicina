<?php
    include_once "includes/header.php";
    session_start();
    $cadastros = $_SESSION['cadastros'] ?? [];

    $detalhe = $_GET['detalhe'] ?? null;
    if ($detalhe === 'toggle') {
        $index = $_GET['index'] ?? null;
        if (isset($_SESSION['detalhe_index']) && $_SESSION['detalhe_index'] == $index) {
            unset($_SESSION['detalhe_index']);
        } else {
            $_SESSION['detalhe_index'] = $index;
        }
        header("Location: dados.php");
        exit;
    }
    $detalhe_index = $_SESSION['detalhe_index'] ?? null;
?>

<div class="container py-5">
    <h2 class="mb-4 text-white">Cadastros</h2>

    <?php foreach ($cadastros as $index => $cadastro): ?>
        <div class="mb-3">
            <a href="?detalhe=toggle&index=<?= $index ?>" class="text-decoration-none">
                <strong><?= htmlspecialchars($cadastro['nome'] . ' ' . $cadastro['sobrenome']) ?></strong>
            </a>

            <?php if ($detalhe_index == $index): ?>
                <form class="row g-3 mt-2 rounded p-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Primeiro Nome</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['nome']) ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Sobrenome</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['sobrenome']) ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" value="<?= htmlspecialchars($cadastro['email']) ?>" disabled>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Endereço</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['endereco']) ?>" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Número</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['numero']) ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Complemento</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['complemento']) ?>" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Estado</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['estado']) ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Cidade</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['cidade']) ?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">CEP</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($cadastro['cep']) ?>" disabled>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php include_once "includes/footer.php";?>