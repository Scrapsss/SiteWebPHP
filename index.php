<?php

require 'C:\Users\Scrap\Documents\Cours\CoursCMD\CoursPHP\vendor\autoload.php';

use Pokemon\Pokemon;

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PokemonTCG</title>

        <link rel="stylesheet" href="src/style.css">

        <!-- Police décriture -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


        <!-- Carousel -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    </head>

    <body>

        <!-- La bannière en haut de la page -->
        <header>
            <div id="LogoSite">
                <img src="src/Pokéball.png" alt="Pokéball" width="75" height="75">
                <h1>Pokemon TCG</h1>
            </div>
            <div id="Menu">
                <a href=""><h3>Accueil</h3></a>
                <h3>Collection</h3>
                <h3>Ouverture</h3>
                <h3>Échange</h3>
                <button><h3>Se connecter →</h3></button>
            </div>
        </header>

        <!-- On enchaîne avec le carousel pour présenter les différent nouveaux boosters -->
        <section id="Slider">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="Slide-Content">
                        <div id="Texte-Slide1">
                            <h2>Nouveau Booster <h2 class="RedText">Flashfire</h2></h2>
                            <p>Nouveau Dracaufeu chromatique disponible !</p>
                            <button><h3>Découvrez-le !</h3></button>
                        </div>
                        <div id="img-Slide1">
                            <img src="src/Flashfire Booster.webp" alt="Booster" id="Booster">
                        </div>
                    </div>
                    
                  </div>
                  <div class="swiper-slide">Booster 2</div>
                  <div class="swiper-slide">Booster 3</div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!-- La page de Collection suivra ensuite et permettra d'obeserver toutes les cartes que le jeu contient -->
        <section id="Collection">
            <h2>Collection</h2>
            <div id="Collection-Content">
                <div id="Filtre-Extension">
                    <input type="text" id="text_area" placeholder="Entrez un pokemon">
                    <button id="get_Pokemon"><h3>Voir le pokémon</h3></button>
                </div>
                <div id="CardBox">
                </div>
            </div>
        </section>


        <!-- Script JS du Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialisation du Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
              spaceBetween: 30,
              centeredSlides: true,
              autoplay: {

                delay: 3000,
                disableOnInteraction: false,
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
            });
        </script>

        <script>
            document.getElementById('get_Pokemon').addEventListener('click', () => {
                const carte = document.getElementById('text_area').value || 'lucario';
                const url = `Cartes.php?carte=${carte}`;
                const CardBox = document.getElementById('CardBox');
                CardBox.innerHTML = '<h3>Chargement...</h3>';

                fetch(url)
                    .then(response => {
                        if (!response.ok) 
                        {
                            throw new Error('Erreur réseau ou API');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const cards = data.data; 
                        const CardBox = document.getElementById('CardBox');
                        CardBox.innerHTML = ''; 

                        if (!cards || cards.length === 0) {
                            CardBox.innerHTML = '<h3>Aucune carte trouvée.</h3>';
                            return;
                        }

                        cards.forEach(card => {
                            const div = document.createElement('div');
                            div.classList.add('Carte');
                            div.innerHTML = `
                                <img src="${card.images.small}" alt="${card.name}" />
                            `;
                            CardBox.appendChild(div);
                        });
                    })
            });
        </script>
        
    </body>

    
</html>