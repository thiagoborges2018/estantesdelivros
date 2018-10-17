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
                            <h1>Biblioteca</h1>
                        </div>
                        <div>
                            <p>
                                <a href="create.php" class="btn btn-success">Adicionar livro</a>
                            </p>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Cod. do Livro</th>
                                <th>Nome do livro</th>
                                <th>Escritor</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include 'database.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM livros ORDER BY id DESC';
                            foreach ($pdo->query($sql) as $row) {
                                        echo '<tr>';
                                        echo '<td>'. $row['cod_livro'] . '</td>';
                                        echo '<td>'. $row['nome'] . '</td>';
                                        echo '<td>'. $row['autor'] . '</td>';
                                        echo '<td width=278>';
                                        echo '<a class="btn btn-info" href="read.php?id='.$row['id'].'">Visualizar</a>';
                                        echo ' ';
                                        echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Atualizar</a>';
                                        echo ' ';
                                        echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                                        echo '</td>';
                                        echo '</tr>';
                            }
                            Database::disconnect();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
  </body>
</html>