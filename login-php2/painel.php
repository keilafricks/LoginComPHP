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
                                	<h2>Olá, <?php echo $_SESSION['usuario'];?>, aproveite o site</h2>
                                	<br></br>
<button type="submit" class="button is-block is-link is-large is-fullwidth">
    <a href="indexs.php">
   Visualizar cadastros
</button>
<br></br>
<h2><a href="logout.php">Sair</a></h2>


                                </div>
                            </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

