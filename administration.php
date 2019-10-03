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
                <a href="ajout_page.php"> Ajouter des pages à votre  catalogue virtuel</a>
                <p> Pour établir un nouveau catalogue  supprimer d'abord toutes les pages de ce dernier</p>
            </div>
            <div class="item">
                <a href="supp_page.php"> Supprimer des pages à votre  catalogue virtuel</a>
                <p>Toutes suppression de page est définitive . Vous devrez ajouter la ou les pages en question si vous faites une erreur de suppression</p>
            </div>
            <div class="item">
                 <p>Coordonée de votre entreprise</p>
                 <form action="administration.php" method="post">
                    <label for="adresse">Adresse de l'entreprise</label>
                    <input type="text" name="adresse" id="adresse">
                    <label for="telephone">Telephone de l'entreprise</label>
                    <input type="tel" name="telephone" id="telephone">
                    <input type="submit" value="mettre à jour les coordonnées">
                 </form>
    <?php
    if(isset($_POST['adresse'] ) || isset($_POST['telephone'])){
        if ($_POST['adresse'] != NULL ){
            
                if( file_exists('adresse.txt')){
                    unlink('adresse.txt');
                    $adresse = fopen('adresse.txt', 'c+b');
                    fputs($adresse,$_POST['adresse']);
                    
                }else{
                    $adresse = fopen('adresse.txt', 'c+b');
                    fputs($adresse,$_POST['adresse']);

                }
        }
        if($_POST['telephone'] != NULL){
           
            fputs($tel,$_POST['telephone']);
            echo 'téléphone modifier';
                if (file_exists('tel.txt')){
                    unlink('tel.txt');
                    $tel = fopen('tel.txt', 'c+b');
                    fputs($adresse,$_POST['telephone']);
                }else{
                    $tel = fopen('tel.txt', 'c+b');
                    fputs($tel,$_POST['telephone']);
                
                }

        }
    }

    ?>

   
            </div>

        </div>
        
    </div>
</body>
</html>