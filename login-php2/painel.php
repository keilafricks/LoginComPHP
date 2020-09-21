<?php
session_start();
include('verifica_login.php');
?>




    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <!--  <link rel="stylesheet" href="css/bulma.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
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

<section class="hero is-success is-fullheight">
    <form>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">

                                <h1>Olá <?php echo $_SESSION['usuario'];?>, aproveite o site</h1>
                                <br>

                                <div class="control">
                                    <button type="submit" class="button is-block is-link is-large is-fullwidth"><a href="indexs.php">Visualizar cadastros
                                    </button>
                                    <br><br>
                                    <h3><a href="logout.php">Sair</a></h3>
                                </div>
                            </div>
                        </form>
                        <script>
        var usuario = document.getElementById('usuario');
        var password = document.getElementById('password');

        usuario.addEventListener('focus',()=>{
            usuario.style.borderColor = 'lightblue';
        });

        usuario.addEventListener('blur',()=>{
            usuario.style.borderColor = '#ccc';
        });

        password.addEventListener('focus',()=>{
            password.style.borderColor = 'lightblue';
        });

        password.addEventListener('blur',()=>{
            password.style.borderColor = '#ccc';
        });
    </script>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>


</body>

