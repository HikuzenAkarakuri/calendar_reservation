<?php if( session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>',  session('errors')) ?></div>
<?php endif;?>

<form method="POST" action="/createUser">
    <input type="email" name="email" id="email" />
    <input type="password" name="password" id="password" />
    <button style="    
    width: 100%;
    height: 45px;
    background: #162938;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    color: #fff;
    font-weight: 500;" type="submit">Criar usuário</button>
</form>

<p><a href="logout"> Sair</a></p>