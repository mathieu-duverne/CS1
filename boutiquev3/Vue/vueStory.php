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
        <section id="story-m">
          <h1 id="h-story">Notre histoire</h1>
          <section id="story-1">
            <figure id="story-fig">
              <img id="story" src="./style/images/2mansstory.jpg" alt="">
              <figcaption></figcaption>
            </figure>
            <section id="story-2">
              <h4>Comment nous en sommes arrivés là</h4>
              <hr>
              <p id="storytext">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla urna ipsum, interdum vel nulla sed, aliquet tempor urna. Cras faucibus quis felis ac ultricies. Donec aliquam varius pharetra. Praesent a ante sollicitudin, dignissim dui sit amet, egestas arcu. Sed et elementum ex. Donec a velit faucibus, rhoncus justo nec, molestie arcu. Morbi gravida, nisi sit amet finibus maximus, lacus neque tristique lectus, quis aliquam ligula massa pretium est. Curabitur massa massa, faucibus vel justo et, tincidunt dictum nisi. Aliquam et mauris at lectus porttitor pellentesque porttitor eget lectus.</p>
            </section>
          </section>

        </section>
			</main>

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script>
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>
