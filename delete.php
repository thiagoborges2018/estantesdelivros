<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM livros  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
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
            <div class="col-dm-12 col-sm-12 col-xs-12">
                <div class="site">
                    <div class="title text-center">
                        <h1>Deletar livro</h1>
                    </div>
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <div class="text-center">
                          <p class="alert alert-error">Tem certeza que quer excluir este livro?</p>
                      </div>
                      <div class="form-actions text-center">
                          <button type="submit" class="btn btn-danger">Sim</button>
                          <a class="btn btn-primary" href="index.php">Não</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>                   
    </div>
  </body>
</html>