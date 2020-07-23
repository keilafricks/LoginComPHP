<?php
require 'init.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT usuario, senha FROM usuario WHERE usuario_id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Usuário - ULTIMATE PHP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
 
    <body>

           <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="box">
             
                            <div class="field">
                                <div class="control">

 
        <h1>Edição de Usuário</h1>
         
       

         <form action="edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="usuario" id="name" class="input is-large" value="<?php echo $user['usuario'] ?>">
 
            <br><br>
 
            <label for="email">Senha: </label>
            <br>
            <input type="text" name="senha" id="email" class="input is-large" value="<?php echo $user['senha'] ?>">
 
            <br><br>
             
 
            <input type="hidden" name="id" value="<?php echo $id ?>"> 
            <input type="submit" class="button is-block is-link is-large is-fullwidth" value="Alterar">
        </form>



                                </div>
                            </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    </body>
</html>