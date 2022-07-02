<!doctype html>
<html lang="fr">

	<head>
		<title>Accueil</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>

	</head>

	<body>
		<!-- Container general -->
		<div class="accueil_container_general">

			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main id="story-main">
        <section id="container">
          <h1 id="h-story">Vos achats effectués</h1>
          <?php
          if(!empty($response)){
                    foreach($response as $reponse){
                        // var_dump($reponse);
                        $n_commande = intval($reponse['numero_commande']);
                        echo"<p class='comT'>Votre numero de commande : $n_commande</p>
                        ";
                        $infoClient = $this->historique->selectclient_commande($reponse['id_client_commande']);
                        foreach ($infoClient as $infoC){
                            echo'<p class="adrT">Adresse de livraison:</p><br>
                            <p class="adrT">
                            '.$infoC["nom"].'
                            '.$infoC["prenom"].'
                            '.$infoC["telephone"].'
                            '.$infoC["email"].'
                            '.$infoC["addresse"].'
                            '.$infoC["ville"].'
                            '.$infoC["code_postale"].'
                            </p></br>';
                        }
                        if(isset($_SESSION['user'])){
                            $infoAchat = $this->historique->selectListeCommandeBuy($n_commande, 1);
                            foreach($infoAchat as $info){
                                $product = $this->historique->selectproduct($info['id_produit']);
                                echo"<p class='smallT'>Vous avez acheté un ";
                                foreach($product as $prod){
                                    echo $prod['nom'] . '</p><br>';
                            }
                         }
                        }
                        else{
                        $infoAchat = $this->historique->selectListeCommandeBuyCookie($n_commande, 1);
                        foreach($infoAchat as $info){
                            $product = $this->historique->selectproduct($info['id_produit_cookie']);
                            echo "<p class='smallT'>Vous avez acheté un ";
                            foreach($product as $prod){
                                echo $prod['nom'] . '</p><br>';
                            }
                         }
                        }
                    }

                    
                    
                    
                }

            ?>
          

        </section>
			</main>

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script>
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>
