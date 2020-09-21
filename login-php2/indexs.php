<?php
require_once 'init.php';
include('verifica_login.php');
 
// abre a conexão
$PDO = db_connect();
 
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: <a class="vglnk" href="http://php.net/manual/pt_BR/pdostatement.rowcount.php" rel="nofollow"><span>http</span><span>://</span><span>php</span><span>.</span><span>net</span><span>/</span><span>manual</span><span>/</span><span>pt</span><span>_</span><span>BR</span><span>/</span><span>pdostatement</span><span>.</span><span>rowcount</span><span>.</span><span>php</span></a>
$sql_count = "SELECT COUNT(*) AS total FROM usuario ORDER BY usuario ASC";
 
// SQL para selecionar os registros
$sql = "SELECT usuario_id, usuario, senha FROM usuario ORDER BY usuario ASC";
 
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Sistema de Cadastro de usuários</title>
        <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
 <!--    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css"> -->
    </head>



<style>
    *{margin:0;padding:0;box-sizing: border-box;}

form a:link, a:visited {
    text-decoration: none;
    }

form a:hover {
    text-decoration: none; 
    }
 form a:active {
    text-decoration: none;
    }

button a:link, a:visited {
    color: white;
    }
    body{
        background-color: lightblue;
    }
    form{
        background: black;
        max-width:500px;
        padding:20px;
        position:absolute;
        left:50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    form h3{
        text-align: center;
        color: white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Genova', 'Verdana', 'sans-serif';
        margin-bottom: 5px;
    }

     form h1{
        margin-bottom: 10px;
        text-align: center;
        color: white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Genova', 'Verdana', 'sans-serif';
    }
    form input[type=text], form input[type=password]{
        border-radius: 20px;
        background: lightgray;
        width: 100%;
        height: 45px;
        border: 3px solid #ccc;
        padding-left:10px;
        margin:10px 0
    }
    form button[type=submit]{
        width: 100%;
        height: 40px;
        cursor: pointer;
        background: gray;
        color: white;
        border:0;
        border-radius: 20px;
        transition: 1s;
        outline: 0
    }
    form button[type=submit]:hover{
        background-color:lightblue;
        outline: 0
    }
    form input[type=text]:focus{
        background-color: lightgrey;
        outline: 0
    }
    form input[type=password]:focus{
        background-color: lightgrey;
        outline: 0
    }

     form input[type=submit]{
        width: 100%;
        height: 40px;
        cursor: pointer;
        background: gray;
        color: white;
        border:0;
        border-radius: 20px;
        transition: 1s;
        outline: 0
    }

    form input[type=submit]:hover{
        background-color:lightblue;
        outline: 0
    }

      table{
        color:white;
    }
    p{
        color: white;
    }

     td{
        color: white;
    }

    a{
        color: white;
    }
</style>

 
    <body>
        <form>         
            <section class="hero is-success is-fullheight">
      <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-12">
                    <div class="box">
             
                            <div class="field">
                                <div class="control">
                                
         
        <h1>Sistema de cadastro de usuários</h1>
        <br></br>
         
        
 
        <h1>Lista de Usuários</h1>
        <br></br>
 
        <p>Total de usuários: <?php echo $total ?></p>
        <br></br>
 
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['usuario'] ?></td>
                    <td><?php echo $user['senha'] ?></td>

                    <td>
                        <a href="form-edit.php?id=<?php echo $user['usuario_id'] ?>">Editar</a>
		<br></br>
                        <a href="delete.php?id=<?php echo $user['usuario_id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

         <br></br>
        <p><a href="form-add.php">Adicionar Usuário</a></p>
        <br></br>
 
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>


                                </div>
                            </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

        </body>
</html>