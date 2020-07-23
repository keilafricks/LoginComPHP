<?php
 
require_once 'init.php';
 
// pega os dados do formuário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

 
// validação (bem simples, só pra evitar dados vazios)
if (empty($usuario) || empty($senha))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO usuario(usuario, senha) VALUES(:usuario, md5(:senha))";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);
 
 
if ($stmt->execute())
{
    header('Location: indexs.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}