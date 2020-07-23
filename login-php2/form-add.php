<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
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


        <form action="add.php" method="post">
            <label for="usuario">Nome: </label>
            <br>
            <input type="text" name="usuario" id="name" class="input is-large">
 
            <br><br>
 
            <label for="senha">Senha </label>
            <br>
            <input type="text" name="senha" id="email" class="input is-large">
 
            <br><br>
             
 
            <input type="submit" value="Cadastrar" class="button is-block is-link is-large is-fullwidth">
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