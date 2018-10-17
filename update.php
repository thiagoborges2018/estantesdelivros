<?php
        require 'database.php';
    
        $id = null;
        if ( !empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }
        
        if ( null==$id ) {
            header("Location: index.php");
        }
        
        if ( !empty($_POST)) {
            // keep track validation errors
            $nameError = null;
            $codlivroError = null;
            $autorError = null;
            
            
            // keep track post values
            $name = $_POST['nome'];
            $codlivro = $_POST['cod_livro'];
            $autor = $_POST['autor'];
            
            
            // validate input
            $valid = true;
            if (empty($name)) {
                $nameError = 'Digite o nome do livro';
                $valid = false;
            }
            if (empty($codlivro)) {
                $codlivroError = 'Digite o cod. do livro';
                $valid = false;
            }
            if (empty($autor)) {
                $autorError = 'Digite o nome do escritor';
                $valid = false;
            }
            
            // update data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE livros  set nome = ?, cod_livro =?, autor =? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name,$codlivro,$autor,$id));
                Database::disconnect();
                header("Location: index.php");
            }
        } else {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM livros where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $name = $data['nome'];
            $codlivro = $data['cod_livro'];
            $autor = $data['autor'];
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
                            <h1>Atualizar dados do livro</h1>
                        </div>
                        <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                            <div class="control-group <?php echo !empty($codlivroError)?'error':'';?>">
                                <label class="control-label">Cod. do livro</label>
                                <div class="controls">
                                    <input name="cod_livro" type="text" class="form-control"  placeholder="Cod. do livro" value="<?php echo !empty($codlivro)?$codlivro:'';?>">
                                    <?php if (!empty($codlivroError)): ?>
                                        <span class="help-inline"><?php echo $codlivroError;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                                <label class="control-label">Nome do livro</label>
                                <div class="controls">
                                    <input name="nome" type="text" class="form-control"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                                    <?php if (!empty($nameError)): ?>
                                        <span class="help-inline"><?php echo $nameError;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="control-group <?php echo !empty($autorError)?'error':'';?>">
                                <label class="control-label">Nome do escritor</label>
                                <div class="controls">
                                    <input name="autor" type="text" class="form-control" placeholder="Nome do Escritor" value="<?php echo !empty($autor)?$autor:'';?>">
                                    <?php if (!empty($autorError)): ?>
                                        <span class="help-inline"><?php echo $autorError;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a class="btn btn-info" href="index.php">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
                 
    </div>

    
  </body>
</html>