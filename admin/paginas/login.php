<?php
    
    if ($_POST) {
        $login = $_POST["login"] ?? NULL;
        $senha = $_POST["senha"] ?? NULL;

       $sql = "SELECT id, nome, login, senha FROM usuario WHERE login = :login AND ativo = 'S' limit 1";

       $consulta = $pdo->prepare($sql);
       $consulta->bindParam(":login", $login); 
       $consulta->execute();

       $dados = $consulta->fetch(PDO::FETCH_OBJ);

        if (!isset($dados->id)) {
            mensagenErro("Usuario não encontrado ou invalido.");
        }
        

    }
?>
<div class="login">
    <h1 class="text-center">Efetuar login</h1>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" class="form-control" required placeholder="Por favor preencha este campo"> 

        <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control" required placeholder="Por favor preencha este campo"> 

        <button type="submit" class="btn btn-success w-100">Efetuar login</button>


    </form>
</div>