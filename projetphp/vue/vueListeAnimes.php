<div class="containerPrincipal ">
            <div class="container">
            <div class="scrollContainer">
                <button id="scrollRightBtn" class="scrollRightBtn" 
                    onclick="left(document.querySelector('.Animes'))"><i class="fa-solid fa-chevron-right icone"></i></button>
                <button id="scrollLeftBtn" class="scrollLeftBtn" 
                    onclick="right(document.querySelector('.Animes'))"><i class="fa-solid fa-chevron-left icone"></i></button>
            </div>
            <h3> Nos Animés</h3>
            <div class="containerFilm Animes">
            
                <?php foreach ($mesAnimes as $oeuvre) { ?>
                    <div class="articleImage">
                        <a href="Details.php?idOeuvre=<?php echo $oeuvre->getIdOeuvre() ?>">
                            <?php if (is_null($oeuvre->getIdOeuvre())) { ?>
                                <div class="placeholder">Non trouvé</div>
                            <?php } else { ?>
                                <img class="film-image" src="../img/<?php echo $oeuvre->getImage() ?>.jpg" alt="<?php echo $oeuvre->getImage() ?>">
                            <?php } ?>
                        </a>
                        <h4 class="titreOeuvre"><?php echo strlen($oeuvre->getTitreOriginal()) > 25 ? substr($oeuvre->getTitreOriginal(), 0, 25) . '...' : $oeuvre->getTitreOriginal(); ?></h4>
                    </div>
                <?php } ?>
            </div>
        </div>
    
    
    <script>
        function left(container) {
            container.scrollBy({
                left: 1000,
                behavior: 'smooth'
            });
        }
        function right(container) {
            container.scrollBy({
                left: -1000,
                behavior: 'smooth'
            });
        }
        
    </script>
    



