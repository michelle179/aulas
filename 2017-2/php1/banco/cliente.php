<?php
require_once "conexao.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Aula de Inserção no banco de dados</title>
  </head>

  <body>
      <div class="container">
          <h4 class="center">Cadastro no banco de dados</h4>
          <div class="row">
              <form  method="POST" class="col s12">
                  <div class="row">
                      <div class="col s3 input-field">
                          <input type="text" name="nome" id="nome">
                          <label for="nome">Nome</label>
                      </div>
                      <div class="col s3 input-field">
                          <input type="text" name="telefone" id="telefone">
                          <label for="telefone">Telefone</label>
                      </div>
                      <div class="col s3 input-field">
                          <input type="text" name="email" id="email">
                          <label for="email">E-mail</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s12 center">
                          <button class="btn waves-effect waves-light" type="submit" name="submit" ><i class="material-icons right">send</i>Enviar</button>
                      </div>
                  </div>
                  <?php 
                        if(isset($_POST['submit'])){
                            $con = conectar();
                            $nome = ($_POST['nome'] == null)? NULL : $_POST['nome']; 
                            $sql ="INSERT INTO `cliente`(`nome`,`telefone`,`email`) 
                            VALUES ('".$nome."','".$_POST['telefone']."','".$_POST['email']."')";

                            if(mysqli_query($con,$sql)){
                                echo "<script> alert('Cadastrado com Sucesso') </script>";;
                            }else{
                                echo "ERRO ao inserir  ".$sql." ".mysqli_error($sql);
                            }

                            mysqli_close($con);

                        }

                 ?>
              </form>
          </div>

      </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>