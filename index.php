<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="js\turnjs4\lib\turn.js"></script>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v4.0"></script>
    <title>Catalogue nuémrique</title>
</head>
<header>
    <nav>
    
     <div class="fb-share-button" data-href="http://127.0.0.1:5500/index.html" data-layout="button" data-size="large">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A5500%2Findex.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a>
    </div>
    </nav>
  </header>
<body>
  
    <div id="flipbook">
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
                // si ok  on genere le catalogue
            }else {     
                    $iterator = new DirectoryIterator('img');
                    foreach($iterator as $document){
                        if ($document != "." && $document != ".."){
                        echo '<div>"<img  src="img/'.$document->getFilename().'"></div>';
                        }
                    }
                }
            ?>
      </div>
     
      <script type="text/javascript">
        $("#flipbook").turn({
       
          autoCenter: true
        });
      </script>
      <footer>
 <?php
// 1 : on ouvre le fichier
$monfichier = fopen('adresse.txt', 'r+');
 
// 2 : on lit la première ligne du fichier
$ligne = fgets($monfichier);
 echo '<p> '.$ligne.'</p>'
// 3 : quand on a fini de l'utiliser, on ferme le fichier

?> 
 <?php
// 1 : on ouvre le fichier
$monfichier = fopen('tel.txt', 'r+');
 
// 2 : on lit la première ligne du fichier
$ligne = fgets($monfichier);
 echo '<p> '.$ligne.'</p>'
// 3 : quand on a fini de l'utiliser, on ferme le fichier

?> 
</footer> 
   
</body>


</html>