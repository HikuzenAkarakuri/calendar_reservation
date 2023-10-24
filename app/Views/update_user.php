<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Informações</title>
</head>
<body>
    <h1>Atualizar Informações do Usuário</h1>
    
    <!-- Exibir mensagens de sucesso ou erro -->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    
    <!-- Formulário de atualização -->
    <form method="post" action="<?= site_url('updateUser') ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        
        <label for="password">Nova Senha (opcional):</label>
        <input type="password" name="password" id="password">
        
        <button type="submit">Atualizar Informações</button>
    </form>
    
    <a href="<?= site_url('dashboard') ?>">Voltar para o Dashboard</a>
</body>
</html>
