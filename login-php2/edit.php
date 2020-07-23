<?php
 
require_once 'init.php';
 
// resgata os valores do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

 
// validação (bem simples, mais uma vez)
if (empty($usuario) || empty($senha))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd

 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE usuario SET usuario = :usuario, senha = md5(:senha)  WHERE usuario_id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

 
if ($stmt->execute())
{
    header('Location: indexs.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}