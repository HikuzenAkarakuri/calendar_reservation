<?php
    echo "Email do usuário:". session('email');
    echo "<br>";
    echo "Data e hora login:". session('data_login');
    echo "<hr>";
    echo "Data e hora cadastro:". session('data_cad');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<p>Veja seus eventos<a href="calendar"> aqui</a></p>


<p>Atualize sua conta<a href="update"> aqui</a></p>


<p><a href="logout"> Sair</a></p>

</body>
</html>