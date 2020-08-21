<?php 
    require_once 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 p-4">
                    <div class="text-center">
                        <?php 
                            // error
                            if(isset($_GET['error'])){
                                $err = htmlspecialchars($_GET['error']);
                                switch($err){
                                    // error empty
                                    case 'empty':
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Merci de remplir tous les champs</strong>
                                        </div>
                                    <?php 
                                    break; 
                                    // error length
                                    case 'length': 
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Merci de saisir un pseudo inférieur à 100 caractères</strong>
                                        </div>
                                    <?php 
                                    break;
                                    // error success
                                    case 'success': 
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Message bien envoyé</strong>
                                        </div>
                                    <?php 
                                    // other
                                    default: 
                                        echo " ";
                                }
                            }
                        ?>
                        <div class="form-group">
                            <form action="minichat.php" method="POST">
                                <label for="pseudo">Pseudo</label>
                                <input type="text"  class="form-control" name="pseudo" value="Me" placeholder="Pseudo" autocomplete="off" required/>
                                <br />
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" placeholder="Votre message"></textarea>
                                <br />
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container" style="border:solid grey 1px;border-radius:7px;">
            <?php 
                // Fetch and show all messages
                $get = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
                while($data = $get->fetch()){
                    echo "<strong>".$data['pseudo']."</strong> ".$data['message']."<br />";
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>