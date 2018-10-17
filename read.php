<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM livros where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link   href="css/site.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
    
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="site">
                    <div class="title text-center">
                        <h1>Dados do livro</h1>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <b>Cód. do livro</b>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <b>Nome do Livro</b>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <b>Escritor</b>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <b class="checkbox">
                                <?php echo $data['cod_livro'];?>
                            </b> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <span class="checkbox">
                                <?php echo $data['nome'];?>
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span class="checkbox">
                                <?php echo $data['autor'];?>
                            </span>
                        </div>
                    </div>
                    <div class="form-actions text-center">
                          <a class="btn btn-primary" href="index.php">Voltar</a>
                       </div>
                </div>
            </div>
        </div>         
    </div> <!-- /container -->
  </body>
</html>