<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="administration.css">
    <title>Administration du catalogue</title>
</head>
<body>
    <div class="wrapper">
        <div class="navigation">
            <nav>
                <a href="administration.php">ADMINISTRATION</a>
                <a href="ajout_page.php">AJOUT DE PAGES</a>
                <a href="supp_page.php">SUPPRESSION DE PAGES</a>
            </nav>
        </div>  
        <div class="content">
            <h1>Administation de votre catalogue virtuel</h1>
            <div class="item">
          <p> Pour établir un nouveau catalogue  supprimer d'abord toutes les pages de ce dernier</p>
            
            <?php // limiter le nombre de fichier dans le dossier img à 10
            $dossier = 'img';
            $max_nb_fichiers = 10;
            
             
            // compte le nombre de fichiers
            $it = new FilesystemIterator($dossier);
            $nb_fichiers = iterator_count($it);
            $fichiers_restant = $max_nb_fichiers - $nb_fichiers;
             
            // redirection vers 'page_erreur.php' si nb > 10
            if($nb_fichiers > $max_nb_fichiers)
            {
                header ('Location: page_erreur.php');
                exit;
                // si ok  on renvoie le nombre de fichier restant pour atteindre le max et le générateur de miniature
            }else {echo  '<h4>il vous reste : '.$fichiers_restant.'/'  ;
                   
                    echo $max_nb_fichiers.' à ajouter</h4>'; 
                    echo '<div class="generateur-miniature">';
                    $iterator = new DirectoryIterator('img');
                    foreach($iterator as $document){
                        if ($document != "." && $document != ".."){
                        echo '<img class="miniature" src="img/'.$document->getFilename().'"><br>';
                        }
                    
                    }
                }
            
            // suite du code d'upload



                  // les 10 input dans un array ?
                  //associer chaque input à une page dans le catalogue  => renomer le fichier en fonction de sa place dans le catalogue  exemple : page1 = 1.jpg
                  // afficher la liste des 10 input potentiel

            ?>
                </div>
                <form action="ajout_page.php" method="post" enctype="multipart/form-data">
              <input type="file" name="fichier" id="fichier">
              <input type="submit" name="submit" value="Envoyer la page">
              <?php
 //upload dans la catégorie concercé
 $path=$_FILES['fichier']['name'];
 
  $CheminEtNomTemporaire = $_FILES['fichier']['tmp_name'];
  $CheminEtNomDefinitif ='img/'.$path;
var_dump ($CheminEtNomDefinitif);
  $moveIsOk = move_uploaded_file($CheminEtNomTemporaire, $CheminEtNomDefinitif );

  if ($moveIsOk){
       $message = "le fichier a été upload dans ". $CheminEtNomDefinitif;
  }
  else {
       $message =" une erreur est survenu";
  }


   ?>
            </form>
            <p>  </p>
            
           
 

   
            </div>
          

        </div>
        
    </div>
</body>
</html>