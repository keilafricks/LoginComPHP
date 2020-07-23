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
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    </head>
 
    <body>
         <section class="hero is-success is-fullheight">
      <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-12">
                    <div class="box">
             
                            <div class="field">
                                <div class="control">
                                
         
        <h1>Sistema de cadastro de usuários</h1>
        <br></br>
         
        <p><a href="form-add.php">Adicionar Usuário</a></p>
        <br></br>
 
        <h2>Lista de Usuários</h2>
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
 
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>
    </body>

                                </div>
                            </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>