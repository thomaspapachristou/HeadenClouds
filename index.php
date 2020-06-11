
<?php require 'header.php'?>

  <!-- >>> CAROUSEL - SLIDER <<< -->
  <div id="carouselcontrolslider" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- >>> On indique le nombre de CAROUSEL <<<-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!-- >>> On importe directement le système de slide <<<-->
    <div class="carousel-inner" role="listbox">

      <!-- >>> PREMIER SLIDE <<<-->
      <div class="carousel-item active">
        <div class="view">
          <video class="video-intro" autoplay loop muted> <source src="video/backgroundmenu1.mp4" type="video/mp4"> </video>
          <!-- >>> STYLE DU SLIDER <<< -->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- >>> CONTENU <<< -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4"> <strong>LAISSEZ VOUS AVOIR LA TÊTE DANS LES NUAGES</strong> </h1>
              <p class="sliderH">
                <strong>Découvrez le stockage nuagique et accédez à vos fichiers peu importe où vous êtes !</strong>
              </p>
              <!-- <p class="mb-4 d-none d-md-block">
                <strong>Gardez vos photos, vos vidéos et vos documents sur nos serveurs clouds <span id="bluee">GRATUITEMENT</span> afin de toujours <br> les avoir à votre portée de main que vous soyez sur votre portable, votre
                  ordinateur portable <br> ou sur une autre instance tout en gérant votre propre espace personnel. Plus besoin de disque dur !</strong> </p> -->
              <a href="#INSCRIPTION" class="btn btn-outline-white btn-lg"> COMMENCER <i class="fas fa-cloud-download-alt"></i> </a>
            </div>
          </div>
        </div>
      </div>
    
      <!-- >>> SECOND SLIDE <<< -->
      <div class="carousel-item">
        <div class="view">
          <video class="video-intro" autoplay loop muted><source src="video/backgroundmenu1.mp4" type="video/mp4"></video>
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4"> <strong> PARTICULIER OU PROFESSIONNEL </strong> </h1>
              <p> <strong>NOUS OFFRONS NOS SERVICES PEU IMPORTE QUI VOUS ÊTES </strong> </p>
              <a href="#INSCRIPTION" class="btn btn-outline-white btn-lg"> COMMENCER <i class="fas fa-cloud-download-alt"> </i> </a>
            </div>
          </div>
        </div>
      </div>

      <!-- >>> TROISIEME SLIDE <<< -->
      <div class="carousel-item">
        <div class="view">
          <video class="video-intro" autoplay loop muted> <source src="video/backgroundmenu1.mp4" type="video/mp4"> </video>
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4"> <strong>SÉCURITÉ ET CONFIDENTIALITÉ </strong> </h1>
              <p> <strong>TOUTES VOS DONNÉES RESTERONT DANS LES NUAGES ET NOUS LES UTILISERONT JAMAIS </strong> </p>
              <a href="#INSCRIPTION" class="btn btn-outline-white btn-lg">COMMENCER <i class="fas fa-cloud-download-alt"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- >>> FIN DE LA PARTIE SLIDE <<<-->

    <!--PARTIE CONTRÔLE -->
    <a class="carousel-control-prev" href="#carouselcontrolslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselcontrolslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Suivant</span>
    </a>
  </div>


  <!-- >>> DISPOSITION DU INDEX <<< -->
  <!-- >>> Usage de wow.js et animate.css <<< -->


  <main>
    <div class="container">

      <!-- >>> SECTION 1 - UTILISATION DU SYSTEME DE GRID BOOTSTRAP : ROW > COLUMN voir [DOC] <<< -->
      <section class="mt-5 wow fadeIn">
        <div class="row">
          <!-- >>> Première colonne <<< -->
          <div class="col-md-6 mb-4">
            <img src="img/bank/indexcloud1.jpg" class="img-fluid z-depth-1-half " alt="">
          </div>
  
          <!-- >>> Seconde colonne <<< -->
          <div class="col-md-6 mb-4">
            <h3 class="h3 mb-4">STOCKEZ TOUT CE QUE VOUS SOUHAITEZ</h3>
            <p> Gardez vos photos, vos vidéos, vos documents professionnels ou personnels grâce à nos services. Partagez-les facilement à votre entourage peu importe où vous êtes ! </p>
            <p>Vous voulez en savoir plus sur nos <strong> SERVICES </strong> ou vous êtes une entreprise ? Vous pouvez en voir plus <strong> EN DESSOUS</strong> ! </p> 
            <hr>
            <blockquote class="blockquote alert alert-secondary">
              <p class="mb-0">Pourquoi stocker toutes vos données sur votre ordinateur alors qu'on peut les rendre universelles et utilisables où vous le souhaitez ?!</p>
              <footer class="blockquote-footer">Une personne célèbre qui n'existe pas dans <cite title="Source Title">Microsoft</cite></footer>
            </blockquote>
            <a href="#àpropos" class="btn btn-grey btn-md">En SAVOIR PLUS</a>
            <a href="#pro" class="btn btn-grey btn-md">PROFESSIONNEL</a>
          </div>
        </div>
      </section>
    
      <hr class="my-5">

      <!-- >>> SECTION 2 <<< -->
      <section>

        <h3 class="h3 text-center mb-5">À propos de <strong>HEADEN CLOUDS</strong></h3>
        <div class="row wow fadeIn">

          <!-- >>> Première colonne du bloc PARENT <<< -->
          <div class="col-lg-6 col-md-12 px-4">

            <!--Première rangée-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-globe fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">ACCESSIBILITÉ</h5>
                <p class="grey-text">Accédez et téléchargez vos fichiers peu importe où vous êtes </p>
              </div>
            </div>

            <div style="height:30px"></div> <!-- ESPACE BLOC-->

            <!--Seconde rangée -->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-share-alt fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">PARTAGE</h5>
                <p class="grey-text"> Invitez vos amis à télécharger ou modifier vos documents, vos photos ou vos vidéos par lien ou par utilisateur du site. C'est vous qui décidez ! </p>
              </div>
            </div>
       

            <div style="height:30px"></div>

            <!--Troisième rangée-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-user-shield fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">CONFIDENTIALITÉ ET SÉCURITÉ</h5>
                <p class="grey-text"> Toutes les données transmises à nos serveurs ne seront jamais récupérées et restent strictement confidentielles. Nous les protégeons et c'est vous qui décidez quelle personne peut accéder à vos documents !  </p>
              </div>
            </div>
          </div>
          

          <!-- >>> SECONDE COLONNE-->
          <div class="col-lg-6 col-md-12 d-flex align-items-center">
              <img src="img/bank/indexcloud2.jpg" class="img-fluid z-depth-1-half " alt="">    
          </div>
        </div>
      </section>

      <hr class="my-5">

      <!-- SECTION 3 -->
      <section>
          <h2 class="my-5 h3 text-center">ENCORE PLUS...</h2>
        <div class="row features-small mb-5 mt-3 wow fadeIn">

          <!--Première colonne -->
          <div class="col-md-4">

            <!--Première rangée-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title"> Gratuit pour un usage individuel</h6>
                <p class="grey-text">Nos services sont et resteront gratuits, peu importe quand.  </p>
                <div style="height:15px"></div>
              </div>
            </div>
          
            <!--Seconde rangée-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Collaboration</h6>
                <p class="grey-text"> Créez votre groupe et partagez et téléchargez les fichiers de celui-ci.</p>
                <div style="height:15px"></div>
              </div>
            </div>
           

            <!--Troisième rangée -->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Visualisation</h6>
                <p class="grey-text">Écoutez ou lisez vos modifications sans avoir à les télécharger !</p>
                <div style="height:15px"></div>
              </div>
            </div>
            

            <!--Quatrieme rangée -->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">PRO</h6>
                <p class="grey-text">Stockez vos fichiers sans limite à des tarifs défiant toutes concurrences.</p>
                <div style="height:15px"></div>
              </div>
            </div>
           
          </div>
         

          <!--SECONDE COLONNE-->
          <div class="col-md-4 flex-center mt-5">
            <img src="img/bank/indexcloud3.png" alt="lolxD" class="z-depth-0 img-fluid">
          </div>
          

          <!-- TROISIEME COLONNE -->
          <div class="col-md-4 mt-2">
            <!--Première rangée-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Ergonomie</h6>
                <p class="grey-text">Retrouvez-vous dans tous vos documents avec nous outils proposés ergonomiques.</p>
                <div style="height:15px"></div>
              </div>
            </div>
           

            <!--Seconde rangée -->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Simplicité</h6>
                <p class="grey-text">Peu importe si vous utilisez peu un ordinateur, nos services sont intuitifs et simple à prendre en main.</p>
                <div style="height:15px"></div>
              </div>
            </div>
            

            <!--Troisième rangée -->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Efficacité </h6>
                <p class="grey-text">Nos serveurs proposées répondent à la demande afin d'assurer un débit constant pour votre confort</p>
                <div style="height:15px"></div>
              </div>
            </div>
      
            <!-- Quatrième rangée -->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Sans limite de téléchargement</h6>
                <p class="grey-text"> Vous téléchargez à la vitesse maximale ! TURBO ! </p>
                <div style="height:15px"></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <hr class="mb-5">

                     <!--SECTION  4 -->
      <section>
        <h1 class="my-5 h3 text-center">Rejoignez la communauté Headen</h1>
        <h3 class="text-center grey-text" style="text-align: justify;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur accusantium et suscipit rem dicta harum tempore magni nulla odit vero earum ipsa facilis, beatae totam ipsum voluptatibus laboriosam optio exercitationem.</h3>
        </section>

    </div>
  </main>

<?php require 'footer.php' ?>