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
                <a href="">SUPPRESSION DE PAGES</a>
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
                    echo ' <form action="supp_page.php" method="post">';
                    echo '<div class="generateur-miniature">';
                    $iterator = new DirectoryIterator('img');
                    foreach($iterator as $document){
                        if ($document != "." && $document != ".."){
                        echo '<img class="miniature" src="img/'.$document->getFilename().'"> <input type="checkbox" name="image[]" id="" value="img/'.$document->getFilename().'"><br>';
                        }
                    
                    }
                }
            
     
            
            ?>
                <input type="submit" name="supprimer"value="supprimer">
                </div>
                </form>
           
              <?php
 //upload dans la catégorie concercé
 if (isset($_POST['image']) && isset($_POST['supprimer'])){ 
     foreach ($_POST['image'] as $valeur)
     {
         unlink($valeur);
         echo $valeur. 'supprimer';
         
     }
    }


   ?>
            </form>
     
           <form action="" method="post"></form>
 

   
            </div>
          

        </div>
        
    </div>
</body>
</html>